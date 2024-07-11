new DataTable('#students', {
    ajax: {
        url: "./ajax/super/student_view_ajax.php",
        type: "POST",
        dataSrc: "data"
      }
});
