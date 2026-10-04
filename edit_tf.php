<?Php
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_trfields WHERE tf_id='$did'";
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
<form name="frm" method="post" enctype="multipart/form-data" action="edittfsdata.php?did=<?Php echo $did; ?>">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">විෂය ක්ෂේත්‍රය වෙනස් කරන්න</td>
  </tr>
  <tr>
    <td align="right">විෂය ක්ෂේත්‍රය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="desig" id="text1" value="<?Php echo $row["tf_name"]; ?>" />
    <span class="textfieldRequiredMsg">විෂය ක්ෂේත්‍රය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" වෙනස් කරන්න " /></td>
    </tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
</script>
</body>
</html>