<?php

require_once("../helpers/querys.php");
require_once("../loader.php");
$user = new User;
$db = new Conexion;
$userData = $user->cdp_getUserData();

$sWhere = " and a.user_id ='" . $_SESSION['userid'] . "'";
$sql = "

SELECT b.user_id as buser,  a.user_id, b.action_type,  a.notification_user_id, b.description, b.created_at , b.acted_id , a.notification_status, a.notification_read, b.notification_id

FROM notification_user as a

INNER JOIN notification as b ON a.notification_id = b.notification_id

WHERE a.notification_read ='0'

$sWhere

-- GROUP BY  a.notification_id
order by b.notification_id desc

";

$db->cdp_query($sql);

$db->cdp_execute();

$data = $db->cdp_registros();

$rowCount = $db->cdp_rowCount();

if ($rowCount > 0) {

    $bg = 'bg-primary';
} else {

    $bg = 'bg-danger';
}

?>
<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
<i class="bi bi-bell"></i>
    <span class="badge bg-primary badge-number" id="countNotifications"><?php echo $rowCount; ?></span>
</a>
<!-- <ul class="list-style-none"> -->
<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
    <div class="overflow-auto">
        <li class="dropdown-header">
            You have <?php echo $rowCount; ?> new notifications
            <a href="notification_list.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>

        <?php if ($rowCount > 0): ?>
            <?php foreach ($data as $key): ?>
                <?php
                $href = '';
                switch ($key->action_type) {
                    case 'Add Staff':
                        $href = 'staff_view.php?id=' . $key->acted_id . '&notification_id=' . $key->notification_id;
                        break;
                    case 'Add Student':
                        $href = 'student_view.php?id=' . $key->acted_id . '&notification_id=' . $key->notification_id;
                        break;
                    default:
                        $href = 'staff_view.php?id=' . $key->acted_id . '&notification_id=' . $key->notification_id;
                        break;
                }
                ?>
                <li class="notification-item">
                    <a href="<?php echo $href; ?>" class="message-item">
                        <h4 class="message-title"><i class="bi bi-info-circle text-info"></i><?php echo $key->action_type; ?></h4>
                        <div>
                            <p><?php echo $key->description; ?></p>
                            <p><?php echo $key->created_at; ?></p>
                        </div>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <?php if ($key->notification_status == 0){
                    echo "<script> 
                            $('#chatAudio')[0].play();
                            </script>";
                    
                            update_notification_user(array("user_id"=>$_SESSION['userid'], "notification_id"=>$key->notification_id));
                } ?>

            <?php endforeach; ?>
        <?php endif; ?>

        <li class="dropdown-footer">
            <a href="notification_list.php">Show all notifications</a>
        </li>
    </div>
</ul>


<input type="hidden" id="countNotificationsInput" value="<?php echo $rowCount; ?>">

<script>
    var count = $('#countNotificationsInput').val();
    if (count > 0) {
        $('#countNotifications').addClass('bg-danger text-white');
    } else {
        $('#countNotifications').removeClass('bg-danger');
    }
</script>


