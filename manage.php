<?php
	$pageTitle="Kelola";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/admin.php';

	$database = new Database();
	$db = $database->getConnection();
	$admin = new Admin($db);

	if($_POST)
	{
		if($admin->create($_POST['username'], $_POST['password'])) echo '<h1>Berhasil</h1>'; else echo '<h1>Gagal</h1>';
	}
?>

	<div id=list role="main" class="ui-content">
		<h3 class="ui-bar ui-bar-a ui-corner-all">Kelola</h3>
		<div class="ui-body ui-body-a ui-corner-all">
			<form method="post">
			<label for="username">Username:</label>
			<input type="text" name="username">
			<label for="password">Password:</label>
			<input type="text" name="password">
			<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="admin">Submit</button>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";
?>