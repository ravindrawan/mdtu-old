<?Php

	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection
		$trid=$_GET["did"];
	
		$trname=trim(htmlspecialchars($_POST["trname"]));
		$nid=trim(htmlspecialchars($_POST["nid"]));
		$applieddate=date("Y-m-d");
		
		$offs=trim(htmlspecialchars($_POST["office"]));
		
		$trsdate=trim(htmlspecialchars($_POST["trsdate"]));
		$isrelevant=trim(htmlspecialchars($_POST["RadioGroup1"]));
		
		$priority=trim(htmlspecialchars($_POST["priority"]));
		$accomodation=trim(htmlspecialchars($_POST["RadioGroup2"]));
		//$diet=trim(htmlspecialchars($_POST["diet"]));
		$diet="";
		$isselected="";
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
        	<button class="tablinks" onclick="openCity(event, 'London')" >පුහුණු වැඩ සටහන් සඳහා අයදුම් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම පුහුණු අවශ්‍යතා</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:18px" align="center">

		<?Php
			$sql="SELECT * FROM cp_trainingapplications where (tapp_atpid='$trid' AND tapp_trname='$trname') AND 
			(tapp_officerNid='$nid' AND tapp_trstartdate='$trsdate')";
			$rs=mysqli_query($con,$sql);
			$numberofRows= mysqli_num_rows($rs);
			if($numberofRows>=1){
				echo "<br>මෙම නිලධාරියා විසින් මෙම පුහුණු වැඩ සටහන සඳහා දැනටමත් අයදුම්පත්‍රයක් ඉදිරිපත් කර ඇත.<br> කරුණාකර වෙනත් නිලධාරියෙකු සඳහා අයදුම්පත්‍රය යොමු කරන්න<br><br>";
		//		echo $_SESSION['logtype'];
      
				if($_SESSION['logtype']=="Administrator" || $_SESSION['logtype']=="Super User"){
				?>
    				<a href="control.php">පාලන පුවරුව</a>
   				 <?Php
				}
				else{
				?>
				<a href="usercontrolpanel.php">පාලන පුවරුව</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="applytrs.php">වෙනත් අයදුම් කිරීමක් සඳහා යොමු වන්න</a>
				<?Php
				}

			}//check the duplicate applications
			else{

			$sqlpchk="SELECT * FROM cp_trainingapplications where (tapp_office='$offs' AND tapp_trname='$trname') AND 
			(tapp_trstartdate='$trsdate' AND tapp_priority='$priority')";
			$rspchk=mysqli_query($con,$sqlpchk);
			$pcheckrws= mysqli_num_rows($rspchk);
			if($pcheckrws>=1){//check the duplicate priority
				echo "<br>ඔබ කාර්යාලය මගින් මෙම ප්‍රමුඛතාවය යටතේ මෙම පුහුණු වැඩ සටහන සඳහා දැනටමත් නිලධාරියෙකු ඇතුලත් කර ඇත.
				<br> කරුණාකර වෙනත් ප්‍රමුඛතා අංකයක් යටතේ අයදුම් කරන්න
				<br><br>";
				
				if($_SESSION['logtype']=="Administrator" || $_SESSION['logtype']=="Super User"){
				?>
    				<a href="control.php">පාලන පුවරුව</a>
   				 <?Php
				}
				else{
				?>
				<a href="usercontrolpanel.php">පාලන පුවරුව</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="applytrs.php">වෙනත් අයදුම් කිරීමක් සඳහා යොමු වන්න</a>
				<?Php
				}
				
			}
			else{

			$sqlinsert = "insert into cp_trainingapplications(tapp_officerNid,tapp_office,tapp_atpid,tapp_trname,tapp_applieddate,
						tapp_trstartdate,tapp_isrelevent,tapp_priority,tapp_accomodation,
						tapp_diet,tapp_isselected)
				values('".$nid."','".$offs."','".$trid."','".$trname."','".$applieddate."',
				'".$trsdate."','".$isrelevant."','".$priority."','".$accomodation."'
				,'".$diet."','".$isselected."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "ඔබගේ අයදුම්පත්‍රය ඇතුලත් කිරීම සාර්ථකයි !<br><br>";
	
				if($_SESSION['logtype']=="Administrator" || $_SESSION['logtype']=="Super User"){
				?>
    				<a href="control.php">පාලන පුවරුව</a>
   				 <?Php
				}
				else{
				?>
				<a href="usercontrolpanel.php">පාලන පුවරුව</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="applytrs.php">වෙනත් අයදුම් කිරීමක් සඳහා යොමු වන්න</a>
				<?Php
				}
						}
			}//check the duplicate priority
				
			}//check the duplicate applications
		
		
		?>

        </div>
                      
     <!--   <div id="Paris" class="tabcontent" style="display:none">
             <?Php require_once("treqlist.php"); ?>
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