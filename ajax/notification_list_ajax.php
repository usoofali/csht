<?php

require_once("../loader.php");
require_once('../helpers/querys.php');
$user = new User;
$db = new Conexion;

$sWhere = " WHERE b.user_id ='" . $_SESSION['userid'] . "'";
$sql = "

SELECT a.user_id as admin_id, a.notification_id,  a.acted_id, a.action_type, a.description, a.created_at, b.notification_read, b.notification_status, c.fname, c.lname 

FROM notification as a

INNER JOIN notification_user as b ON a.notification_id = b.notification_id
INNER JOIN user as c ON c.user_id = b.user_id

$sWhere

order by a.created_at desc

";
$db->cdp_query($sql);

$db->cdp_execute();

$notifications = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();


if ($rowCount > 0) { ?>

<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <h5 class="card-title">All <span>| Notifications</span></h5>

            <table class="table table-borderless datatable">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Notification</th>
                    <th scope="col">Adminsitrator</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($notifications as $notification) {
                    $href = '';
                    switch ($notification->action_type) {
                    case 'Add Staff':
                        $href = 'staff_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                        break;
                    case 'Add Student':
                        $href = 'student_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                        break;
                    default:
                        $href = 'staff_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                        break;
                    }
                    ?>
                    <tr>
                        <td><?php echo $notification->created_at; ?></td>
                        <td><a href="<?php echo $href;?>" class="text-primary"><?php echo $notification->description; ?></a></td>
                        <td><?php echo $notification->fname." ".$notification->lname; ?></td>
                        <td><span class="<?php echo($notification->status==0) ? "badge bg-info" : "badge bg-secondary"; ?>"><?php echo($notification->status==0) ? "New" : "Read"; ?></span></td>
                        <td>
                            <div class="">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Actions</h6>
                                    </li>

                                <li><a class="dropdown-item" href="<?php echo $href;?>">View</a></li>
                                <li><a class="dropdown-item delete-notification" href="#" data-notification-id="<?php echo $notification->notification_id; ?>">Delete</a></li>

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
    // Handle delete notification click event
    $(".delete-notification").click(function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the notification ID from data attribute
        var notificationId = $(this).data("notification-id");

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
                    url: "ajax/delete_notification.php",
                    data: { id: notificationId },
                    success: function(data) {
                        // Handle success response
                        Swal.fire(
                            'Deleted!',
                            'Your notification has been deleted.',
                            'success'
                        );
                        // Optionally, you can reload the page or update the UI
                        window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the notification.',
                            'error'
                        );
                        window.location.reload();
                    }
                });
            }
        });
    });
}

);

</script>