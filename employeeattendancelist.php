<?Php

	include "db.php"; // call the database connection
	
	$atpiddata=trim(htmlspecialchars($_GET["atpid"]));
	$trds=explode('|',$atpiddata);
	$atpid=$trds[0];
	$atpsdate=$trds[1];


	$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];
	$td=date("Y-m-d");
	//echo $tr;

	$sql="SELECT * FROM cp_trainingapplications where ((tapp_trstartdate='$atpsdate' AND tapp_atpid='$atpid') AND tapp_isselected='Yes') order by tapp_office ASC";
	

	$rs=mysqli_query($con,$sql);

//$rowsatpid=mysqli_fetch_assoc($rs);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/tabls.css" rel="stylesheet" type="text/css" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />

<title>Management Development & Training Unit - Wayamba Provincial Council</title>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addattendance.php?atpid=<?Php echo $atpid."|".$atpsdate; ?>">

<table width="100%" border="1" class="zebra">
  <tr>
    <th width="7%">අනු අංකය</th>
    <th>පුහුණු වැඩ සටහන</th>
    <th >ඉල්ලුම් කල නිලධාරියාගේ ජා.හැ.අ.</th>
    
    <th >නිලධාරියාගේ නම</th>
    
    <th >තනතුරු නාමය</th>
    <th >කාර්යාලය</th>
    <th >ජංගම දුරකථන අංකය</th>
    <th >නිලධාරීන්ගේ පැමිණීම</th>
    <th >අසාදුලේඛනගත කරන්න</th>

    <th >වෙනත් විස්තර</th>
    
  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			$m="";$f="";$e="";$v="";
			$male="";$female="";
			while($rows=mysqli_fetch_assoc($rs)){
				$nid=$rows["tapp_officerNid"];

	$sqlstf="SELECT * FROM cp_staff where stf_Nid='$nid'";
	$rsstf=mysqli_query($con,$sqlstf);
	$rowsstf=mysqli_fetch_assoc($rsstf);
				
?>
  <tr >
    <td><?Php echo $number; ?></td>
    <td><?Php echo $rows["tapp_trname"]; ?></td>
    
    <td align="center" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $rows["tapp_officerNid"]; ?></td>

    <td><?Php echo $rowsstf["stf_Name"]; ?></td>
    <td><?Php echo $rowsstf["stf_desig"]; ?></td>
    <td><?Php echo $rowsstf["stf_office"]; ?></td>
    <td align="center" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $rowsstf["stf_mobile"]; ?></td>
<?Php
	$sqlattendance="SELECT * FROM cp_trainingattendance where (tratt_atpid='$atpid' AND  tratt_startdate='$atpsdate') AND tratt_empnid='$nid'";
				$rsattendance=mysqli_query($con,$sqlattendance);
				$numberofRowsattendance= mysqli_num_rows($rsattendance);
				$rowsatts=mysqli_fetch_assoc($rsattendance);
				if($numberofRowsattendance >0){//check the data alreaddy added

?>

    <td align="center" <?Php if($rowsatts["tratt_isparti"]=="Yes") { ?> bgcolor="#00FF00" <?Php } else{ ?> bgcolor="#333333" 
	<?Php } ?> >
    <input type="checkbox" name="addtr[]" value="<?php echo $rows["tapp_officerNid"]; ?>" 
    
    <?Php if($rowsatts["tratt_isparti"]=="Yes") { ?> checked="checked" <?Php } ?> />
    
    </td>
	<?Php
				}
				else{
	?>
    <td align="center" >
    <input type="checkbox" name="addtr[]" value="<?php echo $rows["tapp_officerNid"]; ?>" 
    
    checked="checked" />
    
    </td>
	<?Php
				}
	?>    
    <td align="center" <?Php if($rowsstf["stf_blacklisted"]=="Yes"){ ?> bgcolor="#FF0000" <?Php } ?>>
    <input type="checkbox" name="addblist[]" value="<?php echo $rows["tapp_officerNid"]; ?>" /></td>
    <td align="center"><a href="addotherattendacedetails.php?nid=<?Php echo $rows["tapp_officerNid"]."|".$atpid."|".$atpsdate; ?>">වෙනත් විස්තර</a></td>

  </tr>

<?Php
	$number=$number+1;
			}
	?>
  <tr >
    <td colspan="7">&nbsp;</td>
    <td colspan="2" align="center" ><input type="submit" name="submit" value="ඇතුලත් කරන්න" /></td>
    <td>&nbsp;</td>
    </tr>
    
  <?Php		
  
		}
		
		else{
?>
  <tr>
    <td colspan="12" style="font-size:18px;font-weight:700" align="center">තොරතුරු කිසිවක් නොමැත...!</td>
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