<?php
    if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>WDS - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/staff.css'); ?>" />
  </head>

  <body>
    <header>

        <h1>WDS Staff Area</h1>
    </header>
    
    <navigation>
        <ul>

            <li><a href="<?php echo url_for('/staff/index.php'); ?>">Main Menu</a></li>
           
            <li>User: <?php echo $_SESSION['username'] ?? ''; ?></li>
            
            <li><a href="<?php echo url_for('/staff/logout.php'); ?>">Logout</a></li><br>
            


        </ul>  
    </navigation>



    <?php echo display_session_message(); ?>
    