<?php require_once('../../../private/initialize.php'); 
require_login();?>

<?php 
  $id = $_GET['id'] ?? '1';
  $admin = find_record("admins", "id" ,$id);
?>

<?php $page_title = 'Show admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/admin/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="admin show">
    
        <h2> Admin Number: <?php echo h($admin['id']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>First Name:</dt>
        		<dd> <?php echo h($admin['first_name']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Last Name:</dt>
        		<dd> <?php echo h($admin['last_name']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Email:</dt>
        		<dd> <?php echo h($admin['email']); ?> </dd>
        	</dl>
        	<dl>
        		<dt>Username:</dt>
        		<dd> <?php echo h($admin['username']); ?> </dd>
        	</dl>
        	
        </div>
        
    </div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>