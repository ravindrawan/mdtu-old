<?Php

	include "db.php"; // call the database connection

	$msgdate=trim(htmlspecialchars($_POST["msgdate"]));
	$msg=trim(htmlspecialchars($_POST["msg"]));
	$msgstatus=trim(htmlspecialchars($_POST["msgstatus"]));

//	$sql="SELECT * FROM cp_funds where fnd_name='$desig'";
//	$rs=mysqli_query($con,$sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addmsgdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">

        <?Php
			
				$sqlinsert = "insert into cp_messeges (msg_date,msg_message,msg_status) 
							values ('".$msgdate."','".$msg."','".$msgstatus."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "නිවේදනය ඇතුලත් කිරීම සාර්ථකයි...නව නිවේදනයක් ඇතුලත් කිරීම සඳහා <a href='messages.php'>මෙතනින්</a> යන්න<br><br>
							";
						}
						
  
		?>    
    
    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  </table>
</form>
</body>
</html>