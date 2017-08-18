<?php
    $page_title="Delete";
	include_once '../header.php';
	include_once '../config/database.php';

	$database = new Database();
	$db = $database->getConnection();

	$act = $_GET['act'];
	$id = $_GET['id'];

	if($act == "nilai"){
		include_once '../objects/siswa.php';
		$siswa = new Siswa($db);

		if($siswa->delete($id)){
	 		echo '<center><h1>Data Berhasil Dihapus</h1></center>';	
	 	}
	 	else{
	 		echo '<h1>Data Gagal Dihapus</h1>';
	 	}

	 	echo '<a href="../manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kembali</a>';

    	//header("location: ../manage_nilai.php");
	}
	else if($act == "kelas"){
		include_once '../objects/kelas.php';
		$kelas = new Kelas($db);

		if($kelas->delete($id)){
	 		echo '<center><h1>Data Berhasil Dihapus</h1></center>';	
	 	}
	 	else{
	 		echo '<h1>Data Gagal Dihapus</h1>';
	 	}

	 	echo '<a href="../manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kembali</a>';

    	//header("location: ../manage_nilai.php");
	}
	/*
	elseif($act=="prestasi"){
    $sql = "DELETE FROM prestasi where id_pres = '$id'";
		$res = $db->query($sql);

    header("location: list_prestasi.php");

	}

	elseif ($act=="reserv") {
    $sql = "DELETE FROM reservasi where id_reserv = '$id'";
		$res = $db->query($sql);

    header("location: list_agenda.php");
	}
	elseif ($act=="admin_lab") {
    $sql = "DELETE FROM admin_lab where id_admin_lab = ?";
		$stmt = $db->prepare( $sql );
		$stmt->bindParam(1, $id);
		$stmt->execute();

    header("location: list_admin_lab.php");
	}
	elseif ($act=="user") {
    $sql = "DELETE FROM user where id_user = ?";
		$stmt = $db->prepare( $sql );
		$stmt->bindParam(1, $id);
		$stmt->execute();

    header("location: list_user.php");
	}
	*/
 ?>

    
<?php
    include_once "../footer.php";
?>