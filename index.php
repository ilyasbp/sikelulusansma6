<?php
    session_start();
	include_once 'config/database.php';
	include_once 'objects/admin.php';

	$database = new Database();
	$db = $database->getConnection();

	$admin = new Admin($db);

	$pageTitle="Cari Nilai";
	include_once "header.php";
	include_once 'objects/siswa.php';
	include_once 'objects/matpel.php';
	include_once 'objects/nilai.php';

	if($admin->is_loggedin()){
		include_once "navbar_login.php";
    }
	else{
		include_once "navbar.php";
	}
	
	$siswa = new Siswa($db);
	$matpel = new Matpel($db);
	$nilai = new Nilai($db);
?>

<div id=index role="main" class="ui-content">

	<?php
		if($_POST){
			$nis = $_POST['nis'];

			$stmt = $siswa->readOne($nis);
			$num = $stmt->rowCount();
			$lulus=true;
			$nun=0;

			echo'<h3 class="ui-bar ui-bar-a ui-corner-all">Hasil</h3>';
			echo'<div class="ui-body ui-body-a ui-corner-all">';
				if($num>0){
					echo'<table data-role="table" id="tablenilai" class="ui-body-d ui-shadow table-stripe ui-responsive">';
						echo'<thead>';
							echo'<tr>
											<th>NIS</th>
											<th>Nama</th>
									';

							$stmt_matpel = $matpel->read();
							while($row_matpel = $stmt_matpel->fetch(PDO::FETCH_ASSOC)){
								echo'		<th>'.$row_matpel["nama_matpel"].'</th>';
							}
							echo 	' <th>Pilihan</th>
										<th>NUN</th>
										<th>Ket</th>
											</tr>';
						echo'</thead>';
						echo'<tbody>';
								while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
									extract($row);

		        					echo '<tr>';
										echo '<td>'.$nis.'</td>';
										echo '<td>'.$nama_siswa.'</td>';
										$stmt_nilai = $nilai->read($nis);
									while($row_nilai = $stmt_nilai->fetch(PDO::FETCH_ASSOC)){
										echo'<td>'.$row_nilai['jumlah'].'</td>';
										if ($row_nilai['jumlah']<75) $lulus=false;
										if ($row_nilai['id_matpel']==$id_matpelpil) $nun+=$row_nilai['jumlah'];
										if ($row_nilai['id_matpel']==7) $nun+=$row_nilai['jumlah'];
										if ($row_nilai['id_matpel']==8) $nun+=$row_nilai['jumlah'];
										if ($row_nilai['id_matpel']==9) $nun+=$row_nilai['jumlah'];
									}
										echo '<td>'.$matpel->readName($id_matpelpil).'</td>';
										echo '<td>'.$nun.'</td>';

										if($lulus){
											echo '<td>Lulus<td$>';
										}
										else{
											echo '<td>Tidak Lulus<td>';
										}

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
		<form action="index.php" method="post">
			<input data-type="text" name="nis">
			<button type="submit">Cari</button>
		</form>
	</div>
</div>

<?php
	include "footer.php";
?>