<?php require_once('../../private/initialize.php');

customer_require_login();

$id = $_GET['id'];


if (is_post_request()) {

$report = [];
$report['Cid'] = $_POST['Cid'] ?? '';
$report['Policy'] = $_POST['Policy'] ?? '';

redirect_to(url_for('/customer/display.php?id=' . h(u($report['Cid'])) . '&id2=' . h(u($report['Policy'])) ));
 }
 ?>


<?php $page_title = 'Auto Insurance'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>



    <div class="content">
      <h1>Welcome Back</h1>
      <h3>User: <?php echo $_SESSION['username'] ?? ''; ?></h3>

    	<!--<a class="back-link" href="<?php echo url_for('/customer/index.php'); ?>">&laquo; Back</a> -->


    		<form action="<?php echo url_for('/customer/show.php'); ?>" method="post">
    		 <dl>
        		<dt>Enter Customer Number</dt>
        		<dd><input type="number" name="Cid" required min ="1" max = "999999" value="<?php echo h($id); ?>" /></dd>
      	</dl>
        <dl>
            <dt>Enter Policy Number</dt>
            <dd><input type="number" name="Policy" required min ="100000000000" max = "999999999999" value="<?php //echo h($customer['Cid']); ?>" /></dd>
        </dl>
      		<!--
      		  <dl>
        		<dt>Enter Password</dt>
        		<dd><input type="text" name="Pass" required value="<?php //echo h($customer['Cid']); ?>" /></dd>
      		</dl>
      	-->
      		<div id="operations">
        		<input type="submit" value="submit" />
      		</div>

          <div>

                <h3 style="color:black;"><a href="<?php echo url_for('/customer/logout.php'); ?>">Logout</a></li><h3>
                <h4><a href="<?php echo url_for('/customer/edit.php?id=' . h($id)); ?>">Change Password</a></h4><br>

          </div>

      	</form>

    </div>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
