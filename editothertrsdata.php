<?Php
	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$offname=trim(htmlspecialchars($_POST["offname"]));
	$trname=trim(htmlspecialchars($_POST["trname"]));
	$trsdate=trim(htmlspecialchars($_POST["trsdate"]));
	$noofdays=trim(htmlspecialchars($_POST["noofdays"]));
	$amnt=trim(htmlspecialchars($_POST["amnt"]));

	$other=trim(htmlspecialchars($_POST["other"]));
	
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
    <td width="80%" valign="top" align="center">
        <div class="tab">
        	<button class="tablinks" onclick="openCity(event, 'London')" >වෙනත් කාර්යාල/දෙපාර්තමේන්තු මගින් පැවැත්වූ පුහුණ වැඩ සටහන් වෙනස් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම කාර්යාල</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:18px;font-weight:700">
<?Php
				$sqlinsert = "update cp_othertrns set otr_office='$offname',otr_trns='$trname',
				otr_sdate='$trsdate',otr_nooftrns='$noofdays',otr_amount='$amnt',otr_comments='$other' where otr_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "<br>වෙනත් කාර්යාල මගින් පැවැත්වූ පුහුණු වෙනස් කිරීම සාර්ථකයි...වෙනත් පුහුණු වැඩ සටහනක් වෙනස් කිරීම සඳහා <a href='viewothertrns.php'>මෙතනින්</a> යන්න<br>";
						}

?>

        </div>
                      
     <!--   <div id="Paris" class="tabcontent" style="display:none">
             <?Php require_once("officelist.php"); ?>
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