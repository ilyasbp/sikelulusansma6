<?php
	$pageTitle="Kelola Nilai";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/siswa.php';
	include_once 'objects/matpelpil.php';
	include_once 'objects/kelas.php';

	$database = new Database();
	$db = $database->getConnection();
	$siswa = new Siswa($db);
	$matpelpil = new Matpelpil($db);
	$kelas = new Kelas($db);
?>

	<div id=list role="main" class="ui-content">
		<div align="center">
			<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Nilai</a>
			<a href="insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a ui-btn-active">Tambah Data Nilai</a>
			<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Kelas</a>
			<a href="insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Kelas</a>
		</div>
		<div class="ui-body ui-body-a ui-corner-all">
			<form method="post" action="crud/insert_data.php">
				<label for="nis">Nomor Induk Siswa:</label>
				<input type="text" name="nis" placeholder="123456">
				<label for="nama">Nama:</label>
				<input type="text" name="nama" placeholder="NANA NINI">
				<label for="kelas">Kelas:</label>
				<select data-native-menu="false" name="kelas">
					<option>Pilih Kelas</option>
					<?php
						$stmt = $kelas->read();
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
				        {
				            extract($row);
				            echo '<option value="'.$id_kelas.'">'.$nama_kelas.'</option>';
				        }
					?>
				</select>
				<label for="matpelpil">Mata Pelajaran Pilihan:</label>
				<select data-native-menu="false" name="matpelpil">
					<option>Pilih Mata Pelajaran Pilihan</option>
					<?php
						$stmt = $matpelpil->read();
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
				        {
				            extract($row);
				            echo '<option value="'.$id_matpelpil.'">'.$nama_matpelpil.'</option>';
				        }
					?>
				</select>
				<label for="bin">Nilai Bahasa Indonesia:</label>
				<input type="range" name="bin" value="0" min="0" max="100" step="2.5" data-highlight="true">
				<label for="big">Nilai Bahasa Inggris:</label>
				<input type="range" name="big" value="0" min="0" max="100" step="2.5" data-highlight="true">
				<label for="mat">Nilai Matematika:</label>
				<input type="range" name="mat" value="0" min="0" max="100" step="2.5" data-highlight="true">
				<label for="nilpelpil">Nilai Mata Pelajaran Pilihan:</label>
				<input type="range" name="nilpelpil" value="0" min="0" max="100" step="2.5" data-highlight="true">
				<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="nilai">Submit</button>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";
?>