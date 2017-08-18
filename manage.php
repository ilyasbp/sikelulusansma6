<?php
	$pageTitle="Kelola";
	include_once "header.php";
	include_once "navbar_login.php";
?>

	<div id=list role="main" class="ui-content">
		<h3 class="ui-bar ui-bar-a ui-corner-all">Kelola</h3>
		<div class="ui-body ui-body-a ui-corner-all">
		<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kelola Nilai</a>
		<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-b">Kelola Kelas</a>
		</div>
	</div>

<?php
	include_once "footer.php";
?>