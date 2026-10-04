<?Php
	session_start(); //To use the SESSION variable

	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_staff where stf_ID='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);


	$photo=$_FILES["photo"]["name"]; //User Photo
	if($photo!=""){
		$photo=$_FILES["photo"]["name"];
		$fileSize = $_FILES["photo"]["size"]/1024;
		$fileType = $_FILES["photo"]["type"];
		
		$oldstaffPhoto="staff/".$row["stf_Photo"];		
	}
	else{
		$newphoto=$row["stf_Photo"];
		$fileSize ="";
		$fileType ="";
	}
	

	$nid=trim(htmlspecialchars($_POST["nid"]));
	$name=trim(htmlspecialchars($_POST["name"]));
	$dob=trim(htmlspecialchars($_POST["dob"]));
	$sex=trim(htmlspecialchars($_POST["sex"]));

	$desig=trim(htmlspecialchars($_POST["desig"]));
	$office=trim(htmlspecialchars($_POST["office"]));
	$suboff=trim(htmlspecialchars($_POST["suboff"]));

	$mobile=trim(htmlspecialchars($_POST["mobile"]));
	$officetele=trim(htmlspecialchars($_POST["officetele"]));
	$email=trim(htmlspecialchars($_POST["email"]));
	$desigtype=trim(htmlspecialchars($_POST["desigtype"]));
	$service=trim(htmlspecialchars($_POST["service"]));
	$class=trim(htmlspecialchars($_POST["class"]));
	$firstappdate=trim(htmlspecialchars($_POST["firstappdate"]));
	$cdesigdate=trim(htmlspecialchars($_POST["cdesigdate"]));
	$blacklisted=$row["stf_blacklisted"];
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
        	<button class="tablinks" onclick="openCity(event, 'London')" >කාර්යමණ්ඩල වෙනස් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම කාර්යාල</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:18px;font-weight:700">
<?Php

					if($photo!=""){//if the photo is added
						if (($fileSize<512000) && (($fileType=="image/jpeg") or ($fileType=="image/png") or ($fileType=="image/gif"))){
							if($row["stf_Photo"]!=""){
								unlink("$oldstaffPhoto");
							}

							$target="staff/"; //Remote folder. Photos are uploaded to this folder
							$path=$target.basename($photo); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['photo']['tmp_name'],$path); // Upload the photo
							$newphoto=$nid."_".$photo;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("staff/$photo","staff/$newphoto");
							
						}
						else{ //invalied Photo
                        	echo "ප්‍රමිතියෙන් තොර ඡායාරූපයකි! කරුණාකර <a href='staffs.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
							die("Invalied File format");
						}
					}



				$sqlinsert = "update cp_staff set stf_Photo='$newphoto',stf_Nid='$nid',
				stf_Name='$name',stf_dob='$dob',stf_sex='$sex',stf_desig='$desig',stf_office='$office',stf_suboff='$suboff'
				,stf_mobile='$mobile',stf_ofstele='$officetele',stf_email='$email',stf_desigtype='$desigtype'
				,stf_service='$service',stf_class='$class',stf_firstappdate='$firstappdate',stf_cdesigdate='$cdesigdate',
				stf_blacklisted='$blacklisted'
				 where stf_ID='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "<br>නිලධාරියාගේ තොරතුරු වෙනස් කිරීම සාර්ථකයි...වෙනත් නිලධාරියෙක් වෙනස් කිරීම සඳහා <a href='editviewstaff.php'>මෙතනින්</a> යන්න<br>";
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