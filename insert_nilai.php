<?php
	include_once 'session.php';
	$pageTitle="Kelola Nilai";
	include_once 'objects/admin.php';
	include_once 'session.php';
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/siswa.php';
	include_once 'objects/matpel.php';
	include_once 'objects/kelas.php';
	include_once 'objects/nilai.php';

	$database = new Database();
	$db = $database->getConnection();
	$siswa = new Siswa($db);
	$matpel = new Matpel($db);
	$nilai = new Nilai($db);
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
					<option value="1">Fisika</option>
					<option value="2">Biologi</option>
					<option value="3">Kimia</option>
					<option value="4">Geografi</option>
					<option value="5">Sosiologi</option>
					<option value="6">Ekonomi</option>
				</select>

				<?php
					$stmt_matpel = $matpel->read();
					$num_matpel = $stmt_matpel->rowCount();
					while ($row_matpel = $stmt_matpel->fetch(PDO::FETCH_ASSOC)){
						echo '<label for="'.$row_matpel['id_matpel'].'">Nilai '.$row_matpel['nama_matpel'].':</label>';
						echo '<input type="range" name="'.$row_matpel['id_matpel'].'" value="0" min="0" max="100" step="0.1" data-highlight="true">';
					}

					echo '<input type="hidden" name="numofmatpel" value="'.$num_matpel.'">';
				?>
				

				<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="nilai">Submit</button>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";
?>