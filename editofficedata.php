<?Php
	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$offname=trim(htmlspecialchars($_POST["offname"]));
	$desig=trim(htmlspecialchars($_POST["desig"]));
	$addr=trim(htmlspecialchars($_POST["addr"]));
	$tele=trim(htmlspecialchars($_POST["tele"]));
	$tele2=trim(htmlspecialchars($_POST["tele2"]));

	$fx=trim(htmlspecialchars($_POST["fx"]));
	$email=trim(htmlspecialchars($_POST["email"]));
	
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
        	<button class="tablinks" onclick="openCity(event, 'London')" >කාර්යාල වෙනස් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම කාර්යාල</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:18px;font-weight:700">
<?Php
				$sqlinsert = "update offices set of_name='$offname',of_headdesig='$desig',
				of_addr='$addr',of_tele='$tele',of_tele2='$tele2',of_fax='$fx',of_email='$email' where of_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "<br>කාර්යාලය වෙනස් කිරීම සාර්ථකයි...වෙනත් කාර්යාලයක් වෙනස් කිරීම සඳහා <a href='editviewoffice.php'>මෙතනින්</a> යන්න<br>";
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