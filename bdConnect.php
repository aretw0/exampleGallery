<?php 
	$host = "localhost";
	$dbname = "upload";
	$user = "root";
	$password = "";
	try{
		$ConnPDO=new PDO( "mysql:host=$host;dbname=$dbname", "$user", "$password" );
	}catch( PDOException $e ){
		echo "Error Code: ".$e->getCode()."<br />".$e->getMessage();
	}
?>