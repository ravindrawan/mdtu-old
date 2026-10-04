<?Php

	include "db.php"; // call the database connection
	$did=$_GET["did"];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="editforiegnschdata.php?did=<?Php echo $did; ?>">

<?Php
	$Sql="SELECT * FROM cp_foreignschols where fs_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);

?>
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">විදේශ ශිෂ්‍යත්ව වෙනස් කරන්න</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">* ලිපි ගොනුව</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <label for="text1"></label>
      <input type="file" name="scf" id="text1" />
      <span class="textfieldRequiredMsg">අදාල ලිපි ගොනුව තෝරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">* විදේශ ශිෂ්‍යත්වයේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield2">
      <input type="text" name="scname" id="text2"  value="<?Php echo $row["fs_name"]; ?>" />
      <span class="textfieldRequiredMsg">විදේශ ශිෂ්‍යත්වයේ නම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">* අදාල රට</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield3">
      <input type="text" name="sccountry" id="text3"  value="<?Php echo $row["fs_country"]; ?>" />
      <span class="textfieldRequiredMsg">අදාල රට ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">* අයදුම් කල යුතු අවසාන දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield4">
      <input type="date" name="cldate" id="text4"  value="<?Php echo $row["fs_closingdate"]; ?>" />
      <span class="textfieldRequiredMsg">අයදුම් කල යුතු අවසාන දිනය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right" valign="top">වෙනත් විස්තර</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="comnt"><?Php echo $row["fs_comment"]; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" වෙනස් කරන්න " /></td>
    </tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
</script>
</body>
</html>