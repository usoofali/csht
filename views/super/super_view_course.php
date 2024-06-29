<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('views/inc/topbar-script.php'); ?>
  <link href="assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
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
      <h1><?php echo $lang['view_course']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['view_course']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
      <div>
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title"><?php echo $lang['all']; ?><span> | 100 <?php echo $lang['level']; ?></span></h5>
              <div class="ms-auto">
                <button type="button" class="btn btn-success import-courses" data-bs-toggle="tooltip"
                  data-bs-placement="right"
                  title="Example format: title: Use of English, code:GNS 102, unit:2, semester:Second, level:100 Level."><i
                    class="bi bi-upload"> <?php echo $lang['upload_course']; ?></i></button>
              </div>
              <table id='level_one' class="display responsive nowrap" width="100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col"><?php echo $lang['title']; ?></th>
                    <th scope="col"><?php echo $lang['code']; ?></th>
                    <th scope="col"><?php echo $lang['unit']; ?></th>
                    <th scope="col"><?php echo $lang['semester']; ?></th>
                    <th scope="col"><?php echo $lang['action']; ?></th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section dashboard">
      <div>
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title"><?php echo $lang['all']; ?><span> | 200 <?php echo $lang['level']; ?></span></h5>
              <table id='level_two' class="display responsive nowrap" width="100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Code</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section dashboard">
      <div>
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title"><?php echo $lang['all']; ?> <span> | 300 <?php echo $lang['level']; ?></span></h5>
              <table id='level_three' class="display responsive nowrap" width="100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Code</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->

  <?php include ('views/inc/footer.php'); ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <?php include ('views/inc/footer-script.php'); ?>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="datajs/course_list.js"></script>
  <script src="datajs/course.js"></script>
  <script src="assets/excel/xlsx.full.min.js"></script>
  

</body>

</html>