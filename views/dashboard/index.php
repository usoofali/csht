<!DOCTYPE html>
<html lang="en">


<head>
  <?php include('views/inc/topbar-script.php');?>
  <?php $user = new User;?>
  <link type="text/css" href="assets/css/<?php echo $user->theme;?>" rel="stylesheet">
  
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include('views/inc/topbar.php');?>

  <!-- ======= Sidebar ======= -->
  <?php include('views/inc/sidebar.php');?>

  <?php if($_SESSION['userlevel'] == 9){
				$userrole = "Super";
				include('dashboard_super.php');

			}else if($_SESSION['userlevel'] == 1){
				$userrole = "Student";
				include('dashboard_student.php');

			}else{
				$userrole = "Staff";
				include('dashboard_staff.php');
			}
			?>

  <!-- ======= Footer ======= -->
  <?php include('views/inc/footer.php');?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php include('views/inc/footer-script.php');?> 
  
</body>

</html>