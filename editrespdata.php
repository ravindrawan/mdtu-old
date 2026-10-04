<?Php
	session_start(); //To use the SESSION variable

	include "db.php"; // call the database connection

	$did=$_GET["did"];

/*	$Sql="SELECT * FROM cp_resourcepersons where rp_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);
*/
	$nid=trim(htmlspecialchars($_POST["nid"]));
	$name=trim(htmlspecialchars($_POST["name"]));
	$dob=trim(htmlspecialchars($_POST["dob"]));
	$sex=trim(htmlspecialchars($_POST["sex"]));

	$desig=trim(htmlspecialchars($_POST["desig"]));
	$office=trim(htmlspecialchars($_POST["office"]));
	$mobile=trim(htmlspecialchars($_POST["mobile"]));
	$officetele=trim(htmlspecialchars($_POST["officetele"]));
	$hometele=trim(htmlspecialchars($_POST["hometele"]));

	$email=trim(htmlspecialchars($_POST["email"]));
	$phd=trim(htmlspecialchars($_POST["phd"]));
	$msc=trim(htmlspecialchars($_POST["msc"]));
	$degree=trim(htmlspecialchars($_POST["degree"]));
	$al=trim(htmlspecialchars($_POST["al"]));
	$prof=trim(htmlspecialchars($_POST["prof"]));

	$expe=trim(htmlspecialchars($_POST["expe"]));

	$trfield1=trim(htmlspecialchars($_POST["trfield1"]));
	$trfield2=trim(htmlspecialchars($_POST["trfield2"]));
	$trfield3=trim(htmlspecialchars($_POST["trfield3"]));
	$trfield4=trim(htmlspecialchars($_POST["trfield4"]));
	$trfield5=trim(htmlspecialchars($_POST["trfield5"]));
	
	$sql="SELECT * FROM cp_resourcepersons where rp_nid='$nid'";
	$rs=mysqli_query($con,$sql);


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
        	<button class="tablinks" onclick="openCity(event, 'London')" >සම්පත්දායකයින් වෙනස් කරන්න</button>
         <!--   <button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම සම්පත්දායකයින්</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block">
            <?Php 
			
        	if(mysqli_num_rows($rs)<1){//if user not exists
			
			$sqlinsert = "update cp_resourcepersons set rp_nid='$nid',
						rp_name='$name',rp_dob='$dob',
						rp_gender='$sex',rp_desig='$desig',
						rp_office='$office',rp_mobile='$mobile',
						rp_offtele='$officetele',rp_hometele='$hometele',
						rp_email='$email',rp_phd='$phd',
						rp_msc='$msc',rp_degree='$degree',
						rp_al='$al',rp_profq='$prof',
						rpexp='$expe',rp_fld1='$trfield1',
						rp_fld2='$trfield2',rp_fld3='$trfield3',
						rp_fld4='$trfield4',rp_fld5='$trfield5' where rp_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "සම්පත්දායකයන් වෙනස් කිරීම සාර්ථකයි...නව සම්පත්දායකයෙක් වෙසන් කිරීම සඳහා <a href='resourcepersonsview.php'>මෙතනින්</a> යන්න";
						}
			}
			else{
				echo "මෙම ජාතික හැඳුනුම්පත් අංකය හිමි සම්පත්දායකයා දැනටමත් ඇතුලත් කර ඇත...කරුණාකර වෙනත් ජාතික හැඳුනුම්පත් අංකයක් ඇතුලත් කරන්න.";	
			}
   
			
			 ?>
        </div>
                      
    <!--    <div id="Paris" class="tabcontent" style="display:none">
        
                        <div align="center">
							<?Php require_once("srch_resperson.php"); ?>
                    	</div>
						<div>
							<?Php require_once("respersonlist.php"); ?>
                        </div>
        
             <?Php //require_once("respersonlist.php"); ?>
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