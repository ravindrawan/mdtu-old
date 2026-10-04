<?Php

	include "db.php"; // call the database connection

	$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];
	
	$td=date("Y-m-d");

	$sql="SELECT * FROM cp_atp where atp_requestDate>'$d' AND (atp_isinatp='Yes' AND atp_lastdateapply>='$td') order by atp_lastdateapply ASC";
	$rs=mysqli_query($con,$sql);

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
<form name="frm" method="post" enctype="multipart/form-data" action="viewspecialmsg.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">පුහුණු වැඩ සටහන් සඳහා අයදුම් කරන්න</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ජාතික හැඳුනුම්පත් අංකය *</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
    <input type="text" name="nid" id="text1" />
    <span class="textfieldRequiredMsg">ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි ජාතික හැඳුනුම්පත් අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජාතික හැඳුනුම්පත් අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පුහුණු වැඩ සටහන *</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    	<select name="uptr">
<?Php
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			while($rows=mysqli_fetch_assoc($rs)){
		?>
        		<option value="<?Php echo $rows["atp_id"]; ?>"><?Php echo $rows["atp_trname"]; ?></option>
        <?Php	
			}
		}
?>        
        </select>
    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" ඇතුල් කරන්න " /></td>
  </tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:10, maxChars:12});
</script>
</body>
</html>