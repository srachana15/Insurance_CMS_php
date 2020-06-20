<?php require_once('../../../private/initialize.php'); 
require_login(); ?>

<?php 
  $id = $_GET['id'] ?? '1';
  $customer = find_record("customer", "Cid" ,$id);
?>

<?php $page_title = 'Show Customer'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/customer/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="customer show">
    
        <h2> Customer Number: <?php echo h($customer['Cid']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>First Name:</dt>
        		<dd> <?php echo h($customer['Fname']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Last Name:</dt>
        		<dd> <?php echo h($customer['Lname']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Street Address:</dt>
        		<dd> <?php echo h($customer['St']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>City:</dt>
        		<dd> <?php echo h($customer['City']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>State:</dt>
        		<dd> <?php echo h($customer['State']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Zipcode:</dt>
        		<dd> <?php echo h($customer['Zipcode']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Gender:</dt>
        		<dd> <?php echo h($customer['Gender']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Date of Birth:</dt>
        		<dd> <?php echo h($customer['DOB']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Maritial Status:</dt>
        		<dd> <?php echo h($customer['M_Status']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Customer Type:</dt>
        		<dd> <?php echo h($customer['C_Type']); ?> </dd>
        	</dl>

        </div>
        
    </div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>

