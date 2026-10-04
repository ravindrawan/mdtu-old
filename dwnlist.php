<?Php

	include "db.php"; // call the database connection

	$sql="SELECT * FROM cp_downloads order by dwn_date,dwn_type DESC";
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
    <th width="6%" >අනු අංකය</th>
     <th width="7%" >දිනය</th>
   
    <th width="12%" >ලිපිගොනුව/ ඡායාරූපය 1</th>

    <th width="11%">වර්ගය</th>
    <th width="19%" >නම</th>
     <th width="18%" >පුහුණු වැඩ සටහන</th>

    <th width="19%" >විස්තරය</th>

    <th width="8%" >&nbsp;</th>
  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			while($rows=mysqli_fetch_assoc($rs)){
?>
  <tr>
    <td><?Php echo $number; ?></td>
    <td><?Php echo $rows["dwn_date"]; ?></td>

    <td>
    <a href="uploads/<?Php echo $rows["dwn_file"]; ?>"><?Php echo $rows["dwn_file"]; ?></a>
    </td>
    <td><?Php echo $rows["dwn_type"]; ?></td>
    <td><?Php echo $rows["dwn_name"]; ?></td>
    <td><?Php echo $rows["dwn_training"]; ?></td>

    <td><?Php echo $rows["dwn_des"]; ?></td>


    <td align="center"><a href="deletedwnfls.php?did=<?Php echo $rows["dwn_id"]; ?>"><img src="images/delete.png" width="20" height="20" alt="delete" /></a></td>
  </tr>

<?Php
	$number=$number+1;
			}
		}
		else{
?>
  <tr>
    <td colspan="8" style="font-size:18px;font-weight:700" align="center">තොරතුරු කිසිවක් නොමැත...!</td>
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