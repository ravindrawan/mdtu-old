<?Php
	include "db.php"; // call the database connection
	$atpid=$_GET["atpid"];
		$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];
	$td=date("Y-m-d");

	$sqlw="SELECT * FROM cp_trainingapplications where tapp_trstartdate>'$td' order by tapp_applieddate ASC";
	$rsw=mysqli_query($con,$sqlw);
			while($rowsw=mysqli_fetch_assoc($rsw)){
				$sqlu="UPDATE  cp_trainingapplications SET tapp_isselected='' where tapp_trstartdate>'$td' AND tapp_atpid='$atpid'";
				$rsu=mysqli_query($con,$sqlu);
				
			}

if(!$_POST['addtr']){
	?>
	<meta http-equiv="refresh" content="0; url=trapplications.php" />  
	<?Php
    	 die("File not found");	

}
else{
	//when checkbox not selected clear the atp
		$sqlatpset="UPDATE  cp_trainingapplications SET tapp_isselected='' WHERE atp_requestDate>'$d' AND tapp_atpid='$atpid'";
		$rsatpset=mysqli_query($con,$sqlatpset);

foreach($_POST['addtr'] as $value)
{
	//echo 'Checked: '.$value.''.'<br>';
	$treqs=explode('~',$value);
	$vals=$treqs[0];
	$ids = $treqs[1];
	
//	echo $vals." - ";

//get the training start date from atp table
	$sqlatp="SELECT * FROM cp_atp where atp_id='$atpid' order by atp_requestDate ASC";
	$rsatp=mysqli_query($con,$sqlatp);
	$rowatpd=mysqli_fetch_assoc($rsatp);
	$trsdate=$rowatpd["atp_day1"];

	
	$sql="UPDATE  cp_trainingapplications SET tapp_trstartdate='$trsdate',tapp_isselected='$vals' WHERE tapp_id='$ids'";
	$rs=mysqli_query($con,$sql);
	
	$sqlatpchk="SELECT * FROM cp_atp where atp_requestDate>'$d' AND atp_trReqID='$ids' order by atp_requestDate ASC";
	$rsatpchk=mysqli_query($con,$sqlatpchk);
	$numberofRowsatpchk= mysqli_num_rows($rsatpchk);
	

	
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
            <button class="tablinks" onClick="openCity(event, 'Paris')">ඉදිරිපත් කර ඇති අයදුම්පත්‍ර</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 	<!--	<div id="London" class="tabcontent" style="display:block">
            <?Php require_once("adddesigsnations.php"); ?>
        </div>
      -->                
        <div id="Paris" class="tabcontent" style="display:block">
                         <div align="center">
							<?Php require_once("srch_trapplications.php"); ?>
                    	</div>
						<div>
             			<?Php require_once("trappslist.php"); ?>
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