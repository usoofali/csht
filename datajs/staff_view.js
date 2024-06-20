"use strict";

document.getElementById('uploadBtn').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('avatar').click();
});

document.getElementById('avatar').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
        document.getElementById('profile_img').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('removeBtn').addEventListener('click', function(event) {
    event.preventDefault();
    document.getElementById('avatar').value = '';
    document.getElementById('profile_img').src = '';
});

$("#save_changes").on('submit', function (event) {

    var formData = new FormData(this);

    $.ajax({
        type: "POST",
        processData: false, 
        contentType: false,
        cache: false,
        url: "ajax/super/staff_update_ajax.php",
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
                    text: data.message, // Assuming your PHP script returns a success message
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

    event.preventDefault(); // Prevent the form from submitting normally
});

$("#save_settings").on('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var parametros = $(this).serialize(); // Serialize form data

    $.ajax({
        type: "POST",
        url: "ajax/super/staff_theme_ajax.php",
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
});

$("#change_password").on('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting normally

    var parametros = $(this).serialize(); // Serialize form data

    $.ajax({
        type: "POST",
        url: "ajax/super/staff_password_ajax.php",
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
});


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

