<?php require_once('../../../private/initialize.php'); 
require_login();?>

<?php 
  $id = $_GET['id'] ?? '1';
  $admin = find_record("customer_login", "username" ,$id);
?>

<?php $page_title = 'Show Customer Login'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/customer_login/index.php');
    ?>">&laquo; Back to List</a>
    
    <div class="admin show">
    
        <h2> User Name: <?php echo h($admin['username']); ?></h2>

        <div class = "attributes"> 
        	<dl>
        		<dt>Cid:</dt>
        		<dd> <?php echo h($admin['Cid']); ?> </dd>
        	</dl>
        	
        </div>
        
    </div>
</div>


<?php include(SHARED_PATH . '/staff_footer.php'); ?>