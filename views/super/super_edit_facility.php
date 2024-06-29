<!DOCTYPE html>
<html lang="en">
<?php include ('helpers/querys.php'); ?>
<?php

if (isset($_GET['facility_id'])) {
    $facility_id = $_GET['facility_id'];
    $facility = getFacility("facility_id=" . $facility_id)[0];
}

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
            <h1><?php echo $lang['edit_facility']; ?></h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
                    <li class="breadcrumb-item active"><?php echo $lang['edit_facility']; ?></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $lang['facility_form']; ?></h5>
                <!-- No Labels Form -->
                <form class="row g-3" id="edit_data">
                    <div class="col-md-12">
                        <input type="text" value="<?php echo $facility->name; ?>" class="form-control" id="name"
                            name="name" placeholder="Name">
                        <input type="hidden" value="<?php echo $facility_id; ?>" class="form-control" id="facility_id"
                            name="facility_id">
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="<?php echo $facility->state; ?>" class="form-control" id="state" name="state"
                            placeholder="<?php echo $lang['select']; ?> <?php echo $lang['state']; ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" value="<?php echo $facility->city; ?>" class="form-control" id="city" name="city"
                            placeholder="<?php echo $lang['select']; ?> <?php echo $lang['lga']; ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="address" value="<?php echo $facility->address; ?>" class="form-control" id="address" name="address"
                            placeholder="<?php echo $lang['address']; ?>">
                    </div>
                    <div class="col-md-6">
                        <select class="form-control" id="level" name="level">
                            <option value=""><?php echo $lang['select']; ?> <?php echo $lang['facility']; ?>
                                <?php echo $lang['level']; ?></option>
                            <option value="Primary" <?= $facility->level == "PRIMARY" ? 'selected' : '' ?>><?php echo $lang['primary']; ?></option>
                            <option value="Secondary" <?= $facility->level == "SECONDARY" ? 'selected' : '' ?>><?php echo $lang['secondary']; ?></option>
                            <option value="Tertiary" <?= $facility->level == "TERTIARY" ? 'selected' : '' ?>><?php echo $lang['tertiary']; ?></option>
                        </select>
                    </div>
                    
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary"
                            onclick="window.location.href='super_view_facility.php'"><?php echo $lang['facility']; ?>
                            <?php echo $lang['list']; ?></button>
                        <button type="submit"
                            class="btn btn-danger col-4"><?php echo $lang['edit_facility']; ?></button>
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
    <script src="datajs/facility.js"></script>
    <?php include ('views/inc/footer-script.php'); ?> <a href="#"
        class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
</body>

</html>