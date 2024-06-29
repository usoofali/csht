"use strict";

$(document).on("click", ".delete-message", function (event) {
  event.preventDefault(); // Prevent default link behavior

  // Get the message ID from data attribute
  var messageId = $(this).data("message-id");

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
        url: "ajax/delete_message.php",
        data: { id: messageId },
        success: function (data) {
          // Handle success response
          Swal.fire("Deleted!", "Your message has been deleted.", "success");
        },
        error: function (xhr, status, error) {
          // Handle error response
          Swal.fire(
            "Error!",
            "An error occurred while deleting the message.",
            "error"
          );
        },
      });
    }
  });
});

$(document).on("click", ".delete-all-message", function (event) {
  event.preventDefault(); // Prevent default link behavior
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
        url: "ajax/delete_all_message.php",
        success: function (data) {
          // Handle success response
          Swal.fire(
            "Deleted!",
            "All messages has been deleted.",
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
            "An error occurred while deleting the message.",
            "error"
          );
          window.location.reload();
        },
      });
    }
  });
});

$(document).on("click", ".read-all-message", function (event) {
  event.preventDefault(); // Prevent default link behavior
  // Show SweetAlert2 confirmation dialog
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Mark all as read!",
    width: 340,
  }).then((result) => {
    if (result.isConfirmed) {
      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "ajax/mark_all_message.php",
        success: function (data) {
          // Handle success response
          Swal.fire(
            "Read!",
            "All messages has been marked read.",
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
            "An error occurred while deleting the message.",
            "error"
          );
        },
      });
    }
  });
});

$(document).on("click", ".view-message", function (event) {
  event.preventDefault(); // Prevent default link behavior

  // Get the message ID from data attribute
  var messageBody = $(this).data("message-body");
  var messageId = $(this).data("message-id");
  var messageSubject = $(this).data("message-subject");
  var messageSender = $(this).data("message-sender");
  var html =
    `
    <input value="` +
    messageSubject +
    `" class="swal2-input" disabled>
    <textarea class="swal2-textarea" disabled>` +
    messageBody +
    `</textarea>`;

  Swal.fire({
    title: messageSender,
    html: html,
    icon: "info",
    confirmButtonText: "Ok",
    width: 440,
  }).then((result) => {
    if (result.isConfirmed) {
      // Send AJAX request
      $.ajax({
        type: "POST",
        url: "ajax/update_message_read.php",
        data: { id: messageId },
        success: function (data) {
          // Handle success response
          Swal.fire("Message Read!", "Message marked as read.", "success").then(
            (result) => {
              if (result.isConfirmed) {
                window.location.reload();
              }
            }
          );
          // Optionally, you can reload the page or update the UI
        },
        error: function (xhr, status, error) {
          // Handle error response
          Swal.fire("Error!", "An error occurred.", "error");
        },
      });
    }
  });
});

new DataTable("#message", {
  ajax: {
    url: "ajax/message_list_ajax.php",
    type: "POST",
    dataSrc: "data",
  },
});
