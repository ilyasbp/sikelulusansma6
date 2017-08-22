<?php
	include_once 'session.php';
	$pageTitle="Update Kelas";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/kelas.php';

	$database = new Database();
	$db = $database->getConnection();
	$kelas = new Kelas($db);

	$id = $_GET['id'];

	$stmt = $kelas->readOne($id);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	extract($row);
?>

	<div id=list role="main" class="ui-content">
		<div align="center">
			<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Nilai</a>
			<a href="insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Nilai</a>
			<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a ui-btn-active">Kelola Data Kelas</a>
			<a href="insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Kelas</a>
		</div>
		<h3 class="ui-bar ui-bar-a ui-corner-all">Perbarui Data Kelas</h3>
		<div class="ui-body ui-body-a ui-corner-all">
			<form method="post" action="crud/update_data.php">
				<label for="nama">Nama Kelas:</label>
				<?php
					echo '<input type="text" name="nama" value="'.$nama_kelas.'">';
					echo '<label for="jurusan">Jurusan:</label>';
					echo '<select data-native-menu="false" name="jurusan">
								<option>Pilih Jurusan</option>';
								if($jurusan==1){
						            	echo '<option value="1" selected>IPA</option>';
						            	echo '<option value="2">IPS</option>';
						            }
						        else if($jurusan==2){
						            	echo '<option value="1">IPA</option>';
						            	echo '<option value="2" selected>IPS</option>';
						            }
					echo '		</select>';
					echo '<input type="hidden" name="id" value="'.$id_kelas.'">';
				?>
				<button type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-a" name="kelas">Submit</button>
			</form>
		</div>
	</div>

<?php
	include_once "footer.php";
?>