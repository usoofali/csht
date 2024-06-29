new DataTable("#level_one", {
  ajax: {
    url: "./ajax/super/course_one_view_ajax.php",
    type: "POST",
    dataSrc: "data",
  },
  pageLength: 30,
});

new DataTable("#level_two", {
  ajax: {
    url: "./ajax/super/course_two_view_ajax.php",
    type: "POST",
    dataSrc: "data",
  },
  pageLength: 30,
});

new DataTable("#level_three", {
  ajax: {
    url: "./ajax/super/course_three_view_ajax.php",
    type: "POST",
    dataSrc: "data",
  },
  pageLength: 30,
});

$(document).on("click", ".import-courses", function (event) {
  event.preventDefault(); // Prevent default button behavior
  Swal.fire({
    title: "Are you sure?",
    text: "You want to import courses!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, import!",
    width: "340px",
  }).then((result) => {
    if (result.isConfirmed) {
      // Step 1: Select the XLSX file
      const input = document.createElement("input");
      input.type = "file";
      input.accept = ".xlsx, .xls";
      input.onchange = (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = (event) => {
          const data = new Uint8Array(event.target.result);
          const workbook = XLSX.read(data, { type: "array" });
          const firstSheet = workbook.Sheets[workbook.SheetNames[0]];
          const jsonData = XLSX.utils.sheet_to_json(firstSheet, { header: 1 });

          // Step 2: Process the XLSX data with validation
          const courses = [];
          const errors = [];

          jsonData.forEach((row, index) => {
            const title = row[0];
            const code = row[1];
            const unit = row[2];
            const semester = row[3];
            const level = row[4];

            const codePattern = /^[A-Z]{3} \d{3}$/;
            const levelOptions = ["100 Level", "200 Level", "300 Level"];
            const semesterOptions = ["First", "Second"];

            if (!title) {
              errors.push(`Row ${index + 1}: Title is required.`);
            }
            if (!code || !codePattern.test(code)) {
              errors.push(
                `Row ${index + 1}: Code should be in format "ABC 123".`
              );
            }
            if (!unit || isNaN(unit) || unit < 1 || unit > 9) {
              errors.push(
                `Row ${index + 1}: Unit should be a number between 1 and 9.`
              );
            }
            if (!levelOptions.includes(level)) {
              errors.push(
                `Row ${
                  index + 1
                }: Level should be "100 Level", "200 Level", or "300 Level".`
              );
            }
            if (!semesterOptions.includes(semester)) {
              errors.push(
                `Row ${index + 1}: Semester should be "First" or "Second".`
              );
            }

            if (errors.length === 0) {
              courses.push({
                title: title,
                code: code,
                unit: unit,
                level: level,
                semester: semester,
              });
            }
          });

          if (errors.length > 0) {
            Swal.fire({
              title: "Validation Errors",
              html: errors.join("<br>"),
              icon: "error",
              confirmButtonText: "OK",
              width: "340px",
            });
            return;
          }

          // Step 3: Send AJAX request with course data
          $.ajax({
            type: "POST",
            url: "ajax/super/course_import_ajax.php",
            data: { courses: JSON.stringify(courses) },
            success: function (data) {
              data = JSON.parse(data);
              if (data.success) {
                Swal.fire({
                  title: "Success!",
                  html: data.message, // Assuming your PHP script returns a success message
                  icon: "success",
                  confirmButtonText: "OK",
                  width: "340px",
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                });
                $("html, body").animate({ scrollTop: 0 }, 600);
              } else {
                Swal.fire({
                  title: "Error!",
                  html: data.message,
                  icon: "error",
                  confirmButtonText: "OK",
                  width: "340px",
                });
              }
            },
            error: function () {
              Swal.fire({
                title: "Error!",
                text: "An error occurred while importing the courses.",
                icon: "error",
                confirmButtonText: "OK",
                width: "340px",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
              $("html, body").animate({ scrollTop: 0 }, 600);
            },
          });
        };
        reader.readAsArrayBuffer(file);
      };
      input.click();
    }
  });
});
