<?php
    function log_in_customer($admin) {
  // Renerating the ID protects the admin from session fixation.
    session_regenerate_id();
    $_SESSION['admin_id'] = $admin['Cid'];
    $_SESSION['last_login'] = time();
    $_SESSION['username'] = $admin['username'];
    return true;
  }

  function logged_out_customer() {
    unset($_SESSION['admin_id']);
    unset($_SESSION['last_login']);
    unset($_SESSION['username']);
    return true;

  }

  function customer_is_logged_in(){

    return isset($_SESSION['admin_id']);
  }

  function customer_require_login(){
    if (!is_logged_in()){
      redirect_to(url_for('/customer/login.php'));
    }else{
      //do nothing
    }
  }

  ?>