<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Alerts - Community School</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo $core->favicon; ?>" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: <?php echo $lang['site']; ?>
  * Template URL: https://csht.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 7 2024 with Bootstrap v5.3.3
  * Author: CSHT.com
  * License: https://csht.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include('views/inc/topbar.php');?><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link " data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.php" class="active">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.php">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.php">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.php">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.php">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="components-cards.php">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.php">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.php">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.php">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.php">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.php">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="components-progress.php">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.php">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.php">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.php">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.php">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.php">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.php">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.php">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.php">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.php">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.php">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.php">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.php">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.php">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.php">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.php">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.php">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.php">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.php">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.php">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.php">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Alerts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Components</li>
          <li class="breadcrumb-item active">Alerts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">

              <h5 class="card-title">Default</h5>

              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                A simple primary alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                A simple secondary alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                A simple success alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                A simple danger alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                A simple warning alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-info alert-dismissible fade show" role="alert">
                A simple info alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-light border-light alert-dismissible fade show" role="alert">
                A simple light alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-dark alert-dismissible fade show" role="alert">
                A simple dark alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">With Icon</h5>

              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <i class="bi bi-star me-1"></i>
                A simple primary alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <i class="bi bi-collection me-1"></i>
                A simple secondary alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                A simple success alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                A simple danger alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-1"></i>
                A simple warning alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="bi bi-info-circle me-1"></i>
                A simple info alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-dark alert-dismissible fade show" role="alert">
                <i class="bi bi-folder me-1"></i>
                A simple dark alert with icon—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Outlined</h5>

              <div class="alert border-primary alert-dismissible fade show" role="alert">
                A simple primary outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-secondary alert-dismissible fade show" role="alert">
                A simple secondary outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-success alert-dismissible fade show" role="alert">
                A simple success outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-danger alert-dismissible fade show" role="alert">
                A simple danger outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-warning alert-dismissible fade show" role="alert">
                A simple warning outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-info alert-dismissible fade show" role="alert">
                A simple info outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-light alert-dismissible fade show" role="alert">
                A simple light outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert border-dark alert-dismissible fade show" role="alert">
                A simple dark outlined alert—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            </div>
          </div>

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Solid Color</h5>

              <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                A simple primary alert with solid color—check it out!
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-secondary bg-secondary text-light border-0 alert-dismissible fade show" role="alert">
                A simple secondary alert with solid color—check it out!
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                A simple success alert with solid color—check it out!
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                A simple danger alert with solid color—check it out!
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-warning bg-warning border-0 alert-dismissible fade show" role="alert">
                A simple warning alert with solid color—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-info bg-info border-0 alert-dismissible fade show" role="alert">
                A simple info alert with solid color—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-light bg-light border-0 alert-dismissible fade show" role="alert">
                A simple light alert with solid color—check it out!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-dark bg-dark text-light border-0 alert-dismissible fade show" role="alert">
                A simple dark alert with solid color—check it out!
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">With Heading &amp Separator</h5>

              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Primary Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Secondary Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Success Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Danger Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-warning  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Warning Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-info  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Info Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-light border-light alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Lignt Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

              <div class="alert alert-dark  alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Dark Heading</h4>
                <p>Et suscipit deserunt earum itaque dignissimos recusandae dolorem qui. Molestiae rerum perferendis laborum. Occaecati illo at laboriosam rem molestiae sint.</p>
                <hr>
                <p class="mb-0">Temporibus quis et qui aspernatur laboriosam sit eveniet qui sunt.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include('views/inc/footer.php');?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>