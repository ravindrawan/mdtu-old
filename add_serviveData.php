<?Php

	include "db.php"; // call the database connection

	$desig=trim(htmlspecialchars($_POST["desig"]));

	$sql="SELECT * FROM cp_services where ser_name='$desig'";
	$rs=mysqli_query($con,$sql);


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
<form name="frm" method="post" enctype="multipart/form-data" action="addservicedata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">
        <?Php
        	if(mysqli_num_rows($rs)<1){//if user not exists
			
				$sqlinsert = "insert into cp_services (ser_name) values ('".$desig."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "සේවාව ඇතුලත් කිරීම සාර්ථකයි...නව සේවාවක් ඇතුලත් කරන්න<br><br>
							";
						}
						
			}
 			else{
				echo "මෙම සේවාව දැනටමත් ඇතුලත් කර ඇත...කරුණාකර වෙනත් සේවාවක් ඇතුලත් කරන්න.";	
			}
  
		?>    
    
    </td>
  </tr>
  <tr>
    <td align="right">සේවා නාමය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="desig" id="text1" />
    <span class="textfieldRequiredMsg">සේවා නාම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" ඇතුල් කරන්න " /></td>
    </tr>
  
</table>
</form>
</body>
</html>