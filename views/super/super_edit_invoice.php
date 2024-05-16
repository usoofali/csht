<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('views/inc/topbar-script.php');?>
</head>

<body>
  <!-- ======= Header ======= -->
  <?php include('views/inc/topbar.php');?>

  <!-- ======= Sidebar ======= -->
  <?php include('views/inc/sidebar.php');?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $lang['edit_invoice']; ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><?php echo $lang['home']; ?></a></li>
          <li class="breadcrumb-item active"><?php echo $lang['edit_invoice']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('views/inc/footer.php');?>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('views/inc/footer-script.php');?>  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>

</html>