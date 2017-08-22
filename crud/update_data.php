<?php
    $page_title="Update";
    include_once '../header.php';
    include_once '../config/database.php';

    $database = new Database();
    $db = $database->getConnection();
    
    if(isset($_POST['nilai'])){
        // instantiate product object
        include_once '../objects/siswa.php';
        include_once '../objects/nilai.php';
        $siswa = new Siswa($db);
        $nilai = new Nilai($db);
        $count=1;
        
        if($siswa->update($_POST['nis'], $_POST['nama'], $_POST['kelas'], $_POST['matpelpil'])){
            while($_POST['numofmatpel']--){
                $nilai->update($_POST['nis'], $count, $_POST[$count]);
                $count++;
            }
            echo '<center><h1>Data Berhasil Diperbarui</h1></center>
            <a href="../manage_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Lihat</a>';   
        }
        else{
            echo '<h1>Data Gagal Diperbarui</h1>';
        }

        echo '<a href="../insert_nilai.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kembali</a>';

        //header("location: ../manage_nilai.php");
    }

    else if(isset($_POST['kelas'])){
        // instantiate product object
        include_once '../objects/kelas.php';
        $kelas = new Kelas($db);
        
        if($kelas->update($_POST['id'], $_POST['nama'], $_POST['jurusan'])){
            echo '<center><h1>Data Berhasil Diperbarui</h1></center>
            <a href="../manage_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Lihat</a>';   
        }
        else{
            echo '<h1>Data Gagal Diperbarui</h1>';
        }

        echo '<a href="../insert_kelas.php" class="ui-btn ui-corner-all ui-shadow ui-btn-a">Kembali</a>';

        //header("location: ../manage_nilai.php");
    }
?>

    
<?php
    include_once "../footer.php";
?>