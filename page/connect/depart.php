<?php
require "DB.php";

//start class for user 
/**
 * 
 */
class depaer extends ConnectDB
{
	private $user_op;
	function __construct()
	{
		parent::__construct("localhost","root","","uohb_q");
		$this->user_op=$this->conn;
	}

	public function getDepart($user){
		//$sql=$this->user_op->prepare("SELECT * FROM info LEFT JOIN depart ON info.depart=depart.depart_id WHERE info.user=?");
		$sql=$this->user_op->prepare("SELECT * FROM info  WHERE user=?");
		$sql->execute(array($user));
		foreach ($sql as $key) {
			# code...
			return $key['depart'];
		}
	}

	public function getNewOrder($user){
       $sql=$this->user_op->prepare("SELECT * FROM problemdes LEFT JOIN problems ON problemdes.id_stus=problems.id_stu WHERE problemdes.status=? AND depart=?");
       $sql->execute(array('new',$this->getDepart($user)));
       return $sql;
	}

	public function getProblem ($ids){
		$sql=$this->user_op->prepare("SELECT * FROM problemdes WHERE id_prob=?");
		$sql->execute(array($ids));
		return $sql;
	}

	public function addAnswer($ids,$user,$answ){
		$date=date("Y-m-d h:i:sa");
		$sql=$this->user_op->prepare("UPDATE problemdes SET answer=?,status=?,user_answer=?,answer_at=? WHERE id_prob=?");
		if ($sql->execute(array($answ,"answ",$user,$date,$ids))) {
			# code...
		}
	}

		public function checkPerm ($user,$pass,$role){
		$sql=$this->user_op->prepare("SELECT * FROM user WHERE username=? AND password=? AND id_rol=?");
		$sql->execute(array($user,$pass,$role));
		$count=$sql->rowCount();
		if($count==1){

		}
		else{
			header("location:../login.php");
			exit();
		}

	}

	public function getName($user){
		$sql=$this->user_op->prepare("SELECT * FROM info WHERE user=?");
		$sql->execute(array($user));
		foreach ($sql as $key ) {
			# code...
			return $key['name'];
		}
	}


}