<?Php
	session_start(); //To use the SESSION variable

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addundate.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">පරිශීලක ගිණුම් ඇතුලත් කරන්න</td>
  </tr>
  <tr>
    <td align="right">කාර්යාලයේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left">
      <select name="offs">
        <option></option>
        <?Php
				$sqlr="SELECT * FROM offices order by of_name ASC";
				$rsr=mysqli_query($con,$sqlr);
				$numberofRowsr= mysqli_num_rows($rsr);
				if($numberofRowsr !=0){
					while($rowsr=mysqli_fetch_assoc($rsr)){
						?>
        <option><?php echo $rowsr["of_name"]; ?></option>
        <?Php
					}
				}
			?>
        </select>
      
      </td>
  </tr>
  <tr>
    <td align="right">පරිශීලක නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="un" id="text1" />
      <span class="textfieldRequiredMsg">පරිශීලක නම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">මුර පදය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprypassword1">
      <input type="password" name="pwd" id="password1" />
      <span class="passwordRequiredMsg">මුර පදය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පරිශීලක ගිණුමේ වර්ගය</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    	<select name="untype">
        	<option>User</option>
        	<option>Super User</option>
            
        	<option>Administrator</option>

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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
</body>
</html>