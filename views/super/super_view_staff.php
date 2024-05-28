<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('views/inc/topbar-script.php');?>
  <?php $user = new User;?>
  <link type="text/css" href="assets/css/<?php echo $user->theme;?>" rel="stylesheet">
</head>

<body onload="cdp_load(1);">
  <!-- ======= Header ======= -->
  <?php include('views/inc/topbar.php');?>

  <!-- ======= Sidebar ======= -->
  <?php include('views/inc/sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $lang['view_staff']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['view_staff']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
              <div class="card-body">
                  <h5 class="card-title">All <span>| Staff</span></h5>
                  <div class="row mb-3">
                      <div class=" col-sm-12 col-md-4 mb-2">
                          <div class="input-group">
                              <input type="text" name="search" id="search" class="form-control input-sm float-right" placeholder="<?php echo $lang['search'] ?>" onkeyup="cdp_load(1);">
                              <div class="input-group-append input-sm">
                                  <button type="submit" class="btn btn-info"><i class="bi bi-search"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="outer_div"></div>

      </div>
    </section>
    
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
<?php include('views/inc/footer.php');?>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php include('views/inc/footer-script.php');?> 
<script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="assets/sweetalert/sweetalert2.all.min.js"></script>
<script src="datajs/staff_view.js"></script>

</body>
</html>