<?php

require_once("../../loader.php");
require_once('../../helpers/querys.php');
$user = new User;
$db = new Conexion;

$search = $_REQUEST['search'];
$where = "";
if(!empty($search)){
    $where .= " and 
        (fname LIKE '%" . $search . "%'
        or lname LIKE '%" . $search . "%'  
        or email LIKE '%" . $search . "%'
        or phone LIKE '%" . $search . "%'
        or address LIKE '%" . $search . "%')
    ";
}

if($_SESSION['userlevel'] == 9){
$sql = "SELECT * FROM user WHERE (userlevel != 1 or userlevel != 9) 
";
} else{
    $sql = "SELECT * FROM user WHERE (userlevel != 1 or userlevel != 9) and branch_id='".$_SESSION['branch']."'";
}


$db->cdp_query($sql.$where);
$db->cdp_execute();
$staffs = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

if ($rowCount > 0) { ?>

    <table class="table table-hover table-borderless datatable">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $cnt = 0;
        foreach ($staffs as $staff) { 
            $cnt += 1;
            ?>
            <tr class="card-hover">
            <th scope="row"><?php echo $cnt; ?></th>
            <td><a href="staff_view.php?id=<?php echo $staff->user_id;?>" class="text-primary"><?php echo $staff->fname." ".$staff->lname; ?></a></td>
            <td><?php echo $staff->email; ?></td>
            <td><?php echo $staff->address; ?></td>
            <td><a href="tel:<?php echo $staff->phone; ?>"><?php echo $staff->phone; ?></a></td>
            <td>
                <div class="">
                    <a class="icon" href="#<?php echo $staff->user_id;?>" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>

                        <li><a class="dropdown-item" href="staff_view.php?id=<?php echo $staff->user_id;?>">View</a></li>
                        <li><a class="dropdown-item delete-staff" href="#" data-staff-id="<?php echo $staff->user_id; ?>">Delete</a></li>

                    </ul>
                </div>
            </td>
            </tr>
        <?php } ?>
    </tbody>
    </table>
      
<?php } ?>
<script>
    $(document).ready(function() {
    // Handle delete staff click event
    $(".delete-staff").click(function(event) {
        event.preventDefault(); // Prevent default link behavior

        // Get the staff ID from data attribute
        var staffId = $(this).data("staff-id");

        // Show SweetAlert2 confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            width:'340px'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send AJAX request
                $.ajax({
                    type: "POST",
                    url: "ajax/super/staff_delete_ajax.php",
                    data: { id: staffId },
                    success: function(data) {
                        data = JSON.parse(data);
                        if(data.success){
                            // Display a success message using SweetAlert
                            Swal.fire({
                                title: 'Success!',
                                text: data.message, // Assuming your PHP script returns a success message
                                icon: 'success',
                                confirmButtonText: 'OK',
                                width:'340px'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // If the user clicks "OK", redirect or perform any other action
                                    // Example: window.location.href = 'your_redirect_url';
                                    window.location.reload();
                                    
                                }
                            });
                            // Scroll to the top of the page
                            $('html, body').animate({
                                scrollTop: 0
                            }, 600);
                        }else{
                            Swal.fire({
                                title: 'Error!',
                                html: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK',
                                width:'340px'
                            });
                            window.location.reload();
                        }
                        
                       
                    },
                    error: function() {
                        // Handle error response
                        // Display a success message using SweetAlert
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while deleting the staff.',
                            icon: 'error',
                            confirmButtonText: 'OK',
                            width:'340px'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                        // Scroll to the top of the page
                        $('html, body').animate({
                            scrollTop: 0
                        }, 600);
                    }
                });
            }
        });
    });
}

);

</script>