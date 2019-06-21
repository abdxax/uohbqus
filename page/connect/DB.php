<?php
/**
 * 
 */
class ConnectDB
{
	protected $conn;
	function __construct($host,$user,$pass,$db)
	{
		$this->conn=new PDO("mysql:host=$host;dbname=$db",$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	}
}