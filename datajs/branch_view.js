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


