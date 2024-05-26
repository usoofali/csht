"use strict";

$(function () {
	cdp_load(1);
});

function cdp_load(page) {
	var search = $("#search").val();
	var parametros = { "page": page, 'search': search };
	$.ajax({
		url: './ajax/super/staff_view_ajax.php',
		data: parametros,
		beforeSend: function (objeto) {
		},
		success: function (data) {
			$(".outer_div").html(data).fadeIn('slow');
		}
	})
}