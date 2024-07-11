<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="<?php echo $core->logo; ?>" alt="">
        <span class="d-none d-lg-block"><?php echo $core->site_acronyme; ?></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <!-- <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>End Search Icon -->

        <li class="nav-item dropdown">

            <div id="ajax_response"></div>

        </li><!-- End Notification Nav -->
        <li class="nav-item dropdown">
          <div id="ajax_messages"></div>
        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo $user->avatar?>" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user->name?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $user->name?></h6>
              <span><?php echo $user->userrole?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span><?php echo $lang['my_profile']; ?></span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span><?php echo $lang['signout']; ?></span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <audio id="chatAudio">
		<source src="assets/notify.mp3" type="audio/mpeg">
	</audio>

  <audio id="msgAudio">
		<source src="assets/simple.mp3" type="audio/mpeg">
	</audio>