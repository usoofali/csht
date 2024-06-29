"use strict";

$(document).on("click", ".delete-notification", function (event) {
  event.preventDefault(); // Prevent default link behavior

  // Get the notification ID from data attribute
  var notificationId = $(this).data("notification-id");

  // Show SweetAlert2 confirmation dialog
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
    width: 340,
  }).then((result) => {
    if (result.isConfirmed) {
      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "ajax/delete_notification.php",
        data: { id: notificationId },
        success: function (data) {
          // Handle success response
          Swal.fire(
            "Deleted!",
            "Your notification has been deleted.",
            "success"
          ).then((result) => {
            if (result.isConfirmed) {
              // If the user clicks "OK", redirect or perform any other action
              // Example: window.location.href = 'your_redirect_url';
              window.location.reload();
            }
          });
        },
        error: function (xhr, status, error) {
          // Handle error response
          Swal.fire(
            "Error!",
            "An error occurred while deleting the notification.",
            "error"
          );
          window.location.reload();
        },
      });
    }
  });
});

$(document).on("click", ".delete-all-notifications", function (event) {
  event.preventDefault(); // Prevent default link behavior
  // Show SweetAlert2 confirmation dialog
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete all!",
    width: 340,
  }).then((result) => {
    if (result.isConfirmed) {
      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "ajax/delete_all_notification.php",
        success: function (data) {
          // Handle success response
          Swal.fire(
            "Deleted!",
            "Your notifications has been deleted.",
            "success"
          ).then((result) => {
            if (result.isConfirmed) {
              // If the user clicks "OK", redirect or perform any other action
              // Example: window.location.href = 'your_redirect_url';
              window.location.reload();
            }
          });
        },
        error: function (xhr, status, error) {
          // Handle error response
          Swal.fire(
            "Error!",
            "An error occurred while deleting the notification.",
            "error"
          );
        },
      });
    }
  });
});

$(document).on("click", ".read-all-notifications", function (event) {
  event.preventDefault(); // Prevent default link behavior
  // Show SweetAlert2 confirmation dialog
  Swal.fire({
    title: "Are you sure?",
    text: "You want to mark all notifications as read!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Mark all!",
    width: 340,
  }).then((result) => {
    if (result.isConfirmed) {
      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "ajax/mark_all_notification.php",
        success: function (data) {
          // Handle success response
          Swal.fire(
            "Read!",
            "All notifications has been marked read.",
            "success"
          ).then((result) => {
            if (result.isConfirmed) {
              // If the user clicks "OK", redirect or perform any other action
              // Example: window.location.href = 'your_redirect_url';
              window.location.reload();
            }
          });
        },
        error: function (xhr, status, error) {
          // Handle error response
          Swal.fire(
            "Error!",
            "An error occurred while deleting the notification.",
            "error"
          );
          window.location.reload();
        },
      });
    }
  });
});

new DataTable("#notification", {
  ajax: {
    url: "ajax/notification_list_ajax.php",
    type: "POST",
    dataSrc: "data",
  },
});
