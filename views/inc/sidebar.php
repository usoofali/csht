<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<?php if($_SESSION['userlevel'] == 9){
				$userrole = "Super";
				include('sidebar_super.php');

			}else if($_SESSION['userlevel'] == 1){
				$userrole = "Student";
				include('sidebar_student.php');

			}else{
				$userrole = "Staff";
				include('sidebar_staff.php');

			}
			?>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>
