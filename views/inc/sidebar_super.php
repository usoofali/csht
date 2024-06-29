<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">

		<li class="nav-item">
			<a class="nav-link " href="index.php">
				<i class="bi bi-grid"></i>
				<span><?php echo $userrole . " " . $lang['dashboard']; ?></span>
			</a>
		</li><!-- End Dashboard Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#branch-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-building"></i><span><?php echo $lang['branch']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="branch-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_branch.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_branch']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_branch.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_branch']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#session-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-menu-button-wide"></i><span><?php echo $lang['session']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="session-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_view_session.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_session']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#dept-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-building"></i><span><?php echo $lang['dept']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="dept-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_dept.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_dept']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_dept.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_dept']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#facility-nav" data-bs-toggle="collapse" href="#">
				<i class="ri-hospital-line"></i><span><?php echo $lang['facility']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="facility-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_facility.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_facility']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_facility.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_facility']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#course-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-list-task"></i><span><?php echo $lang['course']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="course-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_course.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_course']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_course.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_course']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#student-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-mortarboard"></i><span><?php echo $lang['student']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="student-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_student.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_student']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_student.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_student']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#staff-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-microsoft-teams"></i><span><?php echo $lang['staff']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="staff-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_staff.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_staff']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_staff.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_staff']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#invoice-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-receipt-cutoff"></i><span><?php echo $lang['invoice']; ?></span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="invoice-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="super_add_invoice.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['add_invoice']; ?></span>
					</a>
				</li>
				<li>
					<a href="super_view_invoice.php">
						<i class="bi bi-check-lg"></i><span><?php echo $lang['view_invoice']; ?></span>
					</a>
				</li>

			</ul>
		</li>
		<li class="nav-heading">Settings</li>





		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="components-alerts.php">
						<i class="bi bi-check-lg"></i><span>Alerts</span>
					</a>
				</li>
				<li>
					<a href="components-accordion.php">
						<i class="bi bi-check-lg"></i><span>Accordion</span>
					</a>
				</li>
				<li>
					<a href="components-badges.php">
						<i class="bi bi-check-lg"></i><span>Badges</span>
					</a>
				</li>
				<li>
					<a href="components-breadcrumbs.php">
						<i class="bi bi-check-lg"></i><span>Breadcrumbs</span>
					</a>
				</li>
				<li>
					<a href="components-buttons.php">
						<i class="bi bi-check-lg"></i><span>Buttons</span>
					</a>
				</li>
				<li>
					<a href="components-cards.php">
						<i class="bi bi-check-lg"></i><span>Cards</span>
					</a>
				</li>
				<li>
					<a href="components-carousel.php">
						<i class="bi bi-check-lg"></i><span>Carousel</span>
					</a>
				</li>
				<li>
					<a href="components-list-group.php">
						<i class="bi bi-check-lg"></i><span>List group</span>
					</a>
				</li>
				<li>
					<a href="components-modal.php">
						<i class="bi bi-check-lg"></i><span>Modal</span>
					</a>
				</li>
				<li>
					<a href="components-tabs.php">
						<i class="bi bi-check-lg"></i><span>Tabs</span>
					</a>
				</li>
				<li>
					<a href="components-pagination.php">
						<i class="bi bi-check-lg"></i><span>Pagination</span>
					</a>
				</li>
				<li>
					<a href="components-progress.php">
						<i class="bi bi-check-lg"></i><span>Progress</span>
					</a>
				</li>
				<li>
					<a href="components-spinners.php">
						<i class="bi bi-check-lg"></i><span>Spinners</span>
					</a>
				</li>
				<li>
					<a href="components-tooltips.php">
						<i class="bi bi-check-lg"></i><span>Tooltips</span>
					</a>
				</li>
			</ul>
		</li><!-- End Components Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="forms-elements.php">
						<i class="bi bi-check-lg"></i><span>Form Elements</span>
					</a>
				</li>
				<li>
					<a href="forms-layouts.php">
						<i class="bi bi-check-lg"></i><span>Form Layouts</span>
					</a>
				</li>
				<li>
					<a href="forms-editors.php">
						<i class="bi bi-check-lg"></i><span>Form Editors</span>
					</a>
				</li>
				<li>
					<a href="forms-validation.php">
						<i class="bi bi-check-lg"></i><span>Form Validation</span>
					</a>
				</li>
			</ul>
		</li><!-- End Forms Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
					class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="tables-general.php">
						<i class="bi bi-check-lg"></i><span>General Tables</span>
					</a>
				</li>
				<li>
					<a href="tables-data.php">
						<i class="bi bi-check-lg"></i><span>Data Tables</span>
					</a>
				</li>
			</ul>
		</li><!-- End Tables Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="charts-chartjs.php">
						<i class="bi bi-check-lg"></i><span>Chart.js</span>
					</a>
				</li>
				<li>
					<a href="charts-apexcharts.php">
						<i class="bi bi-check-lg"></i><span>ApexCharts</span>
					</a>
				</li>
				<li>
					<a href="charts-echarts.php">
						<i class="bi bi-check-lg"></i><span>ECharts</span>
					</a>
				</li>
			</ul>
		</li><!-- End Charts Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
				<li>
					<a href="icons-bootstrap.php">
						<i class="bi bi-check-lg"></i><span>Bootstrap Icons</span>
					</a>
				</li>
				<li>
					<a href="icons-remix.php">
						<i class="bi bi-check-lg"></i><span>Remix Icons</span>
					</a>
				</li>
				<li>
					<a href="icons-boxicons.php">
						<i class="bi bi-check-lg"></i><span>Boxicons</span>
					</a>
				</li>
			</ul>
		</li><!-- End Icons Nav -->

		<li class="nav-heading">Pages</li>

		<li class="nav-item">
			<a class="nav-link collapsed" href="users-profile.php">
				<i class="bi bi-person"></i>
				<span>Profile</span>
			</a>
		</li><!-- End Profile Page Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="pages-faq.php">
				<i class="bi bi-question-circle"></i>
				<span>F.A.Q</span>
			</a>
		</li><!-- End F.A.Q Page Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="pages-contact.php">
				<i class="bi bi-envelope"></i>
				<span>Contact</span>
			</a>
		</li><!-- End Contact Page Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="pages-register.php">
				<i class="bi bi-card-list"></i>
				<span>Register</span>
			</a>
		</li><!-- End Register Page Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="pages-login.php">
				<i class="bi bi-box-arrow-in-right"></i>
				<span>Login</span>
			</a>
		</li><!-- End Login Page Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="pages-error-404.php">
				<i class="bi bi-dash-circle"></i>
				<span>Error 404</span>
			</a>
		</li><!-- End Error 404 Page Nav -->

		<li class="nav-item">
			<a class="nav-link collapsed" href="pages-blank.php">
				<i class="bi bi-file-earmark"></i>
				<span>Blank</span>
			</a>
		</li><!-- End Blank Page Nav -->

	</ul>

</aside><!-- End Sidebar-->