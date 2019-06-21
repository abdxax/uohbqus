<?php
require "DB.php";

class login extends ConnectDB
{
	private $user_op;
	function __construct()
	{
		parent::__construct("localhost","root","","uohb_q");
		$this->user_op=$this->conn;
	}

	public function loginop($user,$pass){
     $sql=$this->user_op->prepare("SELECT * FROM user WHERE username=? AND password=?");
     $sql->execute(array($user,$pass));
     if($sql->rowCount()==1){
     foreach ($sql as $key ) {
     	# code...
     	if ($key['id_rol']==1) {
     		# code...
     		$_SESSION['user']=$key['username'];
     		$_SESSION['pass']=$key['password'];
               $_SESSION['role']=$key['id_rol'];
     		header("location:user/index.php");
     	}
     	else if($key['id_rol']==2){
     		$_SESSION['user']=$key['username'];
     		$_SESSION['pass']=$key['password'];
                $_SESSION['role']=$key['id_rol'];
     		header("location:depart/index.php");

     	}
     	else if($key['id_rol']==3){
     		
     	}
     	else if($key['id_rol']==4){
     		
     	}
     }
     }
     else{

     }

	}


}