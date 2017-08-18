<?php
	$pageTitle="Login";
	include_once "header.php";
	include_once "navbar.php";
?>

<div id="login" role="main" class="ui-content">
	<h3 class="ui-bar ui-bar-a ui-corner-all">Login Form</h3>
		<div class="ui-body ui-body-a ui-corner-all">
			<form>
				<label for="username">Username:</label>
				<input type="text" id="username">
				<br>
				<label for="pass">Password:</label>
				<input type="password" id="pass">
				<br>
				<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Login</a>
			</form>
		</div>
</div>

<?php
	include_once "footer.php";
?>