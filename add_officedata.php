<?Php

	include "db.php"; // call the database connection

	$offname=trim(htmlspecialchars($_POST["offname"]));
	$desig=trim(htmlspecialchars($_POST["desig"]));
	$addr=trim(htmlspecialchars($_POST["addr"]));
	$tele=trim(htmlspecialchars($_POST["tele"]));
	$tele2=trim(htmlspecialchars($_POST["tele2"]));

	$fx=trim(htmlspecialchars($_POST["fx"]));
	$email=trim(htmlspecialchars($_POST["email"]));

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
<form name="frm" method="post" enctype="multipart/form-data" action="addofficeData.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">
        <?Php
        	if(mysqli_num_rows($rs)<1){//if user not exists
			
				$sqlinsert = "insert into offices(of_name,of_headdesig,of_addr,of_tele,of_tele2,of_fax,of_email)
				values('".$offname."','".$desig."','".$addr."','".$tele."','".$tele2."','".$fx."','".$email."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "කාර්යාලය ඇතුලත් කිරීම සාර්ථකයි...නව කාර්යාලයක් ඇතුලත් කරන්න";
						}
			}
			else{
				echo "මෙම කාර්යාලය දැනටමත් ඇතුලත් කර ඇත...කරුණාකර වෙනත් කාර්යාලයක් ඇතුලත් කරන්න.";	
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
    <td align="right">ආයතන ප්‍රධානියාගේ තනතුර</td>
    <td align="center">&nbsp;</td>
    <td align="left">
        	<select name="desig">
            	<option></option>
            <?Php
				$sqlr="SELECT * FROM cp_desigs order by des_name ASC";
				$rsr=mysqli_query($con,$sqlr);
				$numberofRowsr= mysqli_num_rows($rsr);
				if($numberofRowsr !=0){
					while($rowsr=mysqli_fetch_assoc($rsr)){
						?>
                        <option><?php echo $rowsr["des_name"]; ?></option>
                <?Php
					}
				}
			?>
            </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">ලිපිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield2">
      <input type="text" name="addr" id="text2" size="50" />
</span></td>
  </tr>
  <tr>
    <td align="right">දුරකතන අංකය 1</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield3">
    <input type="text" name="tele" id="text3" /> (උදා-0812222222)
    <span class="textfieldInvalidFormatMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">දුරකතන අංකය 2</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield6">
    <input type="text" name="tele2" id="text6" />
    <span class="textfieldMinCharsMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldInvalidFormatMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ෆැක්ස් අංකය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield4">
    <input type="text" name="fx" id="text4" />
    <span class="textfieldMinCharsMsg">නිවැරදි ෆැක්ස් අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ෆැක්ස් අංකයක් ඇතුලත් කරන්න</span><span class="textfieldInvalidFormatMsg">නිවැරදි ෆැක්ස් අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ඊමේල් ලිපිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield5">
      <input type="text" name="email" id="text5" />
      <span class="textfieldInvalidFormatMsg">නිවැරදි ඊමේල් ලිපිනයක් ඇතුලත් කරන්න</span></span></td>
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