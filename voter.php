<?php

	class Voters
	{
		private $servername = "localhost";
		private $username   = "root";
		private $password   = "";
		private $dbname     = "vote";
		public  $con;


		// Database Connection 
		public function __construct()
		{
		    try {
			$this->con = new mysqli($this->servername, $this->username, $this->password, $this->dbname);	
		    } catch (Exception $e) {
			echo $e->getMessage();
		    }
		}

		// Insert customer data into customer table
		public function insertData($name, $email,$nic, $address,$encpass, $dob,$district,$status,$vote_status, $file)
		{	
			$allow = array('jpg', 'jpeg', 'png');
		   	$exntension = explode('.', $file['name']);
		   	$fileActExt = strtolower(end($exntension));
		   	$fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
		   	$filePath = 'uploads/'.$fileNew; 
			
			if (in_array($fileActExt, $allow)) {
    		          if ($file['size'] > 0 && $file['error'] == 0) {
		            if (move_uploaded_file($file['tmp_name'], $filePath)) {
		   		$query = "INSERT INTO users(name,nic,address,email,district,password,status,vote_status, profile_image)
					VALUES('$name','$nic','$address','$email','$district','$encpass','$status','$vote_status','$fileNew')";
				$sql = $this->con->query($query);
				if ($sql==true) {
				   return true;
				}else{
				  return false;
			    }   		    
		        }
		      }
		   }
		}

		// Fetch customer records for show listing

		public function displayData()
		{
		    $sql = "SELECT * FROM users";
		    $query = $this->con->query($sql);
		    $data = array();
		    if ($query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
			    $data[] = $row;
			}
			return $data;
		    }else{
			return false;
		    }
		}

	}
?>