<?php 
require_once '../include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['suid'] );
unset( $_SESSION['name'] );
unset( $_SESSION['suname'] );
unset( $_SESSION['spass'] );
unset( $_SESSION['sshop_id'] ); 
// 4. Destroy the session
// session_destroy();
redirect(web_root."staff/login.php?logout=1");
?>