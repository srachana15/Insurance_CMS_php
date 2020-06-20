<?php require_once('../../../private/initialize.php'); 
require_login();?>


<?php $request_set = find_all("request"); ?>

<?php $page_name='request'; ?>
<?php $page_title='request'; ?>

<?php include(SHARED_PATH . '/staff_header.php'); ?>

	<div id="content">
		<div class="request Listing"> 
		<h1>requests</h1>

	<table class="list">
  	  <tr>
        <th>Time Stamp</th>
        <th>First Name</th>
        <th>Last Name</th>
  	    <th>Email</th>
        <th>St</th>
  	    <th>City</th>
  	    <th>State</th>
  	    <th>Zipcode</th>
  	    <th>Gender</th>
  	    <th>DOB</th>
  	    <th>M_Status</th>
  	    <th>C_Type</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>        
  	  </tr>

  	  <?php while($request = mysqli_fetch_assoc($request_set)) { ?>
        <tr>
          <td><?php echo h($request['Request_time']); ?></td>
          <td><?php echo h($request['Fname']); ?></td>
          <td><?php echo h($request['Lname']); ?></td>
          <td><?php echo h($request['Email']); ?></td>
          <td><?php echo h($request['St']); ?></td>
          <td><?php echo h($request['City']); ?></td>
          <td><?php echo h($request['State']); ?></td>
          <td><?php echo h($request['Zipcode']); ?></td>
          <td><?php echo h($request['Gender']); ?></td>
          <td><?php echo h($request['DOB']); ?></td>
          <td><?php echo h($request['M_Status']); ?></td>
          <td><?php echo h($request['Itype']); ?></td>    	    

          <td><a class="action" href="<?php echo url_for('/staff/request/delete.php?id=' . h(u($request['Request_time']))); ?>">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

<?php

    mysqli_free_result($request_set);

?>

		</div>
	</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>