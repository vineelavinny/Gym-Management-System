<?php
ob_start();

$database_name = "gym_management_system";
$database_host = "localhost:3307";
$database_user = "root";
$database_password = "";
try 
{
	$connc = new PDO("mysql:dbname=$database_name;host=$database_host", "$database_user", "$database_password");
	$connc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOExeption $pde) 
{
	echo "Failed to Connect: " . $pde->getMessage();
}
?>
