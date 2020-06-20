  <footer>

    <div class="footer-wrapper">
      <ul style="list-style-type:none;">
        <li><a href="<?php echo url_for('/index.php'); ?>">Home |</a></li>
        <li><a href="<?php echo url_for('/about_wds/contactus.php'); ?>">Contact Us |</a></li>
        <li><a href="<?php echo url_for('/about_wds/tnc.php'); ?>">Terms & Conditions</a></li>
      </ul>
    </div>
    <p>&copy; <?php echo date('Y'); ?>, We Do Secure </p><br>
  </footer>

  <div class="social-media-icons">
    <a id="connect">Connect with us</a>
    <ul style="list-style-type:none;">
      <li><a href="#" target="blank"><i class="fa fa-facebook-f"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-twitter-square"></i></a></li>
      <li><a href="#" target="blank"><i class="fa fa-linkedin-square"></i></a></li>
    </ul>
  </div>

  <div class="disclaimer">
    <p>This is a fictitious company created solely for the creation and
      development of educational training materials.
      Any resemblance to real products or services is purely
      coincidental. Information provided about the products or
      services is also fictitious and should not be construed as
      representative of actual products or services on the market
      in a similar product or service category.</p> <br><br>
  </div>


  </body>
</html>

<?php
  db_disconnect($db);
?>
