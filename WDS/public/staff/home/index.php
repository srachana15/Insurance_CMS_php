<?php require_once('../../../private/initialize.php'); 

require_login();
?>

<?php

$Home_set = find_all("home");

?>

<?php $page_name='Home'; ?>
<?php $page_title='Home'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="Home Listing"> 
		<h1>Homes</h1>

	<div id="actions">
		<a class="action" href="<?php echo url_for('staff/home/new.php'); ?>">Create Home</a>
	</div>

	<table class="list">
  	  <tr>
        <th>Home_id</th>
        <th>Purchase_Date</th>
        <th>Home_value</th>
  	    <th>Area</th>
  	    <th>Home_type</th>
  	    <th>Auto_fire</th>
  	    <th>Home_sec</th>
  	    <th>Pool</th>
  	    <th>Basement</th>
  	    <th>Policy_no</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($Home = mysqli_fetch_assoc($Home_set)) { ?>
        <tr>
          <td><?php echo h($Home['Home_id']); ?></td>
          <td><?php echo h($Home['Purchase_Date']); ?></td>
          <td><?php echo h($Home['Home_value']); ?></td>
          <td><?php echo h($Home['Area']); ?></td>
          <td><?php echo h($Home['Home_type']); ?></td>
          <td><?php echo $Home['Auto_fire' ]== 1 ? 'Y' : 'N'; ?></td>
          <td><?php echo $Home['Home_sec'] == 1 ? 'Y' : 'N'; ?></td>
          <td><?php echo h($Home['Pool']); ?></td>
          <td><?php echo $Home['Basement']== 1 ? 'Y' : 'N'; ?></td>
          <td><?php echo h($Home['Policy_no']); ?></td>
          <td><a class="action" href="<?php echo url_for('/staff/home/show.php?id=' . h(u($Home['Home_id']))); ?>">View</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/home/edit.php?id=' . h(u($Home['Home_id']))); ?>">Edit</a></td>
          <td><a class="action" href="<?php echo url_for('/staff/home/delete.php?id=' . h(u($Home['Home_id']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

    <?php mysqli_free_result($Home_set); ?>
		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>