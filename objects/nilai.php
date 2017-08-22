<?php
    class Nilai
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function create($nis, $id_matpel, $jumlah)
        {
            $query = "INSERT INTO nilai(nis, id_matpel, jumlah) VALUES(?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $nis);
            $stmt->bindParam(2, $id_matpel);
            $stmt->bindParam(3, $jumlah);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function update($nis, $id_matpel, $jumlah){
            $query = "UPDATE nilai SET jumlah = ? WHERE nis = ? AND id_matpel=?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $jumlah);
            $stmt->bindParam(2, $nis);
            $stmt->bindParam(3, $id_matpel);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function delete($nis){
            $query = "DELETE FROM nilai WHERE nis = :nis";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(":nis", $nis);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function read($nis){
	        $query = "SELECT * FROM nilai WHERE nis = ? ORDER BY id_matpel";
	       
	        $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nis);
	        $stmt->execute();
	 
	        return $stmt;
   		}

        function readOne($nis, $id_matpel){
            $query = "SELECT * FROM nilai WHERE nis = ? AND id_matpel = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $nis);
            $stmt->bindParam(2, $id_matpel);
            $stmt->execute();
     
            return $stmt;
        }
    }

?>