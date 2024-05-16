"use strict";


$(function () {
	cdp_load(1);
});

function cdp_load(page) {
	var search = $("#search").val();
	var parametros = { "page": page, 'search': search };
	$("#loader").fadeIn('slow');
	$.ajax({
		url: './ajax/super/branch_view_ajax.php',
		data: parametros,
		beforeSend: function (objeto) {
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
			$(".outer_div").html(data).fadeIn('slow');
			Swal.close();
		}
	})
}

$(document).ready(function() {
    // Handle delete branch click event
    $(".delete-branch").click(function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the branch ID from data attribute
        var branchId = $(this).data("branch-id");

        // Show SweetAlert2 confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "ajax/super_delete_branch.php",
                    data: { id: branchId },
                    success: function(data) {
                        // Handle success response
                        Swal.fire(
                            'Deleted!',
                            'Your branch has been deleted.',
                            'success'
                        );
                        // Optionally, you can reload the page or update the UI
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the branch.',
                            'error'
                        );
                    }
                });
            }
        });
    });
}

);
