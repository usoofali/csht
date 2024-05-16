<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<?php if($_SESSION['userlevel'] == 9){
				$userrole = "Super";
				include('sidebar_index.php');

			}else if($_SESSION['userlevel'] == 1){
				$userrole = "Student";
				include('sidebar_student.php');

			}else if($_SESSION['userlevel'] == 2){
				$userrole = "Admin Officer";
				include('sidebar_admin.php');

			}else if($_SESSION['userlevel'] == 3){
				$userrole = "Exam Officer";
				include('sidebar_exam.php');

			}else if($_SESSION['userlevel'] == 4){
				$userrole = "Hod";
				include('sidebar_hod.php');

			}else if($_SESSION['userlevel'] == 5){
				$userrole = "Cashier";
				include('sidebar_cashier.php');

			}else if($_SESSION['userlevel'] == 6){
				$userrole = "Registrar";      
				include('sidebar_registrar.php');

			}else if($_SESSION['userlevel'] == 7){
				$userrole = "Lecturer";
				include('sidebar_lecturer.php');

			}else if($_SESSION['userlevel'] == 8){
				$userrole = "Provost";      
				include('sidebar_provost.php');

			}
			?>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
