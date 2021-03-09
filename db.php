<?php
	session_start();
	$DB_host = "localhost";  
	$DB_user = "root";     //database user name
	$DB_pass = "";			// database password
	$DB_name = "ixamBee"; 		// database name
	try
	{
		$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
		$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}


	function __autoload($ClassName) 
	{
	    include_once ("function/"."$ClassName.php");
	}
	 
	$comman = new comman($DB_con);


?>