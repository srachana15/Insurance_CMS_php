<?php require_once('../../private/initialize.php'); ?>

<?php //unset($_SESSION['admin_id']); ?>

<?php require_login(); ?>

<?php $page_title = ' Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <div id="content">
     <div id="main-menu">
            <h2> Main Menu</h2>
            <ul>
                <li><a href="<?php echo url_for('/staff/admin/index.php'); ?>">Admin</a></li>
                <li><a href="<?php echo url_for('/staff/customer_login/index.php'); ?>">Customer Login</a></li>
                <li><a href="<?php echo url_for('/staff/request/index.php'); ?>">Requests</a></li>
                <li><a href="<?php echo url_for('/staff/customer/index.php'); ?>">Customer</a></li>
                <li><a href="<?php echo url_for('/staff/policy/index.php'); ?>">Policy</a></li>
                <li><a href="<?php echo url_for('/staff/invoice/index.php'); ?>">Invoice</a></li>
                <li><a href="<?php echo url_for('/staff/payment/index.php'); ?>">Payment</a></li>
                <li><a href="<?php echo url_for('/staff/home/index.php'); ?>">Home</a></li>
                <li><a href="<?php echo url_for('/staff/vehicle/index.php'); ?>">Vehicle</a></li>
                <li><a href="<?php echo url_for('/staff/driver/index.php'); ?>">Driver</a></li>
                <li><a href="<?php echo url_for('/staff/vehicle_driver/index.php'); ?>">Vehicle-Driver</a></li>
            </ul>
        </div>
    </div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
