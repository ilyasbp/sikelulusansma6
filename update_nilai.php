<?php
	$pageTitle="Update Nilai";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/siswa.php';
	include_once 'objects/kelas.php';
	include_once 'objects/matpelpil.php';

	$database = new Database();
	$db = $database->getConnection();
	$siswa = new Siswa($db);
	$kelas = new Kelas($db);
	$matpelpil = new Matpelpil($db);

	$nis = $_GET['id'];

	$stmt = $siswa->readOne($nis);
	$row_siswa = $stmt->fetch(PDO::FETCH_ASSOC);
?>

	<div id=list role="main" class="ui-content">
		<div align="center">
			<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a ui-btn-active">Kelola Data Nilai</a>
			<a href="insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Nilai</a>
			<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Kelas</a>
			<a href="insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Kelas</a>
		</div>
		<h3 class="ui-bar ui-bar-a ui-corner-all">Perbarui Data Nilai</h3>
		<div class="ui-body ui-body-a ui-corner-all">
			<form method="post" action="crud/update_data.php">
				<?php
					echo 	'
								<input type="hidden" name="nis" value="'.$row_siswa["nis"].'">
								<label for="nama">Nama:</label>
								<input type="text" name="nama" value="'.$row_siswa["nama"].'">
								<label for="kelas">Kelas:</label>
								<select data-native-menu="false" name="kelas">
									<option>Pilih Kelas</option>
							';
								$stmt = $kelas->read();
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						        {
						            extract($row);
						            if($id_kelas==$row_siswa["id_kelas"]){
						            	echo '<option value="'.$id_kelas.'" selected>'.$nama_kelas.'</option>';
						            }
						            else{
						            	echo '<option value="'.$id_kelas.'">'.$nama_kelas.'</option>';
						            }
						            
						        }
								
					
					echo 	'
								</select>
								<label for="matpelpil">Mata Pelajaran Pilihan:</label>
								<select data-native-menu="false" name="matpelpil">
								<option>Pilih Mata Pelajaran Pilihan</option>
							';
								
								$stmt = $matpelpil->read();
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						        {
						            extract($row);
						            if($id_matpelpil==$row_siswa["id_matpelpil"]){
						            	echo '<option value="'.$id_matpelpil.'" selected>'.$nama_matpelpil.'</option>';
						            }
						            else{
						            	echo '<option value="'.$id_matpelpil.'">'.$nama_matpelpil.'</option>';
						            }
						        }
								
					echo 	'
								</select>
								<label for="bin">Nilai Bahasa Indonesia:</label>
								<input type="range" name="bin" value="'.$row_siswa["bin"].'" min="0" max="100" step="2.5" data-highlight="true">
								<label for="big">Nilai Bahasa Inggris:</label>
								<input type="range" name="big" value="'.$row_siswa["big"].'" min="0" max="100" step="2.5" data-highlight="true">
								<label for="mat">Nilai Matematika:</label>
								<input type="range" name="mat" value="'.$row_siswa["mat"].'" min="0" max="100" step="2.5" data-highlight="true">
								<label for="nilpelpil">Nilai Mata Pelajaran Pilihan:</label>
								<input type="range" name="nilpelpil" value="'.$row_siswa["nilpelpil"].'" min="0" max="100" step="2.5" data-highlight="true">';
				?>
				<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="nilai">Submit</button>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";
?>