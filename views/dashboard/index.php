<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('views/inc/topbar-script.php');?>
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

			}else if($_SESSION['userlevel'] == 2){
				$userrole = "Admin Officer";
				include('dashboard_admin.php');

			}else if($_SESSION['userlevel'] == 3){
				$userrole = "Exam Officer";
				include('dashboard_exam.php');

			}else if($_SESSION['userlevel'] == 4){
				$userrole = "Hod";
				include('dashboard_hod.php');

			}else if($_SESSION['userlevel'] == 5){
				$userrole = "Cashier";
				include('dashboard_cashier.php');

			}else if($_SESSION['userlevel'] == 6){
				$userrole = "Registrar";      
				include('dashboard_registrar.php');

			}else if($_SESSION['userlevel'] == 7){
				$userrole = "Lecturer";
				include('dashboard_lecturer.php');

			}else if($_SESSION['userlevel'] == 8){
				$userrole = "Provost";      
				include('dashboard_provost.php');

			}
			?>

  <!-- ======= Footer ======= -->
  <?php include('views/inc/footer.php');?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <?php include('views/inc/footer-script.php');?> 
  
</body>

</html>