<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/public_header.php'); ?>

<div class="banner">
  <h1>Home Insurance</h1>
  <div class="wrapper1">
    <h1>Only pay for what you need</h1>
    <div class="wrapper2">
        <span class="select" style="width:200px;">
          <select>
            <option value="0">Home</option>
            <option value="1">Bundle Home+Auto</option>
          </select>
        </span>
        <span class="a2">
          <h3><a href="<?php echo url_for('/customer/new.php'); ?>">Get a quote</a></h2>
        </span>
      </div>
    </div>
  </div>
    <div class="coverage">
      <p id="c0">Un-complicating home coverage</p>
      <p id="c1">Understanding your coverage options shouldn't be so hard. We'll guide you through available coverage types, starting with what is covered.</p>
      <div class="c1">
        <span class="c3">
          <h3>What comes standard</h3>
          <p>The coverage you need</p>
          <ul>
            <li>Dwelling</li>
            <li>Personal possessions</li>
            <li>Liability</li>
            <li>Additional living expenses</li>
          </ul>
        </span>
        <span class="c3">
          <h3>Add-on protection & coverage</h3>
          <p>Customized insurance for you</p>
          <ul>
            <li>Coverage for valuables</li>
            <li>Water backup & sump pump overflow</li>
            <li>Inflation protection</li>
          </ul>
        </span>
      </div>
    </div>


    <div class="why-wds">
      <p>Discounts that help you save</p>
      <div class="a1">
        <span class="a2">
          <h2>Protective Devices</h2>
          <p>If you have devices like smoke alarms, deadbolts, and burglar alarms, you'll see savings.</p>
        </span>
        <span class="a2">
          <h2>Newly Purchased Home</h2>
          <p>If you just bought a new place, you qualify for savings.</p>
        </span>
        <span class="a2">
          <h2>Bundle and Save</h2>
          <p>You could save $842 on customized home and auto insurance.</p>
        </span>
      </div>
    </div>





<?php include(SHARED_PATH . '/public_footer.php'); ?>
