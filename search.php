<?php
	$pageTitle="Cari Nilai";
	include_once "header.php";
	include_once "navbar.php";
	include_once 'config/database.php';
	include_once 'objects/siswa.php';
	include_once 'objects/matpelpil.php';

	$database = new Database();
	$db = $database->getConnection();
	$siswa = new Siswa($db);
	$matpelpil = new Matpelpil($db);
?>

<div id=index role="main" class="ui-content">

	<?php
		if($_POST){
			$nis = $_POST['nis'];

			$stmt = $siswa->readOne($nis);
			$num = $stmt->rowCount();

			echo'<h3 class="ui-bar ui-bar-a ui-corner-all">Hasil</h3>';
			echo'<div class="ui-body ui-body-a ui-corner-all">';
				if($num>0){
					echo'<table data-role="table" id="tablenilai" class="ui-body-d ui-shadow table-stripe ui-responsive">';
						echo'<thead>';
							echo'<tr>';
								echo'<th>NIS</th>';
								echo'<th>Nama</th>';
								echo'<th>B Indonesia</th>';
								echo'<th>B Inggris</th>';
								echo'<th>Matematika</th>';
								echo'<th>Pilihan</th>';
								echo'<th>Nilai</th>';
							echo'</tr>';
						echo'</thead>';
						echo'<tbody>';
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									extract($row);

		        					echo '<tr>';
										echo '<td>'.$nis.'</td>';
										echo '<td>'.$nama.'</td>';
										echo '<td>'.$bin.'</td>';
										echo '<td>'.$big.'</td>';
										echo '<td>'.$mat.'</td>';
										echo '<td>'.$matpelpil->readName($id_matpelpil).'</td>';
										echo '<td>'.$nilpelpil.'</td>';
		        					echo '</tr>';
								}
						echo'</tbody>';
					echo'</table>';
				}
				else{
					echo'<h1>Data tidak ditemukan</h1>';
				}
			echo'</div>';
		}
	?>

	<h3 class="ui-bar ui-bar-a ui-corner-all">Cari Nilai</h3>
	<div class="ui-body ui-body-a ui-corner-all">
		<h4>Masukkan Nomor Induk Siswa</h4>
		<form action="search.php" method="post">
			<input data-type="text" name="nis">
			<button type="submit">Cari</button>
		</form>
	</div>
</div>

<?php
	include "footer.php";
?>