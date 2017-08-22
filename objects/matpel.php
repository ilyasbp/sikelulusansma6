<?php
    class Matpel
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        function read(){
	        $query = "SELECT * FROM matpel ORDER BY id_matpel";
	 
	        $stmt = $this->conn->prepare( $query );
	        $stmt->execute();
	 
	        return $stmt;
   		}

        function readName($id_matpelpil){
            $query = "SELECT nama_matpel FROM matpel WHERE id_matpel = ?";
     
            $stmt = $this->conn->prepare( $query );
            $stmt->bindParam(1, $id_matpelpil);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['nama_matpel'];
        }
    }

?>