<?Php
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_foriegnscholars WHERE sch_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);

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
<form name="frm" method="post" enctype="multipart/form-data" action="editscholarsdata.php?did=<?Php echo $did; ?>">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">විදේශ ශිෂ්‍යත්ව සඳහා සහභාගීවූවන් වෙනස් කරන්න</td>
  </tr>
  <tr>
    <td align="right">නිලධාරියාගේ ජා.හැ.අංකය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
    <input type="text" name="nid" id="text1" value="<?Php echo $row["sch_nid"]; ?>" readonly="readonly" />
    <span class="textfieldRequiredMsg">නිලධාරියාගේ ජා.හැ.අංකය ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ශිෂ්‍යත්ව වැඩ සටහනේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield2">
      <input type="text" name="schname" id="text2"  value="<?Php echo $row["sch_name"]; ?>" />
      <span class="textfieldRequiredMsg">ශිෂ්‍යත්ව වැඩ සටහනේ නම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">සහභාගී වන රට</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield3">
      <input type="text" name="schcountry" id="text3"  value="<?Php echo $row["sch_country"]; ?>" />
      <span class="textfieldRequiredMsg">සහභාගී වන රට ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පිටත් වූ දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield4">
      <input type="date" name="depdate" id="text4"  value="<?Php echo $row["sch_depaturedate"]; ?>" />
      <span class="textfieldRequiredMsg">පිටත් වූ දිනය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පැමිණි දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield5">
      <input type="date" name="arrdate" id="text5"   value="<?Php echo $row["sch_arrivedate"]; ?>"  />
</span></td>
  </tr>
  <tr>
    <td align="right">කාල සීමාව</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield6">
      <input type="text" name="duration" id="text6"  value="<?Php echo $row["sch_duration"]; ?>" />
      <span class="textfieldRequiredMsg">කාල සීමාව  ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">කාර්යාලය දැරූ වියදම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield7">
      <input type="text" name="expences" id="text7" value="<?Php echo $row["sch_spendamnt"]; ?>" />
</span></td>
  </tr>
  <tr>
    <td align="right" valign="top">වෙනත් විස්තර</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="comnt"><?Php echo $row["sch_comment"]; ?></textarea></td>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:10, maxChars:12});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {isRequired:false});
</script>
</body>
</html>