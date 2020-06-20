<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

    <div class="banner">
      <h1>Auto Insurance</h1>
      <div class="wrapper1">
        <h1>Only pay for what you need</h1>
        <div class="wrapper2">
            <span class="select" style="width:200px;">
              <select>
                <option value="0">Auto</option>
                <option value="1">Bundle Home+Auto</option>
              </select>
            </span>
            <span class="a2">
              <h3><a href="<?php echo url_for('/customer/new.php'); ?>">Get a quote</a></h2>
            </span>
          </div>
        </div>
      </div>

    <div class="why-wds">
      <p id="c0">Discounts that help you save</p>
      <div class="a1">
        <span class="a2">
          <h2>Online Purchase Discount</h2>
          <p>You could save instantly when you purchase your policy online.</p>
        </span>
        <span class="a2">
          <h2>Bundle and Save</h2>
          <p>You could save $842 on customized auto and home insurance.</p>
        </span>
        <span class="a2">
          <h2>RightTrack</h2>
          <p>Get rewarded for your good driving behavior by saving up to 30% on your policy.</p>
        </span>
      </div>
    </div>
    <div class="coverage">
      <p id="c0">Un-complicating auto coverage</p>
      <p id="c1">Understanding your coverage options shouldn't be so hard. We'll guide you through available coverage types, starting with who and what is covered.</p>
      <div class="c1">
        <span class="c2">
          <p>For you</p>
        </span>
        <span class="c2">
          <p>For others</p>
        </span>
        <span class="c2">
          <p>Your car</p>
        </span>
      </div>
    </div>
    <div class="coverage">
      <div class="c1">
        <span class="c3">
          <h3>What comes standard</h3>
          <p>The coverage you need</p>
          <ul>
            <li>Dwelling</li>
            <li>Bodily Injury Liability</li>
            <li>Property Damage</li>
            <li>Medical Payments</li>
          </ul>
        </span>
        <span class="c3">
          <h3>Add-on protection & coverage</h3>
          <p>Customized insurance for you</p>
          <ul>
            <li>Better Car Replacement</li>
            <li>Towing & Labor</li>
            <li>Rental Car Coverage</li>
          </ul>
        </span>
      </div>
    </div>



<?php include(SHARED_PATH . '/public_footer.php'); ?>
