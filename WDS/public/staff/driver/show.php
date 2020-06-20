
<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php 
  $id = $_GET['id'] ?? '1';

  $driver = find_record("drivers", "License_no" ,$id);
?>

<?php $page_title = 'Show Driver'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/driver/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="driver show">
    
        <h2>License Number: <?php echo h($driver['License_no']); ?> </h2>


        <div class = "attributes"> 
        	<dl>
        		<dt>First Name:</dt>
        		<dd> <?php echo h($driver['D_Fname']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Last Name:</dt>
        		<dd> <?php echo h($driver['D_Lname']); ?> </dd>
        	</dl>
        	
        	<dl>
        		<dt>Date of Birth:</dt>
        		<dd> <?php echo h($driver['D_DOB']); ?> </dd>
        	</dl>
        	
        
    	</div>
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

