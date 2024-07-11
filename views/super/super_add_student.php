<!DOCTYPE html>
<html lang="en">

<?php

include ('helpers/querys.php');
$branches = getAllBranch();

?>

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
      <h1><?php echo $lang['add_student']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['add_student']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $lang['student_form']; ?></h5>
        <!-- No Labels Form -->
        <form class="row g-3" id="add_data" enctype="multipart/form-data">
          <div class="col-md-6">
            <input type="email" class="form-control" id="email" name="email"
              placeholder="<?php echo $lang['email']; ?>">
          </div>
          <div class="col-md-6">
            <input type="password" class="form-control" value="12345678" id="password" name="password"
              placeholder="<?php echo $lang['password']; ?>" readonly>
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $lang['fname']; ?>">
          </div>
          <div class="col-md-6">
            <input type="text" class="form-control" id="lname" name="lname" placeholder="<?php echo $lang['lname']; ?>">
          </div>

          <div class="col-md-6">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="<?php echo $lang['phone']; ?>">
          </div>
          <div class="col-md-6">
            <select class="form-control" id="gender" name="gender">
              <option><?php echo $lang['select']; ?> <?php echo $lang['gender']; ?></option>
              <option value="Male"><?php echo $lang['male']; ?></option>
              <option value="Female"><?php echo $lang['female']; ?></option>
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control" id="state" name="state">
              <option value=""><?php echo $lang['select']; ?> <?php echo $lang['state']; ?></option>
              <?php $states = getAllState(); ?>
              <?php foreach ($states as $state) { ?>
                <option value="<?php echo $state->state_id; ?>">
                  <?php echo $state->name; ?>
                </option>
              <?php } ?>
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control" id="city" name="city">
            </select>
          </div>
          <div class="col-md-12">
            <input type="address" class="form-control" id="address" name="address"
              placeholder="<?php echo $lang['address']; ?>">
          </div>
          <div class="col-md-6">
            <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" checked>
            <label class="form-check-label" for="newsletter"><?php echo $lang['newsletter']; ?></label>
          </div>
          <div class="col-md-6">
            <input type="checkbox" class="form-check-input" id="active" name="active" value="1" checked>
            <label class="form-check-label" for="active"><?php echo $lang['active']; ?></label>
          </div>

          <?php if ($user->userlevel == 9): ?>
            <div class="col-md-6">
              <select class="form-control" id="branch" name="branch">
                <option value=""><?php echo $lang['select']; ?>   <?php echo $lang['branch']; ?></option>
                <?php foreach ($branches as $branch) { ?>
                  <option value="<?php echo $branch->branch_id; ?>">
                    <?php echo $branch->name . " - " . $branch->code; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control" id="dept" name="dept">
              </select>
            </div>
            <div class="col-md-6">
              <select class="form-control" id="session" name="session">
              </select>
            </div>
          <?php else: ?>
            <input type="hidden" value="<?php echo $user->branch; ?>" class="form-control" id="branch" name="branch">
            <div class="col-md-6">
              <?php $deptes = getDept("branch_id='" . $user->branch . "'"); ?>
              <select class="form-control" id="dept" name="dept">
                <option value=""><?php echo $lang['select']; ?>   <?php echo $lang['dept']; ?></option>
                <?php foreach ($deptes as $dept) { ?>
                  <option value="<?php echo $dept->dept_id; ?>">
                    <?php echo $dept->name . " - " . $dept->iso; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-md-6">
              <?php $sessiones = getSession("branch_id='" . $user->branch . "'"); ?>
              <select class="form-control" id="session" name="session">
                <option value=""><?php echo $lang['select']; ?>   <?php echo $lang['session']; ?></option>
                <?php foreach ($sessiones as $session) { ?>
                  <option value="<?php echo $session->session_id; ?>">
                    <?php echo $session->session; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          <?php endif ?>
          <div class="col-md-6">
            <select class="form-control" onchange="validateFileSize();" id="status" name="status">
              <option value=""><?php echo $lang['select']; ?> <?php echo $lang['status']; ?></option>
              <option value="fresh"><?php echo $lang['fresh']; ?></option>
              <option value="returning"><?php echo $lang['returning']; ?></option>
              <option value="retrainee"><?php echo $lang['retrainee']; ?></option>
              <option value="resiting"><?php echo $lang['resiting']; ?></option>
              <option value="graduate"><?php echo $lang['graduated']; ?></option>
            </select>
          </div>
          <div class="col-md-6">
            <input type="file" class="form-control" onchange="validateFileSize();" id="avatar" accept="image/*"
              name="avatar" placeholder="<?php echo $lang['avatar']; ?>">
          </div>
          <div class="col-md-12">
            <textarea class="form-control" value="" id="notes" name="notes"
              placeholder="<?php echo $lang['notes']; ?>"></textarea>
          </div>
          <div class="text-end">
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
            <button type="submit" class="btn btn-danger  col-4"><?php echo $lang['add_student']; ?></button>
          </div>
        </form>
      </div>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('views/inc/footer.php'); ?>
  <?php include ('views/inc/footer-script.php'); ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/select2/dist/js/select2.min.js"></script>
  <script src="datajs/student.js"></script>
</body>

</html>