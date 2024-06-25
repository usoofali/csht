<?php
require_once ('helpers/querys.php');

$user = new User;
$core = new Core;
$db = new Conexion;


if (isset($_GET['id'])) {
  $sql = "
  SELECT * FROM user
  JOIN staff ON user.user_id = staff.user_id 
  WHERE user.user_id='" . $_GET['id'] . "' ORDER BY staff_id ASC";

  $db->cdp_query($sql);
  $db->cdp_execute();
  $staff = $db->cdp_registro();
  $themes = $user->getFileNamesIn("assets/css");
  // /opt/lampp/htdocs/csht/assets/css
  $languages = $user->getFileNamesIn("helpers/languages");
  
}

if (isset($_GET['notification_id'])) {
  $db = new Conexion;

  $db->cdp_query("UPDATE notification_user SET                
    notification_read = 1                    
  WHERE
    notification_id =:notification_id 
  and user_id = :user_id  
  ");

  $db->bind(':user_id', $user->uid);
  $db->bind(':notification_id', $_GET['notification_id']);
  $db->cdp_execute();

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php include ('views/inc/topbar-script.php'); ?>
  <link href="assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/select2/dist/css/select2.min.css">
  <link type="text/css" href="assets/css/<?php echo $user->theme; ?>" rel="stylesheet">
  </body>

<body>
  <!-- ======= Header ======= -->
  <?php include ('views/inc/topbar.php'); ?>

  <!-- ======= Sidebar ======= -->
  <?php include ('views/inc/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $lang['profile']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item"><?php echo $lang['staff']; ?></li>
          <li class="breadcrumb-item active"><?php echo $lang['profile']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $staff->avatar; ?>" alt="<?php echo $lang['profile']; ?>" class="rounded-circle">
              <h2><?php echo $staff->fname . " " . $staff->lname; ?></h2>
              <h3><?php echo $staff->job; ?></h3>
              <div class="social-links mt-2">
                <a href="<?php echo $staff->twitter; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="<?php echo $staff->facebook; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="<?php echo $staff->instagram; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="<?php echo $staff->linkedin; ?>" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview"><?php echo $lang['overview']; ?></button>
                </li>
                <?php if ($user->uid == $_GET['id'] or $user->userlevel == 9) { ?>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab"
                      data-bs-target="#profile-edit"><?php echo $lang['edit_profile']; ?></button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab"
                      data-bs-target="#profile-settings"><?php echo $lang['settings']; ?></button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab"
                      data-bs-target="#profile-change-password"><?php echo $lang['update_password']; ?></button>
                  </li>
                <?php } ?>
              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title"><?php echo $lang['about']; ?></h5>
                  <p class="small fst-italic"><?php echo $staff->about; ?></p>

                  <h5 class="card-title"><?php echo $lang['profile_details']; ?></h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label "><?php echo $lang['fullname']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->fname . " " . $staff->lname; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['company']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->company; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['job']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->job; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['designation']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->designation; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['country']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->country; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['address']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->address; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['phone']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->phone; ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label"><?php echo $lang['email']; ?></div>
                    <div class="col-lg-9 col-md-8"><?php echo $staff->email; ?></div>
                  </div>

                </div>
                <?php if ($user->uid == $_GET['id'] or $user->userlevel == 9) { ?>
                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- <?php echo $lang['profile']; ?> Edit Form -->
                    <form id="save_changes" enctype="multipart/form-data">
                      <input name="user_id" type="hidden" id="user_id" value="<?php echo $_GET['id']; ?>">
                      <input name="branch" type="hidden" id="branch" value="<?php echo $staff->branch_id; ?>">
                      <input name="userlevel" type="hidden" id="userlevel" value="<?php echo $staff->userlevel; ?>">
                      <div class="row mb-3">
                        <label for="profileImage"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['profile_image']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <img src="<?php echo $staff->avatar; ?>" id="profile_img" alt="profile_img">
                          <input type="file" onchange="validateFileSize();" name="avatar" id="avatar" accept="image/*"
                            hidden>
                          <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image" id="uploadBtn"><i
                                class="bi bi-upload"></i></a>
                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image" id="removeBtn"><i
                                class="bi bi-trash"></i></a>
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="fname" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['fname']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="fname" type="text" class="form-control" id="fname"
                            value="<?php echo $staff->fname; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="lname" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['lname']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="lname" type="text" class="form-control" id="lname"
                            value="<?php echo $staff->lname; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="about" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['about']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <textarea name="about" class="form-control" id="about"
                            style="height: 100px"><?php echo $staff->about; ?></textarea>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="company"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['company']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="company" type="text" class="form-control" id="company"
                            value="<?php echo $staff->company; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['job']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="job" type="text" class="form-control" id="job" value="<?php echo $staff->job; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="designation"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['designation']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="designation" type="text" class="form-control" id="designation"
                            value="<?php echo $staff->designation; ?>" readonly>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Address"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['address']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="address" type="text" class="form-control" id="address"
                            value="<?php echo $staff->address; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['phone']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="phone" type="text" class="form-control" id="phone"
                            value="<?php echo $staff->phone; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['email']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="email"
                            value="<?php echo $staff->email; ?>" readonly>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="gender"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['gender']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <select class="form-control" id="gender" name="gender"
                            placeholder="<?php echo $lang['select']; ?> <?php echo $lang['gender']; ?>">
                            <option value="<?php echo $staff->gender; ?>" selected><?php echo $staff->gender; ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                          <?php echo $lang['profile']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="twitter" type="text" class="form-control" id="twitter"
                            value="<?php echo $staff->twitter; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                          <?php echo $lang['profile']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="facebook" type="text" class="form-control" id="facebook"
                            value="<?php echo $staff->facebook; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                          <?php echo $lang['profile']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="instagram" type="text" class="form-control" id="instagram"
                            value="<?php echo $staff->instagram; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                          <?php echo $lang['profile']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="linkedin" type="text" class="form-control" id="Linkedin"
                            value="<?php echo $staff->linkedin; ?>">
                        </div>
                      </div>
                      <hr>
                      <div class="row mb-3">
                        <label for="account_name"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['account_name']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="account_name" type="text" class="form-control" id="account_name"
                            value="<?php echo $staff->account_name; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="account_number"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['account_number']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="account_number" type="text" class="form-control" id="account_number"
                            value="<?php echo $staff->account_number; ?>">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="account_bank"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['search_bank']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <select class="select2 form-control" style="width: 100%" id="account_bank" name="account_bank"
                            placeholder="Search Bank">
                            <option value="<?php echo $staff->account_bank; ?>">
                              <?php echo getAnyOne("SELECT * FROM bank WHERE bank_id='" . $staff->account_bank . "'")->name; ?>
                            </option>
                          </select>
                        </div>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary"><?php echo $lang['save_changes']; ?></button>
                      </div>
                    </form><!-- End Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-settings">

                    <!-- Settings Form -->
                    <form id="save_settings">
                      <input name="user_id" type="hidden" id="user_id" value="<?php echo $_GET['id']; ?>">

                      <div class="row mb-3">
                        <label for="theme" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['select']; ?>
                          <?php echo $lang['theme']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <div>
                            <?php foreach ($themes as $theme): ?>
                              <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" id="<?= $theme ?>" name="theme"
                                  value="<?= $theme ?>" <?= $theme == $staff->theme ? 'checked' : '' ?>>
                                <label class="form-check-label" for="<?= $theme ?>">
                                  <?= $theme ?>
                                </label>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row mb-3">
                        <label for="theme" class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['select']; ?>
                          <?php echo $lang['language']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <div>
                            <?php foreach ($languages as $language): ?>
                              <?php if($language !== "translate_to_js.php"): ?>
                                <?php $langs = explode(".", $language)[0]; ?>
                              <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" id="<?= $langs ?>" name="language"
                                  value="<?= $langs ?>" <?= $langs == $staff->language ? 'checked' : '' ?>>
                                <label class="form-check-label" for="language">
                                  <?= $lang[$langs] ?>
                                </label>
                              </div>
                              <?php endif; ?>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary"><?php echo $lang['save_changes']; ?></button>
                      </div>
                    </form><!-- End settings Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form id="change_password">
                      <input name="user_id" type="hidden" id="user_id" value="<?php echo $_GET['id']; ?>">

                      <div class="row mb-3">
                        <label for="current-password"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['currentpassword']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="currentpassword" type="password" class="form-control" id="current-password">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="new-password"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['newpassword']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="new-password">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewp-assword"
                          class="col-md-4 col-lg-3 col-form-label"><?php echo $lang['renewpassword']; ?></label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renew-password">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary"><?php echo $lang['update_password']; ?></button>
                      </div>
                    </form><!-- End Change Password Form -->

                  </div>
                <?php } ?>
              </div><!-- End Bordered Tabs -->

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

  <?php include ('views/inc/footer-script.php'); ?> <a href="#"
    class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/select2/dist/js/select2.min.js"></script>
  <script src="datajs/staff_view.js"></script>

</body>

</html>