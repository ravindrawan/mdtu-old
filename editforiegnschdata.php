<?Php
	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_foreignschols where fs_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);


	$scf=$_FILES["scf"]["name"]; //User Photo
	if($scf!=""){
		$scf=$_FILES["scf"]["name"];
		$fileSize = $_FILES["scf"]["size"]/1024;
		$fileType = $_FILES["scf"]["type"];
		
		$oldstaffPhoto="foriegnschols/".$row["fs_file"];		
	}
	else{
		$newscf=$row["fs_file"];
		$fileSize ="";
		$fileType ="";
	}
	

	$scname=trim(htmlspecialchars($_POST["scname"]));
	$sccountry=trim(htmlspecialchars($_POST["sccountry"]));
	$cldate=trim(htmlspecialchars($_POST["cldate"]));
	$comnt=trim(htmlspecialchars($_POST["comnt"]));
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
        	<button class="tablinks" onclick="openCity(event, 'London')" >විදේශ ශිෂ්‍යත්ව වෙනස් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම කාර්යාල</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:18px;font-weight:700">
<?Php

					if($scf!=""){//if the photo is added
						if (($fileSize<512000)){
							$n=rand();
							if($row["fs_file"]!=""){
								unlink("$oldstaffPhoto");
							}

							$target="foriegnschols/"; //Remote folder. Photos are uploaded to this folder
							$path=$target.basename($scf); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['scf']['tmp_name'],$path); // Upload the photo
							$newscf=$n."_".$scf;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("foriegnschols/$scf","foriegnschols/$newscf");
							
						}
						else{ //invalied Photo
                        	echo "ප්‍රමිතියෙන් තොර ලිපිගොනුවකි! කරුණාකර <a href='viewforiegnschs.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
							die("Invalied File format");
						}
					}


				$sqlinsert = "update cp_foreignschols set fs_file='$newscf',fs_name='$scname',
				fs_country='$sccountry',fs_closingdate='$cldate',fs_comment='$comnt'
				 where fs_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "<br>විදේශ ශිෂ්‍යත්ව තොරතුරු වෙනස් කිරීම සාර්ථකයි...වෙනත් විදේශ ශිෂ්‍යත්වයක් වෙනස් කිරීම සඳහා <a href='viewforiegnschs.php'>මෙතනින්</a> යන්න<br>";
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