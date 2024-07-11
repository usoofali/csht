"use strict";

$("#add_data").on('submit', function (event) {
    
    var formData = new FormData(this);
    try {
        $.ajax({
            type: "POST",
            processData: false, 
            contentType: false,
            cache: false,
            url: "ajax/super/staff_add_ajax.php",
            data: formData,
            beforeSend: function (objeto) {
                // Display a loading message using SweetAlert before sending the AJAX request
                Swal.fire({
                    title: 'Please wait...',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willOpen: () => {
                        Swal.showLoading();
                    }
                });
            },
            success: function (data) {
                data = JSON.parse(data);
                // Close the SweetAlert loading animation
                Swal.close();
                if(data.success){
                    // Display a success message using SweetAlert
                    Swal.fire({
                        title: 'Success!',
                        html: data.message, // Assuming your PHP script returns a success message
                        icon: 'success',
                        confirmButtonText: 'OK',
                        width:'340px'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If the user clicks "OK", redirect or perform any other action
                            // Example: window.location.href = 'your_redirect_url';
                            window.location.reload();
                            
                        }
                    });
                    // Scroll to the top of the page
                    $('html, body').animate({
                        scrollTop: 0
                    }, 600);
                }else{
                    Swal.fire({
                        title: 'Error!',
                        html: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        width:'340px'
                    });
                }
                
            },
            error: function(xhr, status, error) {
                // Handle errors using SweetAlert if necessary
                Swal.fire({
                    title: 'Error!',
                    text: 'An error occurred while processing your request.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    width:'340px'
                });
            }
        });
    } catch (error) {
        console.log(error);
    }
        

    event.preventDefault(); 
});

$("#edit_data").on('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var parametros = $(this).serialize(); // Serialize form data

    $.ajax({
        type: "POST",
        url: "ajax/super/staff_edit_ajax.php",
        data: parametros,
        beforeSend: function (objeto) {
            // Display a loading message using SweetAlert before sending the AJAX request
            Swal.fire({
                title: 'Please wait...',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
        },
        success: function (data) {
            data = JSON.parse(data);
            // Close the SweetAlert loading animation
            Swal.close();
            if(data.success){
                // Display a success message using SweetAlert
                Swal.fire({
                    title: 'Success!',
                    text: data.message, // Assuming your PHP script returns a success message
                    icon: 'success',
                    confirmButtonText: 'OK',
                    width:'340px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If the user clicks "OK", redirect or perform any other action
                        // Example: window.location.href = 'your_redirect_url';
                        window.history.back();
                    }
                });
                // Scroll to the top of the page
                $('html, body').animate({
                    scrollTop: 0
                }, 600);
            }else{
                Swal.fire({
                    title: 'Error!',
                    html: data.message,
                    icon: 'error',
                    confirmButtonText: 'OK',
                    width:'340px'
                });
            }
            
        },
        error: function(xhr, status, error) {
            // Handle errors using SweetAlert if necessary
            Swal.fire({
                title: 'Error!',
                text: 'An error occurred while processing your request.',
                icon: 'error',
                confirmButtonText: 'OK',
                width:'340px'
            });
        }
    });
});


function validateFileSize() {
    // Get the file input element
    var input = document.getElementById('avatar');

    // Check if any file is selected
    if (input.files && input.files[0]) {
        var file = input.files[0];
        var fileSizeInMB = file.size / (1024 * 1024); // Convert bytes to MB
        
        if (!file.type.startsWith('image/')) {
            // File is not an image, show error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Only image files are accepted.',
                width:340
            });
            // Reset the file input field to clear the selected file
            input.value = '';
            return;
        }
        // Check if file size is less than 1MB
        if (fileSizeInMB <= 1) {

        } else {
            // File size is too large, show error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'File size is too large. Please upload a file less than 1MB.',
                width:340
            });
            // Reset the file input field to clear the selected file
            input.value = '';
        }
    }
}

$("#account_bank").select2({
        theme:"classic",
        ajax: {
            url: "ajax/select2_bank.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2,
        placeholder: "Search Bank",
        allowClear: true
});

$("#email").on('change', function (event) {

    var email = document.getElementById("email").value;
    if(email.search("@") == -1){
        document.getElementById("username").value = email;   
    }else{
        document.getElementById("username").value = email.slice(0,email.indexOf("@"));
    }

});

$("#state").on("change", function (event) {
    var state = document.getElementById("state").value;
    var city = document.getElementById("city");
  
    $.ajax({
      type: "POST",
      url: "ajax/select2_cities.php",
      data: { id: state },
      success: function (data) {
        data = JSON.parse(data);
        city.innerHTML = '';
  
        var option = document.createElement("option");
        option.value = ""; // Set the value attribute of <option> to the key
        option.textContent = "Select LGA";
        city.appendChild(option); // Append <option> to the <select> element
        for (var key in data) {
          if (data.hasOwnProperty(key)) {
            var option = document.createElement("option");
            option.value = key; // Set the value attribute of <option> to the key
            option.textContent = data[key]; // Set the text content of <option> to the value
            city.appendChild(option); // Append <option> to the <select> element
          }
        }
      },
    });
  });
  