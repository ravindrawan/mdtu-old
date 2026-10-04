<?Php

	include "db.php"; // call the database connection

	$sql="SELECT * FROM cp_appliedforiegnscholars order by apsch_applydate ASC";
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
    <th >අනු අංකය</th>
    <th >නිලධාරියාගේ ජා.හැ.අ.</th>
    <th  >නම</th>
    <th >තනතුර</th>
    <th >කාර්යාලය</th>
    <th>ශිෂ්‍යත්ව වැඩ සටහන</th>
    <th >සහභාගී වන රට</th>
    <th >අයදුම් කල දිනය</th>
    <th >ආරම්භවන දිනය</th>
    <th >කාල සීමාව</th>
    <th >වෙනත් විස්තර</th>
    <th width="5%">මකන්න</th>
  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			while($rows=mysqli_fetch_assoc($rs)){
?>
  <tr>
    <td><?Php echo $number; ?></td>
    <td><?Php echo $rows["apsch_nid"]; ?></td>
    <td>
	<?Php 
	$nid=$rows["apsch_nid"]; 
		$sqls="SELECT * FROM cp_staff where stf_Nid='$nid'";
		$rss=mysqli_query($con,$sqls);
		$rowss=mysqli_fetch_assoc($rss);
		echo $rowss["stf_Name"];

	?>
    </td>
    <td><?Php echo $rowss["stf_desig"]; ?></td>
    <td><?Php echo $rowss["stf_office"]; ?></td>
    <td><?Php echo $rows["apsch_name"]; ?></td>
    <td><?Php echo $rows["apsch_country"]; ?></td>
    <td><?Php echo $rows["apsch_applydate"]; ?></td>
    <td><?Php echo $rows["apsch_depaturedate"]; ?></td>
    <td align="center"><?Php echo $rows["apsch_duration"]; ?></td>
    <td align="left"><?Php echo $rows["apsch_comment"]; ?></td>
    <td align="center"><a href="deleteappliedscholars.php?did=<?Php echo $rows["apsch_id"]; ?>"><img src="images/delete.png" width="20" height="20" alt="delete" /></a></td>
  </tr>

<?Php
	$number=$number+1;
			}
		}
		else{
?>
  <tr>
    <td colspan="13" style="font-size:18px;font-weight:700" align="center">තොරතුරු කිසිවක් නොමැත...!</td>
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