<?php
	//Set the connection to the mdtu database
//	$con = mysql_connect("localhost","leavemdtu","lmd@123") or die ("දත්ත ගබඩාව හා සම්බන්ධ විය නොහැක : ".mysql_error());
//	mysql_select_db("mdtu_leave",$con);

//	$con = mysql_connect("localhost","root","") or die ("Could not connect to the Database : ".mysql_error());
//	mysql_select_db("mdtu_leave",$con);


//$servername = "localhost";
//$username = "mdtunwgo_dbuser";

$servername = "localhost";
$username = "mdtunwgo_dbuser";
$password = "LsHnaTiuBg2Ih1A&";
$dbname = "mdtunwgo_mdtu";




//$username = "root";
//$username = "cpmdtudb";
//$password = "Bcsrg#4ma%tD";
//$password = "";
//$password = "CpMdtu@79";
//$dbname = "mdtunwgo_mdtu";
//$dbname = "nwmdtu";
// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

// Set UTF-8 charset for Sinhala Unicode text
$con->set_charset("utf8");
?>

