<?php
    session_start();
	include_once 'config/database.php';
	include_once 'objects/admin.php';

	$database = new Database();
	$db = $database->getConnection();

	$admin = new Admin($db);

	$pageTitle="Daftar Nilai";
	include_once "header.php";
	include_once 'objects/siswa.php';
	include_once 'objects/nilai.php';
	include_once 'objects/kelas.php';

	if($admin->is_loggedin()){
		include_once "navbar_login.php";
    }
	else{
		include_once "navbar.php";
	}
	
	$siswa = new Siswa($db);
	$kelas = new Kelas($db);
	$nilai = new Nilai($db);
?>

	<div id=list role="main" class="ui-content">
		<h3 class="ui-bar ui-bar-a ui-corner-all">Daftar Nilai</h3>
		<div class="ui-body ui-body-a ui-corner-all">
			<table data-role="table" id="tablenilai" class="ui-body-d ui-shadow table-stripe ui-responsive">
				<thead>
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>Keterangan</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$stmt = $siswa->read();
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							extract($row);
							$lulus="Lulus";

							$stmt_kelas = $kelas->readOne($id_kelas);
							$row_kelas = $stmt_kelas->fetch(PDO::FETCH_ASSOC);

							$stmt_nilai = $nilai->read($nis);
							while ($row_nilai = $stmt_nilai->fetch(PDO::FETCH_ASSOC)){
								if($row_nilai["jumlah"]<75) $lulus="Tidak Lulus";
							}

        					echo '<tr>';
								echo '<td>'.$nis.'</td>';
								echo '<td>'.$nama_siswa.'</td>';
								echo '<td>'.$row_kelas['nama_kelas'].'</td>';
								echo '<td>'.$lulus.'</td>';
        					echo '</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

<?php
	include_once "footer.php";
?>