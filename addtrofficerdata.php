<?Php

	include "db.php"; // call the database connection
	$nid=trim(htmlspecialchars($_POST["nid"]));


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
        	<button class="tablinks" onclick="openCity(event, 'London')" >පුහුණු විෂය භාර නිලධාරියා ඇතුලත් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:20px" align="center">
            <?Php 
			$sql="SELECT * FROM cp_staff where stf_Nid='$nid'";
			$rs=mysqli_query($con,$sql);
			$rows=mysqli_fetch_assoc($rs);
        	if(mysqli_num_rows($rs)<1){//if user not exists
				echo "<br><br>මෙම ජාතික හැඳුනුම්පත් අංකය හිමි නිලධාරියාගේ තොරතුරු පද්ධතියට ඇතුලත් කර නොමැත.<br>
				කරැණාකර නැවත උතසහ කරන්න
				<br><br>";
			}
			else{

		$off=$_SESSION['offid'];
		$logtype=$_SESSION['logtype'];
				
			$sqlt="SELECT * FROM cp_trainingofficers where tro_office='$off'";
			$rst=mysqli_query($con,$sqlt);
			if(mysqli_num_rows($rst)>=2){
				echo $off." කාර්යාලය සඳහා දැනටම පුහුණු විෂය භාර නිලධාරීන් දෙදෙනෙකු ඇතුලත් කර ඇත.<br>
				එක් කාර්යාලයක් සඳහා ඇතලත් කල හැක්කේ පුහුණු විෂය භාර නිලධාරීන් දෙදෙනෙකු පමණි";
			}
			else{
				
				$name=$rows["stf_Name"];
				$desig=$rows["stf_desig"];
				$office=$rows["stf_office"];
				$mobile=$rows["stf_mobile"];
				$email=$rows["stf_email"];

				$sqlinsert = "insert into 
				cp_trainingofficers(tro_nid,tro_name,tro_desig,tro_office,tro_mobile,tro_email)
				values('".$nid."','".$name."','".$desig."','".$office."','".$mobile."','".$email."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "පුහුණු විෂය භාර නිලධාරියා ඇතුලත් කිරීම සාර්ථකයි<br><br>
							<a href='usercontrolpanel.php'>පාලන පුවරුව</a>";
						}				
			}
			}
			 ?>
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