<?Php

	include "db.php"; // call the database connection

	$desig=trim(htmlspecialchars($_POST["desig"]));


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
<form name="frm" method="post" enctype="multipart/form-data" action="adddesigsData.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">
        <?Php
        	if(mysqli_num_rows($rs)<1){//if user not exists
			
				$sqlinsert = "update trdate set trd_date='$desig' where trd_id='1'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "සැලැස්ම සකස් කිරීම සඳහා අවශ්‍ය පුහුණු අවශ්‍යතා ඇතුලත් කල දිනය ඇතුලත් කිරීම සාර්ථකයි...<br><br>
							<a href='control.php'>පාලන පුවරුව</a>
							";
						}
			}
			else{
				echo "සැලැස්ම සකස් කිරීම සඳහා අවශ්‍ය පුහුණු අවශ්‍යතා ඇතුලත් කල දිනය ඇතුලත් කිරීම අසාර්ථකයි";	
			}
   
		?>    
    
    </td>
  </tr>
</table>
</form>
</body>
</html>