<aside id="sidebar" class="sidebar">

	<ul class="sidebar-nav" id="sidebar-nav">
		<li class="nav-item">
			<a class="nav-link " href="index.php">
			<i class="bi bi-grid"></i>
			<span><?php echo $userrole." ".$lang['dashboard']; ?></span>
			</a>
			<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#branch-nav" data-bs-toggle="collapse" href="#">
			<i class="bi bi-menu-button-wide"></i><span><?php echo $lang['branch']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
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
		</li>
		<li class="nav-heading">Settings</li>

	</ul>

</aside><!-- End Sidebar-->