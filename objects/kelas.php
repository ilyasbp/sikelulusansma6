<?php
    class Kelas
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function create($nama, $jurusan)
        {
            $query = "INSERT INTO kelas(nama_kelas, jurusan) VALUES(?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nama);
            $stmt->bindParam(2, $jurusan);

            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function read(){
	        $query = "SELECT * FROM kelas ORDER BY nama_kelas";
	 
	        $stmt = $this->conn->prepare( $query );
	        $stmt->execute();
	 
	        return $stmt;
   		}

        function readOne($id_kelas){
            $query = "SELECT * FROM kelas WHERE id_kelas = ?";
     
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

        function update($id_kelas, $nama_kelas, $jurusan){
            
            $query = "UPDATE kelas SET nama_kelas = ?, jurusan = ? WHERE id_kelas = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nama_kelas);
            $stmt->bindParam(2, $jurusan);
            $stmt->bindParam(3, $id_kelas);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }

?>