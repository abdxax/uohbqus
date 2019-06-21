<?php
require "DB.php";

//start class for user 
/**
 * 
 */
class User extends ConnectDB
{
	private $user_op;
	function __construct()
	{
		parent::__construct("localhost","root","","uohb_q");
		$this->user_op=$this->conn;
	}

	public function getDataPep($option,$tex){
		if ($option==1) {
			$sql=$this->user_op->prepare("SELECT * FROM problems WHERE name=?");
			$sql->execute(array($tex));
			return $sql;
		}
		else if ($option==2) {
			$sql=$this->user_op->prepare("SELECT * FROM problems WHERE id_uohb=?");
			$sql->execute(array($tex));
			return $sql;
		}
		else if ($option==3) {
			$sql=$this->user_op->prepare("SELECT * FROM problems WHERE id_gov=?");
			$sql->execute(array($tex));
			return $sql;
		}
	
	}

	public function update_info($id_s,$name,$phone){

	}

	public function check_idgov ($id_gov,$id_s){
		$sql=$this->user_op->prepare("SELECT * FROM problems WHERE id_gov=? OR id_uohb=?");
		$sql->execute(array($id_gov,$id_s));
		$counts=$sql->rowCount();
		if($counts>0){
			return false;
		}
		else{
			return true;
		}

	}

	public function check_iduohb($is){
		
	}

	public function addNewpeop($name,$phone,$id_uohb,$id_gov){
		if ($this->check_idgov($id_gov,$id_uohb)==false){
            
		}
		else{
        $sql=$this->user_op->prepare("INSERT INTO problems(id_uohb,id_gov,name,phone)VALUES(?,?,?,?)");
        $sql->execute(array($id_uohb,$id_gov,$name,$phone));



		}
		//$sql=$this->user_op->prepare("INSERT INTO ")
	}

	public function getDepartment(){
		$sql=$this->user_op->prepare("SELECT * FROM depart");
		$sql->execute();
		return $sql;
	}

	public function saveOrder($id_stu,$depart,$title,$des,$status,$user_order,$is_attach){
		$date=date("Y-m-d h:i:sa");
		$sql=$this->user_op->prepare("INSERT INTO problemdes(id_stus,depart,title,des,status,create_at,user_order,is_attach)VALUES (?,?,?,?,?,?,?,?)");
		if($sql->execute(array($id_stu,$depart,$title,$des,$status,$date,$user_order,$is_attach))){
			return "done";
		}
		else{
			return "non";
		}
	}

	public function displayallReq($ids){
		$sql=$this->user_op->prepare("SELECT * FROM problemdes LEFT JOIN depart ON problemdes.depart=depart.depart_id WHERE problemdes.id_stus=?");
		$sql->execute(array($ids));
		return $sql;
	}

	public function displayOrder($ids){
		$sql=$this->user_op->prepare("SELECT * FROM problemdes LEFT JOIN depart ON problemdes.depart=depart.depart_id WHERE problemdes.id_prob=?");
		$sql->execute(array($ids));
		return $sql;
	}

	public function getName($user){
		$sql=$this->user_op->prepare("SELECT * FROM info WHERE user=?");
		$sql->execute(array($user));
		foreach ($sql as $key ) {
			# code...
			return $key['name'];
		}
	}

	public function updateStaus($ids,$user){
		$date=date("Y-m-d h:i:sa");
		$sql=$this->user_op->prepare("UPDATE problemdes SET contact_at=?,user_contact=?,status=? WHERE id_prob=?");
		$sql->execute(array($date,$user,"contact",$ids));
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

	
}

