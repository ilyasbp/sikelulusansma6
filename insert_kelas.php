<?php
	include_once 'session.php';
	$pageTitle="Kelola Kelas";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/kelas.php';

	$database = new Database();
	$db = $database->getConnection();
	$kelas = new Kelas($db);
?>

	<div id=list role="main" class="ui-content">
		<div align="center">
			<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Nilai</a>
			<a href="insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Nilai</a>
			<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Kelas</a>
			<a href="insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a ui-btn-active">Tambah Data Kelas</a>
		</div>
		<div class="ui-body ui-body-a ui-corner-all">
			<form method="post" action="crud/insert_data.php">
				<label for="nama">Nama Kelas:</label>
				<input type="text" name="nama" placeholder="contoh: XII-MIA 1">
				<label for="jurusan">Jurusan:</label>
				<select data-native-menu="false" name="jurusan">
					<option>Pilih Jurusan</option>
					<option value="1">IPA</option>
					<option value="2">IPS</option>
				</select>
				<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="kelas">Submit</button>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";
?>