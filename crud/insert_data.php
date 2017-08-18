<?php
    $page_title="Insert";
	include_once '../header.php';
	include_once '../config/database.php';

	$database = new Database();
	$db = $database->getConnection();
	
	if(isset($_POST['nilai'])){
	    // instantiate product object
		include_once '../objects/siswa.php';
		$siswa = new Siswa($db);
	 	
	 	if($siswa->create($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['bin'],$_POST['big'], $_POST['mat'], $_POST['nilpelpil'], $_POST['matpelpil'])){
	 		echo '<center><h1>Data Berhasil Ditambahkan</h1></center>
	 		<a href="../manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Lihat</a>';	
	 	}
	 	else{
	 		echo '<h1>Data Gagal Ditambahkan</h1>';
	 	}

	 	echo '<a href="../insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kembali</a>';

	 	//header("location: ../manage_nilai.php");
    }

    else if(isset($_POST['kelas'])){
	    // instantiate product object
		include_once '../objects/kelas.php';
		$kelas = new Kelas($db);
	 	
	 	if($kelas->create($_POST['nama'])){
	 		echo '<center><h1>Data Berhasil Ditambahkan</h1></center>
	 		<a href="../manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Lihat</a>';	
	 	}
	 	else{
	 		echo '<h1>Data Gagal Ditambahkan</h1>';
	 	}

	 	echo '<a href="../insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kembali</a>';

	 	//header("location: ../manage_nilai.php");
    }
?>

    
<?php
    include_once "../footer.php";
?>