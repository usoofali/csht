<?php

require_once ("../helpers/querys.php");
require_once ("../loader.php");
$user = new User;
$db = new Conexion;
$userData = $user->cdp_getUserData();

$sWhere = " and a.recipient ='" . $_SESSION['userid'] . "'";
$sql = "

SELECT a.subject,  a.body, a.message_id, a.message_status, a.created_at, b.userlevel, b.fname, b.lname, b.email, b.username, b.avatar 

FROM message as a

INNER JOIN user as b ON a.sender = b.user_id

WHERE a.message_read ='0'

$sWhere

-- GROUP BY  b.userlevel
order by a.message_id desc

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
    <i class="bi bi-chat-left-text"></i><span class="badge bg-success badge-number"
        id="countNotifications"><?php echo $rowCount; ?></span>
</a>

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
    <li class="dropdown-header">
        You have <?php echo $rowCount; ?> new messages
        <a href="message_list.php"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>

    <?php if ($rowCount > 0): ?>
        <?php foreach ($data as $key): ?>
            <?php
            $href = 'message_view.php?id=' . $key->message_id;

            ?>
            <li class="message-item">
                <a href=<?php echo $href; ?>>
                    <img src="<?php echo $key->avatar; ?>" alt="" class="rounded-circle">
                    <div>
                        <h4><?php echo $key->fname . " " . $key->lname; ?></h4>
                        <p><?php echo $key->body; ?></p>
                        <p><?php echo $key->created_at; ?></p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <?php if ($key->message_status == 0) {
                echo "<script> 
                        $('#msgAudio')[0].play();
                        </script>";
                update_message_status(array("message_id" => $key->message_id));

            } ?>

        <?php endforeach; ?>
    <?php endif; ?>

    <li class="dropdown-footer">
        <a href="message_list.php">Show all messages</a>
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