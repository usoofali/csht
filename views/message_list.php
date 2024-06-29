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
      <h1><?php echo $lang['view_message_list']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['view_message_list']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-12">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h5 class="card-title"><?php echo $lang['all']; ?> <span>| <?php echo $lang['message']; ?></span></h5>
              <div class="ms-auto">
                <button type="button" class="btn btn-success read-all-message"><i class="bi bi-eye"></i>
                  <?php echo $lang['mark_all_read']; ?></button>
                <button type="button" class="btn btn-success delete-all-message"><i class="bi bi-trash"></i>
                  <?php echo $lang['delete_all_messages']; ?></button>
              </div>
              <table id='message' class="display responsive nowrap" width="100%">
                <thead>
                  <tr>
                    <th scope="col"><?php echo $lang['from']; ?></th>
                    <th scope="col"><?php echo $lang['subject']; ?></th>
                    <th scope="col"><?php echo $lang['message']; ?></th>
                    <th scope="col"><?php echo $lang['date']; ?></th>
                    <th scope="col"><?php echo $lang['status']; ?></th>
                    <th scope="col"><?php echo $lang['action']; ?></th>
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
  <script src="datajs/messages.js"></script>

</body>

</html>