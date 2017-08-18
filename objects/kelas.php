<?php
    class Kelas
    {

        private $conn; //Menyimpan Koneksi database
        private $error; //Menyimpan Error Message

        // Contructor untuk class lab, membutuhkan satu parameter yaitu koneksi ke databse
        public function __construct($db)
        {
            $this->conn = $db;
        }

        // Registrasi lab baru
        public function create($nama)
        {
            $query = "INSERT INTO kelas(nama_kelas) VALUES(?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nama);

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
	                FROM kelas
	                ORDER BY nama_kelas";
	 
	        $stmt = $this->conn->prepare( $query );
	        $stmt->execute();
	 
	        return $stmt;
   		}

        function readOne($id_kelas){
            //select all data
            $query = "SELECT *
                    FROM kelas
                    WHERE id_kelas = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $id_kelas);
            $stmt->execute();

            return $stmt;
        }

        function delete($id_kelas){
            
            $query = "DELETE FROM kelas WHERE id_kelas = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $id_kelas);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function update($id_kelas, $nama_kelas){
            
            $query = "UPDATE kelas SET nama_kelas = ? WHERE id_kelas = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nama_kelas);
            $stmt->bindParam(2, $id_kelas);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        // Ambil error terakhir yg disimpan di variable error
        public function getLastError(){
            return $this->error;
        }
    }

?>