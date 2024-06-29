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
      <h1><?php echo $lang['add_course']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['add_course']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $lang['course_form']; ?></h5>
        <!-- No Labels Form -->
        <form class="row g-3" id="add_data">

          <div class="col-md-12">
            <input type="text" class="form-control" id="title" name="title"
              placeholder="<?php echo $lang['course']; ?> <?php echo $lang['title']; ?>">
          </div>

          <div class="col-md-6">
            <input type="text" class="form-control" id="code" name="code"
              placeholder="<?php echo $lang['course']; ?> <?php echo $lang['code']; ?>">
          </div>

          <div class="col-md-6">
            <select class="form-control" id="unit" name="unit">
              <option value=""><?php echo $lang['select']; ?> <?php echo $lang['unit']; ?></option>
              <option value="1">1 <?php echo $lang['unit']; ?></option>
              <option value="2">2 <?php echo $lang['unit']; ?></option>
              <option value="3">3 <?php echo $lang['unit']; ?></option>
              <option value="4">4 <?php echo $lang['unit']; ?></option>
              <option value="5">5 <?php echo $lang['unit']; ?></option>
              <option value="6">6 <?php echo $lang['unit']; ?></option>
            </select>
          </div>

          <div class="col-md-6">
            <select class="form-control" id="semester" name="semester">
              <option value=""><?php echo $lang['select']; ?> <?php echo $lang['semester']; ?></option>
              <option value="First"><?php echo $lang['first']; ?></option>
              <option value="Second"><?php echo $lang['second']; ?></option>
            </select>
          </div>

          <div class="col-md-6">
            <select class="form-control" id="level" name="level">
              <option value=""><?php echo $lang['select']; ?> <?php echo $lang['level']; ?></option>
              <option value="100 Level">100 <?php echo $lang['level']; ?></option>
              <option value="200 Level">200 <?php echo $lang['level']; ?></option>
              <option value="300 Level">300 <?php echo $lang['level']; ?></option>
            </select>
          </div>

          <div class="text-end">
            <button type="button" class="btn btn-secondary"
              onclick="window.location.href='super_view_course.php'"><?php echo $lang['course']; ?>
              <?php echo $lang['list']; ?></button>
            <button type="submit" class="btn btn-danger col-4"><?php echo $lang['add_course']; ?></button>
          </div>
        </form>
      </div>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('views/inc/footer.php'); ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <?php include ('views/inc/footer-script.php'); ?>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/select2/dist/js/select2.min.js"></script>
  <script src="datajs/course.js"></script>
</body>
</html>