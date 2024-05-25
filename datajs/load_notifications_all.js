"use strict";

$(function () {
    load_notifications();
    load_messages();
});

setInterval(load_notifications, 25000);
setInterval(load_messages, 35000);

//Cargar datos AJAX
function load_notifications() {

    $.ajax({
        url: 'ajax/load_notifications.php',
        beforeSend: function (objeto) {
        },
        success: function (data) {
            $("#ajax_response").html(data).fadeIn('slow');
        }
    })
}

function load_messages() {

    $.ajax({
        url: 'ajax/load_messages.php',
        beforeSend: function (objeto) {
        },
        success: function (data) {
            $("#ajax_messages").html(data).fadeIn('slow');
        }
    })
}
