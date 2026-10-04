<?php
	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$msgdate=trim(htmlspecialchars($_POST["msgdate"]));
	$msg=trim(htmlspecialchars($_POST["msg"]));
	$msgstatus=trim(htmlspecialchars($_POST["msgstatus"]));

	
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
				$sqlinsert = "update cp_messeges set msg_date='$msgdate',msg_message='$msg',msg_status='$msgstatus' 
				where msg_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "නිවේදනය වෙනස් කිරීම සාර්ථකයි...වෙනත් නිවේදනයක් වෙනස් කිරීම සඳහා <a href='editviewmsgs.php'>මෙතනින්</a> යන්න";
						}
   
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