<?Php
	include "db.php"; // call the database connection
	
		$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];

	$sqlw="SELECT * FROM cp_trrequirements where req_adddate>'$d' order by req_adddate ASC";
	$rsw=mysqli_query($con,$sqlw);
			while($rowsw=mysqli_fetch_assoc($rsw)){
				$sqlu="UPDATE  cp_trrequirements SET req_isadd='' where req_adddate>'$d'";
				$rsu=mysqli_query($con,$sqlu);
				
			}

if(!$_POST['addatp']){
	?>
	<meta http-equiv="refresh" content="0; url=createatp.php" />  
	<?Php
    	 die("File not found");	

}
else{
	//when checkbox not selected clear the atp
		$sqlatpset="UPDATE  cp_atp SET atp_isinatp='' WHERE atp_requestDate>'$d'";
		$rsatpset=mysqli_query($con,$sqlatpset);

foreach($_POST['addatp'] as $value)
{
	//echo 'Checked: '.$value.''.'<br>';
	$treqs=explode('~',$value);
	$vals=$treqs[0];
	$ids = $treqs[1];
	
//	echo $vals." - ";
	
	$sql="UPDATE  cp_trrequirements SET req_isadd='$vals' WHERE req_id='$ids'";
	$rs=mysqli_query($con,$sql);
	
	$sqlatpchk="SELECT * FROM cp_atp where atp_requestDate>'$d' AND atp_trReqID='$ids' order by atp_requestDate ASC";
	$rsatpchk=mysqli_query($con,$sqlatpchk);
	$numberofRowsatpchk= mysqli_num_rows($rsatpchk);
	
	if($numberofRowsatpchk==""){
		$sqltr="SELECT * FROM cp_trrequirements where req_id='$ids' order by req_adddate ASC";
		$rstr=mysqli_query($con,$sqltr);
		$rowtr=mysqli_fetch_assoc($rstr);
		$dat=$rowtr["req_adddate"];
		$trname=$rowtr["req_training"];
		$desig=$rowtr["req_post"];
		$office=$rowtr["req_addoffice"];

				$sqlinsertatp = "insert into cp_atp(atp_trReqID,atp_requestDate,atp_trname,atp_reqdesig,atp_reqoffice,
				atp_isinatp,
				atp_fileno,atp_subjctno,atp_purpose,atp_content,atp_targetgroup,atp_nooftrainings,atp_noofdays,
				atp_noofparticipants,atp_location,atp_day1,atp_day2,atp_day3,atp_day4,atp_day5,atp_day6,atp_day7,
				atp_day8,atp_day9,atp_day10,atp_stime,atp_etime,atp_fundsource,atp_bdjet,
				atp_isaddatp,atp_addhome,atp_lastdateapply,
				atp_otherfacts,atp_specialfacts,atp_showspecialfacts,atp_specialfinletter,atp_resourcep1,atp_resourcep2,
				atp_resourcep3,atp_resourcep4,atp_resourcep5,atp_resourcep6,atp_resourcep7,atp_resourcep8,atp_resourcep9,
				atp_resourcep10,atp_cashofficername,atp_cashofficerdesig,atp_cashofficerotherdetails,atp_supportstaff1,
				atp_supportstaff2,atp_supportstaff3,atp_supportstaff4,atp_supportstaff5,atp_supportstaff6,atp_trtype)
				values('".$ids."','".$dat."','".$trname."','".$desig."','".$office."','Yes','','','','','','','',
				'','','1111-11-11','1111-11-11','1111-11-11','1111-11-11','1111-11-11',
				'1111-11-11','1111-11-11','1111-11-11','1111-11-11','1111-11-11','','','','','','','1111-11-11','','',
				'','','','','','','','','','','','','','','','','','','','','','')";
 						$rsinsert = mysqli_query($con,$sqlinsertatp);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							//echo "පුහුණු අවශ්‍යතාවය ඇතුලත් කිරීම සාර්ථකයි...නව පුහුණු අවශ්‍යතාවයක් ඇතුලත් කරන්න";
						}


	}
	else{//$numberofRowsatpchk!=""
		$sqlatpupdt="UPDATE  cp_atp SET atp_isinatp='Yes' WHERE atp_trReqID='$ids'";
		$rsatpupdt=mysqli_query($con,$sqlatpupdt);

	}
	
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
            <button class="tablinks" onClick="openCity(event, 'Paris')">පුහුණු සැලැස්ම සකස් කිරීම සඳහා අවශ්‍ය පුහුණ ඉල්ලීම් තෝරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 	<!--	<div id="London" class="tabcontent" style="display:block">
            <?Php require_once("adddesigsnations.php"); ?>
        </div>
      -->                
        <div id="Paris" class="tabcontent" style="display:block">
             <?Php require_once("atplist.php"); ?>
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