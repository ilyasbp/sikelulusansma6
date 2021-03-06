<?php
    class Siswa
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function create($nis, $nama, $id_kelas, $id_matpelpil)
        {
            $query = "INSERT INTO siswa(nis, nama_siswa, id_kelas, id_matpelpil) VALUES(?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nis);
            $stmt->bindParam(2, $nama);
            $stmt->bindParam(3, $id_kelas);
            $stmt->bindParam(4, $id_matpelpil);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function update($nis, $nama, $id_kelas, $id_matpelpil){
            $query = "UPDATE siswa SET nama_siswa = ?, id_kelas = ?, id_matpelpil = ? WHERE nis = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nama);
            $stmt->bindParam(2, $id_kelas);
            $stmt->bindParam(3, $id_matpelpil);
            $stmt->bindParam(4, $nis);
            
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
	        $query = "SELECT * FROM siswa ORDER BY nis";
	 
	        $stmt = $this->conn->prepare( $query );
	        $stmt->execute();
	 
	        return $stmt;
   		}

        function readOne($nis){
            $query = "SELECT * FROM siswa WHERE nis = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nis);
            $stmt->execute();
     
            return $stmt;
        }

        function readPerKelas($id_kelas){
            $query = "SELECT * FROM siswa WHERE id_kelas = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $id_kelas);
            $stmt->execute();
     
            return $stmt;
        }
    }

?>