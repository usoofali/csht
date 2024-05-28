<!DOCTYPE html>
<html lang="en">

<?php 
include('helpers/querys.php');
$userRoles = array(
  9 => "Super User",
  1 => "Student",
  2 => "Admin Officer",
  3 => "Exam Officer",
  4 => "Hod",
  5 => "Cashier",
  6 => "Registrar",
  7 => "Lecturer",
  8 => "Provost"
);

$branches = getAllBranch();
?>

<head>
  <?php include('views/inc/topbar-script.php');?>
  <link href="assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/select2/dist/css/select2.min.css">
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
      <h1><?php echo $lang['add_staff']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['add_staff']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $lang['staff_form']; ?></h5>
              <!-- No Labels Form -->
              <form class="row g-3" id="add_data" enctype="multipart/form-data">
                  <div class="col-md-6">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="col-md-6">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                  </div>
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                  </div>
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  
                  <div class="col-md-6">
                      <input type="file" class="form-control" onchange="validateFileSize();" id="avatar" accept="image/*" name="avatar" placeholder="Avatar">
                  </div>
                  
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                  </div>
                  <div class="col-md-6">
                      <select class="form-control" id="gender" name="gender" placeholder="Select Gender">
                        <option>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                      <input type="text" class="form-control" id="state" name="state" placeholder="Select State">
                  </div>
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="city" name="city" placeholder="Select LGA" >
                  </div>
                  <div class="col-md-12">
                      <input type="address" class="form-control" id="address" name="address" placeholder="Address" >
                  </div>
                  <div class="col-md-6">
                      <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter" value="1" checked >
                      <label class="form-check-label" for="newsletter">Newsletter</label>
                  </div>
                  <div class="col-md-6">
                      <input type="checkbox" class="form-check-input" id="active" name="active" value="1" checked >
                      <label class="form-check-label" for="active">Active</label>
                  </div>

                  <div class="col-md-6">
                    <select class="form-control" id="userlevel" name="userlevel" placeholder="User Level">
                        <option>User Role</option>
                        <?php foreach ($userRoles as $key => $role) { ?>
                            <option value="<?php echo $key; ?>"><?php echo $role; ?></option>
                        <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <select class="form-control" id="branch" name="branch" placeholder="Branch">
                        <?php foreach ($branches as $branch) { ?>
                            <option value="<?php echo $branch->branch_id; ?>"><?php echo $branch->name ." - ".$branch->code; ?></option>
                        <?php } ?>
                    </select>
                  </div>

                  <div class="col-md-12">
                      <textarea class="form-control" value="" id="notes" name="notes" placeholder="Notes"></textarea>
                  </div>
                  <h5 class="card-title"><?php echo $lang['bank_details']; ?></h5>
                  <div class="col-md-12">
                      <select class="select2 form-control custom-select" style="height: 100%" id="account_bank" name="account_bank" placeholder="Search Bank"></select>
                  </div>
                  
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="account_name" name="account_name" placeholder="Account Name">
                  </div>
                  <div class="col-md-6">
                      <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account Number">
                  </div>
                  <div class="text-end">
                      <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                      <button type="submit" class="btn btn-danger  col-4"><?php echo $lang['add_staff']; ?></button>
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
  <script src="assets/select2/dist/js/select2.min.js"></script>
  <script src="datajs/staff.js"></script>
  <?php include('views/inc/footer-script.php');?>  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>