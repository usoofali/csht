<!DOCTYPE html>
<html lang="en">
<?php include ('helpers/querys.php'); ?>

<head>
  <?php include ('views/inc/topbar-script.php'); ?>
  <link href="assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/select2/dist/css/select2.min.css">
  <?php $user = new User; ?>
  <link type="text/css" href="assets/css/<?php echo $user->theme; ?>" rel="stylesheet">
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include ('views/inc/topbar.php'); ?>

  <!-- ======= Sidebar ======= -->
  <?php include ('views/inc/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $lang['add_dept']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['add_dept']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $lang['dept_form']; ?></h5>
        <!-- No Labels Form -->
        <form class="row g-3" id="add_data">

          <div class="col-md-6">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
          </div>

          <div class="col-md-6">
            <input type="text" class="form-control" id="iso" name="iso" placeholder="Dept Code">
          </div>
          <div class="col-md-6">
            <?php $staff = getUser("userlevel != 1"); ?>
            <select class="form-select"  id="hod" name="hod" style="height:100%" placeholder="">
              <option value="">Select Head of Department</option>
              <?php foreach ($staff as $key): ?>
                <option value="<?php echo $key->user_id; ?>"><?php echo $key->fname . " " . $key->lname; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="col-md-6">
            <?php $staff = getUser("userlevel != 1"); ?>
            <select class="form-select"  id="exam_officer" name="exam_officer" style="height:100%" placeholder="">
              <option value="">Select Examination Officer</option>
              <?php foreach ($staff as $key): ?>
                <option value="<?php echo $key->user_id; ?>"><?php echo $key->fname . " " . $key->lname; ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="text-end">
            <button type="button" class="btn btn-secondary"
              onclick="window.location.href='super_view_dept.php'"><?php echo $lang['dept']; ?> <?php echo $lang['list']; ?></button>
            <button type="submit" class="btn btn-danger col-4"><?php echo $lang['add_dept']; ?></button>

          </div>
        </form>
      </div>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('views/inc/footer.php'); ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/select2/dist/js/select2.min.js"></script>
  <script src="datajs/dept.js"></script>
  <?php include ('views/inc/footer-script.php'); ?> <a href="#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>