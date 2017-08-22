<?php
	session_start();
	include_once 'config/database.php';
	include_once 'objects/admin.php';

	$database = new Database();
	$db = $database->getConnection();

	
	$admin = new Admin($db);

	if($admin->is_loggedin()!="")
	{
		$admin->redirect('manage_nilai.php');
	}

	if(isset($_POST['login']))
	{
		if($admin->doLogin($_POST['username'],$_POST['pass']))
		{
			$admin->redirect('manage_nilai.php');
		}
		else
		{
			$error = "Username/Password yang Anda masukkan salah!";
		}	
	}

	$pageTitle="Login";
	include_once "header.php";
	include_once "navbar.php";
?>

<div id="login" role="main" class="ui-content">
	<h3 class="ui-bar ui-bar-a ui-corner-all">Login Form</h3>
		<?php
			if(isset($error)){
				echo '<div class="ui-body ui-body-a ui-corner-all">';
				echo '<h1>'.$error.'</h1>';
				echo '</div>';
			}
		?>
		<div class="ui-body ui-body-a ui-corner-all">
			<form method="post">
				<label for="username">Username:</label>
				<input type="text" name="username">
				<br>
				<label for="pass">Password:</label>
				<input type="password" name="pass">
				<br>
				<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="login">Login</a>
			</form>
		</div>
</div>

<?php
	include_once "footer.php";
?>