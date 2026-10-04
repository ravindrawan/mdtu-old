<?Php

	include "db.php"; // call the database connection

	$offname=trim(htmlspecialchars($_POST["offname"]));
	$trname=trim(htmlspecialchars($_POST["trname"]));
	$trsdate=trim(htmlspecialchars($_POST["trsdate"]));
	$noofdays=trim(htmlspecialchars($_POST["noofdays"]));
	$amnt=trim(htmlspecialchars($_POST["amnt"]));

	$other=trim(htmlspecialchars($_POST["other"]));

	$sql="SELECT * FROM offices where of_name='$offname'";
	$rs=mysqli_query($con,$sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<title>Untitled Document</title>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addothertrnsdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">
        <?Php

			
				$sqlinsert = "insert into cp_othertrns(otr_office,otr_trns,otr_sdate,otr_nooftrns,otr_amount,otr_comments)
				values('".$offname."','".$trname."','".$trsdate."','".$noofdays."','".$amnt."','".$other."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "වෙනත් කාර්යාල මගින් පැවැත්වූ පුහුණු ඇතුලත් කිරීම සාර්ථකයි...නව පුහුණු වැඩ සටහනක් ඇතුලත් කරන්න";
						}
   
		?>    
    
    </td>
  </tr>
  <tr>
    <td align="right">කාර්යාලයේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="offname" id="text1" size="50" />
      <span class="textfieldRequiredMsg">කාර්යාලයේ නම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පුහුණු වැඩ සටහන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield7">
      <input type="text" name="trname" id="text7" size="50" />
      <span class="textfieldRequiredMsg">පුහුණු වැඩ සටහන ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පුහුණුව ආරම්භ වූ දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="date" name="trsdate" /></td>
  </tr>
  <tr>
    <td align="right">පැවැත් වූ දින ගණන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="noofdays" /></td>
  </tr>
  <tr>
    <td align="right">වැය කල මුදල</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield8">
      <input type="text" name="amnt" id="text8" />
      <span class="textfieldRequiredMsg">වැය කල මුදල ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">වෙනත් විස්තර</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="other"></textarea></td>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {isRequired:false, minChars:10, maxChars:10});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {isRequired:false, minChars:10, maxChars:10});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer", {isRequired:false, minChars:10, maxChars:10});
</script>

</body>
</html>