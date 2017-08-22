<?php
    class Admin
    {
        private $conn;

        public function __construct($db)
        {
            $this->conn = $db;
        }

        public function create($username, $password)
        {
        	$new_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO admin(username, password) VALUES(?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->bindParam(2, $new_password);
            
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        function doLogin($username, $password){
        	$query = "SELECT * FROM admin where username = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $username);
            $stmt->execute();


            if($stmt->rowCount()==1)
            {
            	$row_admin = $stmt->fetch(PDO::FETCH_ASSOC);
            	if(password_verify($password, $row_admin['password'])){
            		$_SESSION['admin_session'] = $row_admin['username'];
            		return true;
            	}
            	else{
            		return false;
            	}
            }
            else{
            	return false;
            }
        }

        public function is_loggedin(){
			if(isset($_SESSION['admin_session']))
			{
				return true;
			}
		}

        public function redirect($url)
		{
			header("Location: $url");
		}

        public function doLogout()
		{
			session_destroy();
			unset($_SESSION['admin_session']);
			return true;
		}
    }
?>