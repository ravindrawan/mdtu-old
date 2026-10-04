<?Php

	include "db.php"; // call the database connection

	$food=trim(htmlspecialchars($_POST["food"]));
	$price=trim(htmlspecialchars($_POST["price"]));

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
<form name="frm" method="post" enctype="multipart/form-data" action="addfooddata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">

        <?Php
			
				$sqlinsert = "insert into cp_food (fd_name,fd_price) 
							values ('".$food."','".$price."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "ආහාර ඇතුලත් කිරීම සාර්ථකයි...නව ආහාර වර්ගයක් ඇතුලත් කිරීම සඳහා <a href='food.php'>මෙතනින්</a> යන්න<br><br>
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