<?Php

	include "db.php"; // call the database connection

	$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];
	$td=date("Y-m-d");

	$sql="SELECT * FROM cp_atp where atp_day1<'$td' order by atp_day1 ASC";
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
<form name="frm" method="post" enctype="multipart/form-data" action="addtoatp.php">
<table width="100%" border="1" class="zebra">
  <tr>
    <th >අනු අංකය</th>
    <th>ලිපිගොනු අංකය</th>
    
    <th >පැවැත්වූ දිනය</th>
    <th >පුහුණු වැඩ සටහන</th>
    <th >ඉලක්කගත කණ්ඩායම</th>
    <th >සහභාගී වන්නන් සංඛ්‍යාව</th>
      <th >පැවැත්වෙන දින ගණන</th>
      <th >පැවැත්වෙන ස්ථානය</th>
  
    <th >සම්පත් දායකයින්</th>
    <th >&nbsp;</th>
    <th >&nbsp;</th>
    
  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			while($rows=mysqli_fetch_assoc($rs)){
				$atpid=$rows["atp_id"];
				$sdate=$rows["atp_day1"];
				
				$sqlct="SELECT * FROM cp_completedtrainings where (ct_atpid='$atpid' and ct_day1='$sdate') AND ct_noofactualparticipant=''";
				$rsct=mysqli_query($con,$sqlct);
				$numberofRowsct= mysqli_num_rows($rsct);
				if($numberofRowsct!=0){
				
?>
  <tr >
    <td><?Php echo $number; ?></td>
    <td align="center"><?Php echo $rows["atp_fileno"]; ?></td>
    <td  align="center"><?Php echo $rows["atp_day1"]; ?></td>
    <td><?Php echo $rows["atp_trname"]; ?></td>
    <td><?Php echo $rows["atp_targetgroup"]; ?></td>
    <td  align="center"><?Php echo $rows["atp_noofparticipants"]; ?></td>
    <td align="center"><?Php echo $rows["atp_noofdays"]; ?></td>
    <td><?Php echo $rows["atp_location"]; ?></td>
    <td><?Php echo $rows["atp_resourcep1"];
	
	if($rows["atp_resourcep2"]!=""){ echo ", ".$rows["atp_resourcep2"]; }
	if($rows["atp_resourcep3"]!=""){ echo ", ".$rows["atp_resourcep3"]; }
	if($rows["atp_resourcep4"]!=""){ echo ", ".$rows["atp_resourcep4"]; }
	if($rows["atp_resourcep5"]!=""){ echo ", ".$rows["atp_resourcep5"]; }
	if($rows["atp_resourcep6"]!=""){ echo ", ".$rows["atp_resourcep6"]; }
	if($rows["atp_resourcep7"]!=""){ echo ", ".$rows["atp_resourcep7"]; }
	if($rows["atp_resourcep8"]!=""){ echo ", ".$rows["atp_resourcep8"]; }
	if($rows["atp_resourcep9"]!=""){ echo ", ".$rows["atp_resourcep9"]; }
	if($rows["atp_resourcep10"]!=""){ echo ", ".$rows["atp_resourcep10"]; }
	
 ?></td>
    <td align="center"><a href="employeeattendance.php?atpid=<?Php echo $rows["atp_id"]."|".$rows["atp_day1"]; ?>">නිලධාරීන්ගේ පැමිණීම</a></td>
    <td align="center" ><a href="finishTrainings.php?atpid=<?Php echo $rows["atp_id"]."|".$rows["atp_day1"]; ?>" target="new">පුහුණු වැඩ සටහන අවසන් කිරීම</a></td>

  </tr>

<?Php
				}
		$number=$number+1;
			}
		}
		else{
?>
  <tr>
    <td colspan="11" style="font-size:18px;font-weight:700" align="center">තොරතුරු කිසිවක් නොමැත...!</td>
  </tr>
<?Php
		}
		$con->close();
?>
</table>
    	<table width="100%"><tr><td width="80%"></td><td style="padding-left:5px;background-color:#000;font-size:16px" align="center" id="menulink" height="25px" width="20%">    <?Php
	if($_SESSION['logtype']=="Administrator" || $_SESSION['logtype']=="Super User"){
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
</form>
</body>
</html>