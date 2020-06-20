
<?php require_once('../../../private/initialize.php'); 


require_login();
?>

<?php 
  $id = $_GET['id'] ?? '1';
  $vehicle = find_record("vehicle", "Vin" ,$id);
?>

<?php $page_title = 'Show Vehicle'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/vehicle/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="vehicle show">
    
         <h2> VIN: <?php echo h($vehicle['Vin']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>Make:</dt>
        		<dd> <?php echo h($vehicle['V_make']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Model:</dt>
        		<dd> <?php echo h($vehicle['V_model']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Manuacture Year:</dt>
        		<dd> <?php echo h($vehicle['V_year']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Vehicle Status:</dt>
        		<dd> <?php echo h($vehicle['V_status']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Number:</dt>
        		<dd> <?php echo h($vehicle['Policy_no']); ?> </dd>
        	</dl>
        	
        </div>
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

