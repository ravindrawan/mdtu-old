<?Php
	include "db.php"; // call the database connection

	$atpiddata=trim(htmlspecialchars($_GET["atpid"]));
	$trds=explode('|',$atpiddata);
	$atpid=$trds[0];
	$atpsdate=$trds[1];
	
	//get atp details
	$sqlatp="SELECT * FROM cp_atp where atp_id='$atpid' AND atp_day1='$atpsdate'";
	$rsatp=mysqli_query($con,$sqlatp);
	$rowsatp=mysqli_fetch_assoc($rsatp);
	
	$atpfileno=$rowsatp["atp_fileno"];
	$atpname=$rowsatp["atp_trname"];

	//het training application data
	$sql="SELECT * FROM cp_trainingapplications where ((tapp_trstartdate='$atpsdate' AND tapp_atpid='$atpid') AND tapp_isselected='Yes') order by tapp_office ASC";
	$rs=mysqli_query($con,$sql);
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			while($rows=mysqli_fetch_assoc($rs)){
				
				$nid=$rows["tapp_officerNid"];
				$isparty="";
				$cmnt="";
				//add applicants to attendance table
	
				$sqlattendance="SELECT * FROM cp_trainingattendance where (tratt_atpid='$atpid' AND  tratt_startdate='$atpsdate') AND tratt_empnid='$nid'";
				$rsattendance=mysqli_query($con,$sqlattendance);
				$numberofRowsattendance= mysqli_num_rows($rsattendance);
				if($numberofRowsattendance <=0){//check the data alreaddy added
					$sqlinsertattendance="insert into cp_trainingattendance 
					(tratt_atpid,tratt_atpfileno,tratt_atpname,tratt_startdate,tratt_empnid,tratt_isparti,tratt_comnt) 
					values ('".$atpid."','".$atpfileno."','".$atpname."','".$atpsdate."','".$nid."','".$isparty."','".$cmnt."')";
					$rsinsertattendance=mysqli_query($con,$sqlinsertattendance);
				}

				
			}
		}


if(!$_POST['addtr']){

		$sqlatpset="UPDATE cp_trainingattendance SET tratt_isparti='' WHERE (tratt_atpid='$atpid' AND tratt_startdate='$atpsdate')";
		$rsatpset=mysqli_query($con,$sqlatpset);
	
	?>
	<meta http-equiv="refresh" content="0; url=employeeattendance.php?atpid=<?Php echo $atpid."|".$atpsdate; ?>" />  
	<?Php
    	 die("File not found");	

}
else{
	//when checkbox not selected clear the atp
		$sqlatpset="UPDATE cp_trainingattendance SET tratt_isparti='' WHERE (tratt_atpid='$atpid' AND tratt_startdate='$atpsdate')";
		$rsatpset=mysqli_query($con,$sqlatpset);

foreach($_POST['addtr'] as $value)
{
	//echo 'Checked: '.$value.''.'<br>';
	$treqs=explode('|',$value);
	$empnid = $treqs[0];

	//echo $empnid;
	
	$sqlatup="UPDATE  cp_trainingattendance SET tratt_isparti='Yes' WHERE (tratt_atpid='$atpid' AND tratt_startdate='$atpsdate') AND tratt_empnid='$empnid'";
	$rsatup=mysqli_query($con,$sqlatup);
	

}
}

// Add to blacklist
if(!empty($_POST['addblist'])){
foreach($_POST['addblist'] as $bvalue)
{
	//echo 'Checked: '.$value.''.'<br>';
	$btreqs=explode('|',$bvalue);
	$bempnid = $btreqs[0];

	//echo $empnid;
	
	$sqlblistup="UPDATE  cp_staff SET stf_blacklisted='Yes' WHERE stf_Nid='$bempnid'";
	$rsblist=mysqli_query($con,$sqlblistup);
	
}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<link href="css/tabpanel.css" rel="stylesheet" type="text/css" />
<script src="scripts/tabpanel.js" type="text/javascript"></script>

<title>Management Development & Training Unit - Wayamba Provincial Council</title>
</head>

<body>

<table width="100%" border="0" style="position:relative;border-collapse:collapse">
  <tr>
    <td><?php include('header.php');?></td>
  </tr>
  <tr>
    <td>
<!-- ********************** Designations ********************************************** -->
<table width="100%" border="0">
  <tr>
    <td width="20%" valign="top"><?php include('leftmenu.php');?></td>
    <td width="80%" valign="top">
        <div class="tab">
        	<!--<button class="tablinks" onclick="openCity(event, 'London')" >තනතුරු ඇතුලත් කරන්න</button>-->
            <button class="tablinks" onClick="openCity(event, 'Paris')">පුහුණු වැඩ සටහන් සඳහා තෝරාගත් නිලධාරීන්ගේ පැමිණීම සටහන් කිරීම</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 	<!--	<div id="London" class="tabcontent" style="display:block">
            <?Php require_once("adddesigsnations.php"); ?>
        </div>
      -->                
        <div id="Paris" class="tabcontent" style="display:block">
						<div>
             			<?Php require_once("employeeattendancelist.php"); ?>
                        </div>
        </div>
   
    </td>
  </tr>
</table>

<!-- ********************** End of User accounts ********************************************** -->
    </td>
  </tr>
  <tr>
    <td style="background-color:#000"><?php include('footer.php');?></td>
  </tr>

</table>

</body>
</html>