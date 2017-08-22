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
			<a href="manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a ui-btn-active">Kelola Data Kelas</a>
			<a href="insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a">Tambah Data Kelas</a>
		</div>
		<div class="ui-body ui-body-a ui-corner-all">
			<table data-role="table" id="tabelkelas" class="ui-body-d ui-shadow table-stripe ui-responsive">
				<thead>
					<tr>
						<th>Nama Kelas</th>
						<th>Kelola</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php
						$stmt = $kelas->read();
						while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
							extract($row);

        					echo   	'<tr>
										<td>'.$nama_kelas.'</td>
										<td><a href="update_kelas.php?id='.$id_kelas.'" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Edit</a></td>
										<td>
											<a href="#popupDialog?id='.$id_kelas.'" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Delete</a>

											<div data-role="popup" id="popupDialog?id='.$id_kelas.'" data-overlay-theme="a" data-theme="a" data-dismissible="false" style="max-width:400px;">
												<div data-role="header" data-theme="a">
													<h1>Delete Data?</h1>
												</div>
												<div role="main" class="ui-content">
													<h3 class="ui-title">Apakah kamu yakin menghapus data ini?</h3>
													<a href="crud/delete_data.php?id='.$id_kelas.'&act=kelas" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a" data-rel="external" data-transition="flow">Delete</a>
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