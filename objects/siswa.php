<?php
    class Siswa
    {

        private $conn; //Menyimpan Koneksi database
        private $nis;
        private $nama;
        private $id_kelas;
        private $bin;
        private $big;
        private $mat;
        private $nilpelpil;
        private $id_matpelpil;

        // Contructor untuk class lab, membutuhkan satu parameter yaitu koneksi ke databse
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // Registrasi lab baru
        public function create($nis, $nama, $id_kelas, $bin, $big, $mat, $nilpelpil, $id_matpelpil)
        {
            $query = "INSERT INTO siswa(nis, nama, id_kelas, bin, big, mat, nilpelpil, id_matpelpil) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nis);
            $stmt->bindParam(2, $nama);
            $stmt->bindParam(3, $id_kelas);
            $stmt->bindParam(4, $bin);
            $stmt->bindParam(5, $big);
            $stmt->bindParam(6, $mat);
            $stmt->bindParam(7, $nilpelpil);
            $stmt->bindParam(8, $id_matpelpil);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function delete($nis){
            
            $query = "DELETE FROM siswa WHERE nis = :nis";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(":nis", $nis);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function read(){
        	//select all data
	        $query = "SELECT *
	                FROM siswa
	                ORDER BY nis";
	 
	        $stmt = $this->conn->prepare( $query );
	        $stmt->execute();
	 
	        return $stmt;
   		}

        function readOne($nis){
            $query = "SELECT *
                    FROM siswa
                    WHERE nis = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nis);
            $stmt->execute();
     
            return $stmt;
        }

        // Ambil error terakhir yg disimpan di variable error
        public function getLastError(){
            return $this->error;
        }

        function readPerKelas($id_kelas){
            $query = "SELECT *
                    FROM siswa
                    WHERE id_kelas = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $id_kelas);
            $stmt->execute();
     
            return $stmt;
        }
    }

?>