"use strict";

$(function () {
    cdp_load(1);
});

function cdp_load(page) {
	$.ajax({
		url: 'ajax/notification_list_ajax.php',
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

