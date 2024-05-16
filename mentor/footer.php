<footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
            <span class="">Community School</span>
          </a>
          <div class="footer-contact pt-3">
            <p><?php echo $core->c_address ?>,</p>
            <p><?php echo $core->c_city ?>, <?php echo $core->c_postal ?></p>
            <p>Zamfara State, Nigeria.</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+<?php echo $core->c_phone ?></span></p>
            <p><strong>Email:</strong> <span><?php echo $core->site_email ?></span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About us</a></li>
            <li><a href="courses.php">Programmes</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Programmes</h4>
          <ul>
            <li><a href="course-details.php?id=chew">Community Health Extension Worker</a></li>
            <li><a href="course-details.php?id=pt">Pharmacy Technician</a></li>
            <li><a href="course-details.php?id=mlt">Medical Lab. Technician</a></li>
            <li><a href="course-details.php?id=him">Health Information Management</a></li>
            <li><a href="course-details.php?id=ph">Public Health</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our school!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1"><?php echo $core->site_name ?></strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://communityschool.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="<?php echo $core->site_url ?>"><?php echo $core->site_name ?></a> Team
      </div>
    </div>

  </footer>
