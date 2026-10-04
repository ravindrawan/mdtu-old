<?Php

	include "db.php"; // call the database connection

	$sql="SELECT * FROM cp_staff order by stf_office ASC";
	$rs=mysqli_query($con,$sql);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/tabls.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
</head>

<body>
<table width="100%" border="1" class="zebra">
  <tr>
    <th width="3%">අනු අංකය</th>
    <th width="3%"></th>

    <th width="13%">නම</th>
    <th width="17%" >කාර්යාලය</th>
    <th>උපන් දිනය</th>
    <th width="11%" >ජංගම දුරකතන අංකය</th>
    <th width="13%" >ඊමේල් ලිපිනය</th>
  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			while($rows=mysqli_fetch_assoc($rs)){
				$bd=substr($rows["stf_dob"],5);
				$td=date("m-d");
				if($bd==$td){
?>
  <tr>
    <td ><?Php echo $number; ?></td>
    <td align="center">
    <?Php
		if($rows["stf_Photo"]!=""){
	?>
    <img src="staff/<?Php echo $rows["stf_Photo"];  ?>" height="35" />
    <?Php
		}
		else{
	?>		
    <img src="staff/staffavatar.png" height="35" />
    <?Php
		}
	?>
    </td>
    <td><?Php echo $rows["stf_Name"]; ?></td>
    <td><?Php echo $rows["stf_office"]; ?></td>
    <td align="center" style="font-family:Tahoma, Geneva, sans-serif"><?Php echo substr($rows["stf_dob"],5); ?></td>

    <td style="font-family:Tahoma, Geneva, sans-serif"><?Php echo $rows["stf_mobile"]; ?></td>
    <td style="font-family:Tahoma, Geneva, sans-serif"><?Php echo $rows["stf_email"]; ?></td>
  </tr>

<?Php
	$number=$number+1;
			}
		}
		}
		else{
?>
  <tr>
    <td colspan="10" style="font-size:18px;font-weight:700" align="center">තොරතුරු කිසිවක් නොමැත...!</td>
  </tr>
<?Php
		}
		$con->close();
?>
</table>
    	<table width="100%"><tr><td width="80%"></td><td style="padding-left:5px;background-color:#000;font-size:16px" align="center" id="menulink" height="25px" width="20%">    <?Php
	if($_SESSION['logtype']=="Administrator"){
	?>
    <a href="control.php">පාලන පුවරුව</a>
    <?Php
	}
	else{
	?>
    <a href="usercontrolpanel.php">පාලන පුවරුව</a>
	<?Php
	}
	?>    
</td></tr></table>

</body>
</html>