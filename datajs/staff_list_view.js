$(document).on("click", ".delete-staff", function(event) {
    event.preventDefault(); // Prevent default link behavior

    // Get the staff ID from data attribute
    var staffId = $(this).data("staff-id");

    // Show SweetAlert2 confirmation dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        width:'340px'
    }).then((result) => {
        if (result.isConfirmed) {
            // Send AJAX request
            $.ajax({
                type: "POST",
                url: "ajax/super/staff_delete_ajax.php",
                data: { id: staffId },
                success: function(data) {
                    data = JSON.parse(data);
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
                        window.location.reload();
                    }
                    
                    
                },
                error: function() {
                    // Handle error response
                    // Display a success message using SweetAlert
                    Swal.fire({
                        title: 'Error!',
                        text: 'An error occurred while deleting the staff.',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        width:'340px'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                    // Scroll to the top of the page
                    $('html, body').animate({
                        scrollTop: 0
                    }, 600);
                }
            });
        }
    });
});

new DataTable('#staffs', {
    ajax: {
        url: "./ajax/super/staff_view_ajax.php",
        type: "POST",
        dataSrc: "data"
      }
});
