<?Php
	include "db.php"; // call the database connection

	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_food WHERE fd_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
</head>

<body>

<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">ආහාර පාන ඉවත් කරන්න</td>
  </tr>
  <tr>
    <td align="right">ආහාර වර්ගය</td>
    <td align="center">&nbsp;</td>
    <td align="left" style="font-weight:700"><?Php echo $row["fd_name"]; ?></td>
  </tr>
  <tr>
    <td align="right">මිල ගණන (රුපියල්)</td>
    <td align="center">&nbsp;</td>
    <td align="left" style="font-weight:700"><?Php echo $row["fd_price"]; ?></td>
  </tr>
  <tr>
    <td colspan="2" align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <form name="frm" method="post" enctype="multipart/form-data" action="editviewfood.php">
    	<input type="submit" name="submit" value=" අවලංගු කරන්න " />
    </form>
    
    </td>
    <td align="center">
    <form name="frm" method="post" enctype="multipart/form-data" action="deletefooddata.php?did=<?Php echo $did; ?>">
    	<input type="submit" name="submit" value=" ඉවත් කරන්න " />
    </form>
    </td>
    </tr>
</table>

</body>
</html>