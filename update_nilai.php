<?php
	include_once 'session.php';
	$pageTitle="Update Nilai";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/siswa.php';
	include_once 'objects/kelas.php';
	include_once 'objects/matpel.php';
	include_once 'objects/nilai.php';

	$database = new Database();
	$db = $database->getConnection();
	$siswa = new Siswa($db);
	$kelas = new Kelas($db);
	$matpel = new Matpel($db);
	$nilai = new Nilai($db);

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
								<input type="text" name="nama" value="'.$row_siswa["nama_siswa"].'">
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
								
								$stmt = $matpel->read();
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
						        {
						            extract($row);
						            if($id_matpel==$row_siswa["id_matpelpil"]){
						            	echo '<option value="'.$id_matpel.'" selected>'.$nama_matpel.'</option>';
						            }
						            else{
						            	echo '<option value="'.$id_matpel.'">'.$nama_matpel.'</option>';
						            }
						        }
								
					echo 	'</select>';
								$stmt_matpel = $matpel->read();
								$num_matpel = $stmt_matpel->rowCount();
								while ($row_matpel = $stmt_matpel->fetch(PDO::FETCH_ASSOC)){
									$stmt_nilai = $nilai->readOne($row_siswa["nis"], $row_matpel["id_matpel"]);
									$row_nilai = $stmt_nilai->fetch(PDO::FETCH_ASSOC);
									echo '<label for="'.$row_matpel['id_matpel'].'">Nilai '.$row_matpel['nama_matpel'].':</label>';
									echo '<input type="range" name="'.$row_matpel['id_matpel'].'" value="'.$row_nilai['jumlah'].'" min="0" max="100" step="0.1" data-highlight="true">';
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