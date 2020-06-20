<?php require_once('../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

    <div class="banner">
        <img src="<?php echo url_for('/images/homepage_assets/nyc2.jpg'); ?>" alt="NYC skyline">
        <p>Whether you live in New York City, Chicago, Boston or somewhere on Long Island,
          WDS rewards your responsible choices with Auto and Home Insurance Discounts that could help you save hundreds of dollars a year.
        At WDS, we have the products and customer service to back up our "worldly" claims. Give us a try, and you'll see we stand by our values and our customers.</p>
    </div>

    <div class="why-wds">
      <h1>Why choose WDS Insurance?</h1>
      <p>WDS customizes your coverage so you only pay for what you need.</p>
      <div class="a1">
        <span class="a2">
          <h2>Multi-policy discount</h2>
          <p>Save more when you protect more: auto, home & more</p>
        </span>
        <span class="a2">
          <h2>Better car replacement</h2>
          <p>If you're in an accident, your car will be replaced with one that meets your needs</p>
        </span>
        <span class="a2">
          <h2>24/7 roadside assistance</h2>
          <p>If you need us we'll be there, anytime, anywhere</p>
        </span>
      </div>
    </div>

    <div class="quote">
      <h2>Ready for a quote?</h2>
      <div class="a1">
        <span class="a2">
          <h3><a href="<?php echo url_for('/about_wds/home_index.php'); ?>">Home Insurance</a></h2>
        </span>
        <span class="a2">
          <h3><a href="<?php echo url_for('/about_wds/auto_index.php'); ?>">Auto Insurance</a></h2>
        </span>
      </div>
    </div>





<?php include(SHARED_PATH . '/public_footer.php'); ?>
