
<?php require_once('../../../private/initialize.php'); 

require_login();?>

<?php 
  $id = $_GET['id'] ?? '1';
  $home = find_record("home", "Home_id" ,$id);
?>

<?php $page_title = 'Show Home'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/home/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="home show">
    
        <h2> Home Number: <?php echo h($home['Home_id']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>Date of Purchase:</dt>
        		<dd> <?php echo h($home['Purchase_Date']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Home Value:</dt>
        		<dd> <?php echo h($home['Home_value']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Area:</dt>
        		<dd> <?php echo h($home['Area']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Home Type:</dt>
        		<dd> <?php echo h($home['Home_type']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Fire Safety:</dt>
        		<dd> <?php echo h($home['Auto_fire']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Home Security:</dt>
        		<dd> <?php echo h($home['Home_sec']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Pool:</dt>
        		<dd> <?php echo h($home['Pool']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Basement:</dt>
        		<dd> <?php echo h($home['Basement']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Number:</dt>
        		<dd> <?php echo h($home['Policy_no']); ?> </dd>
        	</dl>
        	

        </div>
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

