
<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php 
  $id = $_GET['id'] ?? '1';
  $policy = find_record("policy", "Policy_no" ,$id);
?>

<?php $page_title = 'Show Policy'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/policy/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="policy show">
    
        <h2> Policy Number: <?php echo h($policy['Policy_no']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>Policy Type:</dt>
        		<dd> <?php echo h($policy['P_Type']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Customer ID:</dt>
        		<dd> <?php echo h($policy['Cid']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Start:</dt>
        		<dd> <?php echo h($policy['Start_Date']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Expiry:</dt>
        		<dd> <?php echo h($policy['End_Date']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Premium Amount:</dt>
        		<dd> <?php echo h($policy['Premium']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Policy Status:</dt>
        		<dd> <?php echo h($policy['Status']); ?> </dd>
        	</dl>
        	
        </div>
        
    </div>
</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>

