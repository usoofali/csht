<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('views/inc/topbar-script.php');?>
  <link href="assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <?php $user = new User;?>
  <link type="text/css" href="assets/css/<?php echo $user->theme;?>" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include('views/inc/topbar.php');?>

  <!-- ======= Sidebar ======= -->
  <?php include('views/inc/sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $lang['add_branch']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['add_branch']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $lang['branch_form']; ?></h5>
              <!-- No Labels Form -->
              <form class="row g-3" id="add_data">
                <div class="col-md-6">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>
                <div class="col-md-6">
                  <input type="text" class="form-control" id="code" name="code" placeholder="Code">
                </div>
                <div class="col-md-11">
                  <input type="address" class="form-control" id="address" name="address" placeholder="Address">
                </div>

                <div class="col-md-1 col-sm-12">
                  <input type="color" class="form-control form-control-color" name="color" id="color" value="#2f35a6" placeholder="Color" title="Choose your color">
                </div>

                <div class="text-end">
                  <button type="button" class="btn btn-secondary" onclick="window.location.href='super_view_branch.php'">Branch List</button>
                  <button type="submit" class="btn btn-danger col-4"><?php echo $lang['add_branch']; ?></button>
                  
                </div>
              </form>
            </div>
          </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('views/inc/footer.php');?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="datajs/branch.js"></script>
  <?php include('views/inc/footer-script.php');?>  
  
</body>

</html>

