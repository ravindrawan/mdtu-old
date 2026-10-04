<?Php

	include "db.php"; // call the database connection
	$nid=$_GET["nid"];
	$edus=trim(htmlspecialchars($_POST["edus"]));
	$coursedes=trim(htmlspecialchars($_POST["coursedes"]));
	$cname=trim(htmlspecialchars($_POST["cname"]));
	$cins=trim(htmlspecialchars($_POST["cins"]));
	$csdate=trim(htmlspecialchars($_POST["csdate"]));
	$cduration=trim(htmlspecialchars($_POST["cduration"]));
	$cedate=trim(htmlspecialchars($_POST["cedate"]));
	$cfees=trim(htmlspecialchars($_POST["cfees"]));
	$crelevant=trim(htmlspecialchars($_POST["crelevant"]));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="css/tabpanel.css" rel="stylesheet" type="text/css" />
<title>Management Development & Training Unit - Wayamba Provincial Council</title>
</head>

<body>


</body>
</html>