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
