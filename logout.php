<?php
    include_once "session.php";

    // Logout! hapus session user
    $admin->doLogout();

    // Redirect ke login
    header('location: login.php');
?>