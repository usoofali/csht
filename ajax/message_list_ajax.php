<?php

require_once("../loader.php");
require_once('../helpers/querys.php');
$user = new User;
$db = new Conexion;

$sWhere = " WHERE recipient ='" . $_SESSION['userid'] . "'";
$sql = "

SELECT a.message_id, a.subject, a.body, a.message_status, a.message_read, a.created_at, a.sender, a.recipient, b.fname, b.lname

FROM message as a
INNER JOIN user as b ON b.user_id = a.sender

$sWhere

order by a.created_at desc

";

$db->cdp_query($sql);

$db->cdp_execute();

$messages = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();


if ($rowCount > 0) { ?>

<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">All <span>| Messages</span></h5>

            <table class="table table-borderless datatable">
            <thead>
                <tr>
                    
                    <th scope="col">From</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($messages as $message) {
                    ?>
                    <tr>
                        
                        <td><?php echo $message->fname." ".$message->lname; ?></td>
                        <td><?php echo $message->subject; ?></td>
                        <td><a class="view-message" href="#" data-message-id="<?php echo $message->message_id;?>" data-message-sender="<?php echo $message->fname." ".$message->lname;?>" data-message-subject="<?php echo $message->subject;?>" data-message-body="<?php echo $message->body;?>" ><?php echo $message->body; ?></a></td>
                        <td><?php echo $message->created_at; ?></td>
                        <td><span class="<?php echo($message->message_read==0) ? "badge bg-info" : "badge bg-secondary"; ?>"><?php echo($message->message_read==0) ? "New" : "Read"; ?></span></td>
                        <td>
                            <div class="">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Actions</h6>
                                    </li>
                                    <li><a class="dropdown-item view-message" href="#" data-message-id="<?php echo $message->message_id; ?>">View</a></li>
                                    <li><a class="dropdown-item delete-message" href="#" data-message-id="<?php echo $message->message_id; ?>">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>

        </div>
    </div>
</div><!-- End Recent Sales -->

<?php } ?>

<script>
    $(document).ready(function() {

    // Handle delete message click event
    $(".delete-message").click(function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the message ID from data attribute
        var messageId = $(this).data("message-id");

        // Show SweetAlert2 confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            width:340,
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "ajax/delete_message.php",
                    data: { id: messageId },
                    success: function(data) {
                        // Handle success response
                        Swal.fire(
                            'Deleted!',
                            'Your message has been deleted.',
                            'success'
                        );
                        // Optionally, you can reload the page or update the UI
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the message.',
                            'error'
                        );
                        window.location.reload();
                    }
                });
            }
        });
    });

    $(".view-message").click(function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the message ID from data attribute
        var messageBody = $(this).data("message-body");
        var messageId = $(this).data("message-id");
        var messageSubject = $(this).data("message-subject");
        var messageSender = $(this).data("message-sender");
        var html = `
        <input value="`+ messageSubject +`" class="swal2-input" disabled>
        <textarea class="swal2-textarea" disabled>`+ messageBody +`</textarea>`;

        Swal.fire({
            title: messageSender,
            html: html,
            icon: 'info',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "ajax/update_message_read.php",
                    data: { id: messageId },
                    success: function(data) {
                        // Handle success response
                        Swal.fire(
                            'Message Read!',
                            'Message marked as read.',
                            'success'
                        ).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }});
                        // Optionally, you can reload the page or update the UI
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'An error occurred.',
                            'error'
                        );
                    }
                });
            }
        });

    });

});

</script>