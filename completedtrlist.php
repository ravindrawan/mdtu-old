<?Php

	include "db.php"; // call the database connection

	$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];

	$sql="SELECT * FROM cp_completedtrainings order by ct_day1 DESC";
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
    <th width="3%">අනු අංකය</th>
    <th >ලිප ගොනු අංකය</th>
    <th >පුහුණු වැඩ සටහන</th>
    <th >පැවැත්වූ ස්ථානය</th>
    <th >ඉලක්කගත කණ්ඩායම</th>
      <th >පුහුණුව පැවැත්වූ දින</th>
    <th >අපේක්ෂිත සහභාගීත්වය</th>
      
      <th >සත්‍ය සහභාගීත්වය</th>
  
    <th>ඇස්තමේන්තුගත මුදල (රු)</th>
    <th>වැය වූ මුදල (රු)</th>
    <th>වෙනත් විස්තර</th>

  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			$ep=0; $ap=0; $ec=0; $ac=0;
			while($rows=mysqli_fetch_assoc($rs)){
?>
  <tr >
    <td><?Php echo $number; ?></td>
    <td><?Php echo $rows["ct_fileno"]; ?></td>
    <td><?Php echo $rows["ct_trname"]; ?></td>
    <td><?Php echo $rows["ct_location"]; ?></td>
    <td><?Php echo $rows["ct_trtargetgroup"]; ?></td>
    <td align="center">
	<?Php 
	if($rows["ct_day1"]!="1111-11-11"){ echo $rows["ct_day1"]; } 
	if($rows["ct_day2"]!="1111-11-11"){ echo "<br>".$rows["ct_day2"]; } 
	if($rows["ct_day3"]!="1111-11-11"){ echo "<br>".$rows["ct_day3"]; } 
	if($rows["ct_day4"]!="1111-11-11"){ echo "<br>".$rows["ct_day4"]; } 
	if($rows["ct_day5"]!="1111-11-11"){ echo "<br>".$rows["ct_day5"]; } 
	if($rows["ct_day6"]!="1111-11-11"){ echo "<br>".$rows["ct_day6"]; } 
	if($rows["ct_day7"]!="1111-11-11"){ echo "<br>".$rows["ct_day7"]; } 
	if($rows["ct_day8"]!="1111-11-11"){ echo "<br>".$rows["ct_day8"]; } 
	if($rows["ct_day9"]!="1111-11-11"){ echo "<br>".$rows["ct_day9"]; } 
	if($rows["ct_day10"]!="1111-11-11"){ echo "<br>".$rows["ct_day10"]; } 

	?>
    
    </td>
    <td align="right" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $rows["ct_noofparticipant"]; ?></td>
    <td align="right" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $rows["ct_noofactualparticipant"]; ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php echo number_format($rows["ct_estimate"],2); ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php if($rows["ct_actualexpenditure"]!=""){echo number_format($rows["ct_actualexpenditure"],2); } ?></td>
    <td><?Php echo $rows["ct_comments"]; ?></td>

  </tr>

<?Php
	$ep=$ep+$rows["ct_noofparticipant"];
	$ap=$ap+$rows["ct_noofactualparticipant"];
	$ec=$ec+$rows["ct_estimate"];
	$ac=$ac+$rows["ct_actualexpenditure"];
	$number=$number+1;
			}
	?>
   <tr style="font-weight:600">
    <td colspan="6" align="center">එකතුව</td>
    <td align="right" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $ep; ?></td>
    <td align="right" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $ap; ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php echo number_format($ec,2); ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php echo number_format($ac,2); ?></td>
    <td>&nbsp;</td>

  </tr>
   
    <?Php		
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
</form>
</body>
</html>