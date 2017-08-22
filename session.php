<?php
    session_start();
	include_once "config/database.php";
    include_once "objects/admin.php";

    // get database connection
    $database = new Database();
    $db = $database->getConnection();

    // Buat object user
    $admin = new Admin($db);
    // Jika belum login
    if(!$admin->is_loggedin()){
    	$admin->redirect('login.php');
    }
?>