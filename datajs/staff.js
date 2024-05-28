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


$(document).ready(function() {
   
    // Add event listener to the input field
    function handleStateSelection(){

        $.ajax({
            url: 'ajax/select2_states.php',
            success: function (data) {
                const stateOptions = JSON.parse(data);
                const selectOptions = Object.keys(stateOptions).map(stateID => `<option value="${stateID}">${stateOptions[stateID].text}</option>`).join('');
                // Create SweetAlert2 dialog with a select input
                Swal.fire({
                    title: 'Select State',
                    html: `<select id="swal-state" class="form-select">${selectOptions}</select>`,
                    showCancelButton: true,
                    confirmButtonText: 'Ok',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    width: 340,
                    preConfirm: () => {
                        // Retrieve selected state ID
                        const selectedStateID = $('#swal-state').val();
                        // Set the selected state ID to the hidden input field
                        $('#state').val(stateOptions[selectedStateID].text);
                        // Return the selected state ID
                        return selectedStateID;
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'ajax/select2_cities.php',
                            data: {'id': result.value},
                            success: function (data) {
                                const lgaOptions = JSON.parse(data);
                                const selectOptions = Object.keys(lgaOptions).map(stateID => `<option value="${stateID}">${lgaOptions[stateID].text}</option>`).join('');
                                Swal.fire({
                                    title: 'Select LGA',
                                    html: `<select id="swal-lga" class="form-select">${selectOptions}</select>`,
                                    showCancelButton: true,
                                    confirmButtonText: 'Ok',
                                    cancelButtonText: 'Cancel',
                                    showLoaderOnConfirm: true,
                                    width: 340,
                                    preConfirm: () => {
                                        // Retrieve selected state ID
                                        const selectedLgaID = $('#swal-lga').val();
                                        // Set the selected state ID to the hidden input field
                                        $('#city').val(lgaOptions[selectedLgaID].text);
                                        // Return the selected state ID
                                        return selectedLgaID;
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        Swal.fire({
                                            input: "text",
                                            inputLabel: "Enter Street Address",
                                            inputPlaceholder: "Type your address here...",
                                            showCancelButton: true,
                                            width: 340,
                                          }).then((result) => {
                                                if (result.isConfirmed) {
                                                    $('#address').val(result.value);
                                                }else if (result.isDismissed) {
                                                    $('#state').val("");
                                                    $('#city').val("");
                                                    $('#address').val("");
                                                }
                                          });

                                    }else if (result.isDismissed) {
                                        $('#state').val("");
                                        $('#city').val("");
                                        $('#address').val("");
                                    }
                                });
                                
                            },
                        });
                      } else if (result.isDismissed) {
                        $('#state_id').val("");
                        $('#state').val("");
                        $('#city_id').val("");
                        $('#city').val("");
                        $('#address').val("");
                      }
                });    
            }
        })

    };

    $('#state').on('click select keyup', handleStateSelection);

   
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

