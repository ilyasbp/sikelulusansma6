<?php
	$pageTitle="Daftar Nilai";
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

	<div id=list role="main" class="ui-content">
		<h3 class="ui-bar ui-bar-a ui-corner-all">Daftar Nilai</h3>
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
					</tr>
				</thead>
				<tbody>
					<?php
						$stmt = $siswa->read();
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
					?>
				</tbody>
			</table>
		</div>
	</div>

<?php
	include_once "footer.php";
?>