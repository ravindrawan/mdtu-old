<?Php
	session_start(); //To use the SESSION variable

	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_outsidetrcource where ot_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);


	$scf=$_FILES["scf"]["name"]; //User Photo
	if($scf!=""){
		$scf=$_FILES["scf"]["name"];
		$fileSize = $_FILES["scf"]["size"]/1024;
		$fileType = $_FILES["scf"]["type"];
		
		$oldstaffPhoto="outsidetrainings/".$row["ot_file"];		
	}
	else{
		$newscf=$row["ot_file"];
		$fileSize ="";
		$fileType ="";
	}
	

	$cname=trim(htmlspecialchars($_POST["cname"]));
	$cins=trim(htmlspecialchars($_POST["cins"]));
	$cldate=trim(htmlspecialchars($_POST["cldate"]));
	$fees=trim(htmlspecialchars($_POST["fees"]));
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
        	<button class="tablinks" onclick="openCity(event, 'London')" >බාහිර ආයතන මගින් පවත්වන පාඨමාලා වෙනස් කරන්න</button>
            <!--<button class="tablinks" onclick="openCity(event, 'Paris')">සියළුම කාර්යාල</button>
            <button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block;font-size:18px;font-weight:700">
<?Php

					if($scf!=""){//if the photo is added
						if (($fileSize<512000)){
							$n=rand();
							if($row["ot_file"]!=""){
								unlink("$oldstaffPhoto");
							}

							$target="outsidetrainings/"; //Remote folder. Photos are uploaded to this folder
							$path=$target.basename($scf); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['scf']['tmp_name'],$path); // Upload the photo
							$newscf=$n."_".$scf;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("outsidetrainings/$scf","outsidetrainings/$newscf");
							
						}
						else{ //invalied Photo
                        	echo "ප්‍රමිතියෙන් තොර ලිපිගොනුවකි! කරුණාකර <a href='viewouttrns.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
							die("Invalied File format");
						}
					}

				$sqlinsert = "update cp_outsidetrcource set ot_file='$newscf',ot_training='$cname',
				ot_institute='$cins',ot_closingdate='$cldate',ot_fees='$fees',ot_comnt='$comnt'
				 where ot_id='$did'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "<br>බාහිර ආයතන මගින් පවත්වන පාඨමාලා තොරතුරු වෙනස් කිරීම සාර්ථකයි...වෙනත් පාඨමාලාවක් වෙනස් කිරීම සඳහා <a href='viewouttrns.php'>මෙතනින්</a> යන්න<br>";
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