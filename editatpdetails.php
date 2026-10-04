<?php
	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection
	$did=$_GET["did"];
	$trname=trim(htmlspecialchars($_POST["trname"]));

	$fileno=trim(htmlspecialchars($_POST["fileno"]));
	$subjno=trim(htmlspecialchars($_POST["subjno"]));
	$purpose=trim(htmlspecialchars($_POST["purpose"]));
	$content=trim(htmlspecialchars($_POST["content"]));
	$targetg=trim(htmlspecialchars($_POST["targetg"]));
	$nooftrs=trim(htmlspecialchars($_POST["nooftrs"]));
	$noofdays=trim(htmlspecialchars($_POST["noofdays"]));
	$noofparticipants=trim(htmlspecialchars($_POST["noofparticipants"]));
	$trlocation=trim(htmlspecialchars($_POST["trlocation"]));
	$fsource=trim(htmlspecialchars($_POST["fsource"]));
	$budj=trim(htmlspecialchars($_POST["budj"]));

	$day1=trim(htmlspecialchars($_POST["day1"]));
	if($day1==""){$day1="1111-11-11";}
	$day2=trim(htmlspecialchars($_POST["day2"]));
	if($day2==""){$day2="1111-11-11";}
	$day3=trim(htmlspecialchars($_POST["day3"]));
	if($day3==""){$day3="1111-11-11";}
	$day4=trim(htmlspecialchars($_POST["day4"]));
	if($day4==""){$day4="1111-11-11";}
	$day5=trim(htmlspecialchars($_POST["day5"]));
	if($day5==""){$day5="1111-11-11";}
	$day6=trim(htmlspecialchars($_POST["day6"]));
	if($day6==""){$day6="1111-11-11";}
	$day7=trim(htmlspecialchars($_POST["day7"]));
	if($day7==""){$day7="1111-11-11";}
	$day8=trim(htmlspecialchars($_POST["day8"]));
	if($day8==""){$day8="1111-11-11";}
	$day9=trim(htmlspecialchars($_POST["day9"]));
	if($day9==""){$day9="1111-11-11";}
	$day10=trim(htmlspecialchars($_POST["day10"]));
	if($day10==""){$day10="1111-11-11";}

	$stime=trim(htmlspecialchars($_POST["stime"]));
	$etime=trim(htmlspecialchars($_POST["etime"]));
	$addatp=trim(htmlspecialchars($_POST["addatp"]));
	$addhome=trim(htmlspecialchars($_POST["addhome"]));
	$appclaseday=trim(htmlspecialchars($_POST["appclaseday"]));
	if($appclaseday==""){$appclaseday="1111-11-11";}
	
	$otherfacts=trim(htmlspecialchars($_POST["otherfacts"]));
	$specialfacts=trim(htmlspecialchars($_POST["specialfacts"]));
	$showspecialfacts=trim(htmlspecialchars($_POST["showspecialfacts"]));
	$addspecialtoltr=trim(htmlspecialchars($_POST["addspecialtoltr"]));
	$rp1=trim(htmlspecialchars($_POST["rp1"]));
	$rp2=trim(htmlspecialchars($_POST["rp2"]));
	$rp3=trim(htmlspecialchars($_POST["rp3"]));
	$rp4=trim(htmlspecialchars($_POST["rp4"]));
	$rp5=trim(htmlspecialchars($_POST["rp5"]));
	$rp6=trim(htmlspecialchars($_POST["rp6"]));
	$rp7=trim(htmlspecialchars($_POST["rp7"]));
	$rp8=trim(htmlspecialchars($_POST["rp8"]));
	$rp9=trim(htmlspecialchars($_POST["rp9"]));
	$rp10=trim(htmlspecialchars($_POST["rp10"]));

	$ssnid1=trim(htmlspecialchars($_POST["ssnid1"]));
	$ssnid2=trim(htmlspecialchars($_POST["ssnid2"]));
	$ssnid3=trim(htmlspecialchars($_POST["ssnid3"]));
	$ssnid4=trim(htmlspecialchars($_POST["ssnid4"]));
	$ssnid5=trim(htmlspecialchars($_POST["ssnid5"]));
	$ssnid6=trim(htmlspecialchars($_POST["ssnid6"]));

	$cashoff=trim(htmlspecialchars($_POST["cashoff"]));
	$cashoffdesig=trim(htmlspecialchars($_POST["cashoffdesig"]));
	$cashoffdetails=trim(htmlspecialchars($_POST["cashoffdetails"]));

	$trtype=trim(htmlspecialchars($_POST["trtype"]));

	$Sql="SELECT * FROM cp_atp WHERE atp_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);
	
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
    <td width="80%" valign="top" align="center" style="font-size:20px;font-weight:700">
    <br /><br />
      <?Php
		//	if(mysqli_num_rows($rs)<1){
				$sqlinsert = "update cp_atp set
					  atp_trname='$trname', 
					  atp_fileno='$fileno',
					  atp_subjctno='$subjno',
					  atp_purpose='$purpose',
					  atp_content='$content',
					  atp_targetgroup='$targetg',
					  atp_nooftrainings='$nooftrs',
					  atp_noofdays='$noofdays',
					  atp_noofparticipants='$noofparticipants',
					  atp_location='$trlocation',
					  atp_day1='$day1',
					  atp_day2='$day2',
					  atp_day3='$day3',
					  atp_day4='$day4',
					  atp_day5='$day5',
					  atp_day6='$day6',
					  atp_day7='$day7',
					  atp_day8='$day8',
					  atp_day9='$day9',
					  atp_day10='$day10',
					  atp_stime='$stime',
					  atp_etime='$etime',
					  atp_fundsource='$fsource',
					  atp_bdjet='$budj',

					  atp_isaddatp='$addatp',
					  atp_addhome='$addhome',
					  atp_lastdateapply='$appclaseday',
					  atp_otherfacts='$otherfacts',
					  atp_specialfacts='$specialfacts',
					  atp_showspecialfacts='$showspecialfacts',
					  atp_specialfinletter='$addspecialtoltr',
					  atp_resourcep1='$rp1',
					  atp_resourcep2='$rp2',
					  atp_resourcep3='$rp3',
					  atp_resourcep4='$rp4',
					  atp_resourcep5='$rp5',
					  atp_resourcep6='$rp6',
					  atp_resourcep7='$rp7',
					  atp_resourcep8='$rp8',
					  atp_resourcep9='$rp9',
					  atp_resourcep10='$rp10',
					  atp_cashofficername='$cashoff',
					  atp_cashofficerdesig='$cashoffdesig',
					  atp_cashofficerotherdetails='$cashoffdetails',
					  atp_supportstaff1='$ssnid1',
					  atp_supportstaff2='$ssnid2',
					  atp_supportstaff3='$ssnid3',
					  atp_supportstaff4='$ssnid4',
					  atp_supportstaff5='$ssnid5',
					  atp_supportstaff6='$ssnid6',
					  atp_trtype='$trtype'				
				 where atp_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "පුහුණු සැලැස්ම වෙනස් කිරීම සාර්ථකයි...වෙනත් පුහුණු වැඩසටහනක් වෙනස් කිරීම සඳහා <a href='editatp.php'>මෙතනින්</a> යන්න";
						}
	/*		}
			else{
							echo "පුහුණු සැලැස්ම වෙනස් කිරීමේදී දෝෂයක් ඇත...කරුණාකර නැවත උත්සහ කිරීම සඳහා <a href='editatp.php'>මෙතනින්</a> යන්න";
				
				
			}
   */
		?>    
    
    
     <!--   <div class="tab">
        	<button class="tablinks" onclick="openCity(event, 'London')" >තනතුරු වෙනස් කරන්න</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම තනතුරු</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block">
            <?Php require_once("editdesignations.php"); ?>
        </div>
               
        <div id="Paris" class="tabcontent" style="display:none">
             <?Php require_once("desiglist.php"); ?>
        </div>
   	-->
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