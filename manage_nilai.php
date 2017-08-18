<?php
	$pageTitle="Kelola Nilai";
	include_once "header.php";
	include_once "navbar_login.php";
	include_once 'config/database.php';
	include_once 'objects/siswa.php';
	include_once 'objects/matpelpil.php';

	$database = new Database();
	$db = $database->getConnection();
	$siswa = new Siswa($db);
	$matpelpil = new Matpelpil($db);
?>

	<div id=list role="main" class="ui-content">
		<div align="center">
			<a href="manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a ui-btn-active">Kelola Data Nilai</a>
			<a href="insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Nilai</a>
			<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Kelola Data Kelas</a>
			<a href="insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Kelas</a>
		</div>
		<div class="ui-body ui-body-a ui-corner-all">
			<table data-role="table" id="tablenilai" class="ui-body-d ui-shadow table-stripe ui-responsive">
				<thead>
					<tr>
						<th>NIS</th>
						<th>Nama</th>
						<th>B Indonesia</th>
						<th>B Inggris</th>
						<th>Matematika</th>
						<th>Pilihan</th>
						<th>Nilai</th>
						<th>Kelola</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$stmt = $siswa->read();
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							extract($row);

        					echo   	'<tr>
        								<td>'.$nis.'</td>
										<td>'.$nama.'</td>
										<td>'.$bin.'</td>
										<td>'.$big.'</td>
										<td>'.$mat.'</td>
										<td>'.$matpelpil->readName($id_matpelpil).'</td>
										<td>'.$nilpelpil.'</td>
										<td><a href="update_nilai.php?id='.$nis.'" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Edit</a></td>
										<td>
											<a href="#popupDialog?id='.$nis.'" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Delete</a>

											<div data-role="popup" id="popupDialog?id='.$nis.'" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;">
												<div data-role="header" data-theme="a">
													<h1>Delete Data?</h1>
												</div>
												<div role="main" class="ui-content">
													<h3 class="ui-title">Apakah kamu yakin menghapus data ini?</h3>
													<a href="crud/delete_data.php?id='.$nis.'&act=nilai" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a" data-rel="external" data-transition="flow">Delete</a>
													<a class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a" data-rel="back">Cancel</a>
												</div>
											</div>
										</td>
        							</tr>';
						}
					?>
				</tbody>
			</table>
		</div>
	</div>

<?php
	include_once "footer.php";
?>