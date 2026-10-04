<?Php

	include "db.php"; // call the database connection

	$scf=$_FILES["scf"]["name"]; //User Photo
	if($scf!=""){
		$scf=$_FILES["scf"]["name"];
		$fileSize = $_FILES["scf"]["size"]/1024;
		$fileType = $_FILES["scf"]["type"];
	}
	else{
		$newscf="";
		$fileSize ="";
		$fileType ="";
	}

	$cname=trim(htmlspecialchars($_POST["cname"]));
	$cins=trim(htmlspecialchars($_POST["cins"]));
	$cldate=trim(htmlspecialchars($_POST["cldate"]));
	$fees=trim(htmlspecialchars($_POST["fees"]));
	
	$comnt=trim(htmlspecialchars($_POST["comnt"]));

//	$sql="SELECT * FROM cp_funds where fnd_name='$desig'";
//	$rs=mysqli_query($con,$sql);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addfooddata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">

        <?Php
			
					if($scf!=""){//if the photo is added
						if (($fileSize<512000)){
							$n=rand();
							$target="outsidetrainings/"; //Remote folder. Photos are uploaded to this folder
							$path=$target.basename($scf); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['scf']['tmp_name'],$path); // Upload the photo
							$newscf=$n."_".$scf;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("outsidetrainings/$scf","outsidetrainings/$newscf");
							
						}
						else{ //invalied Photo
                        	echo "ප්‍රමිතියෙන් තොර ලිපිගොනුවකි! කරුණාකර <a href='outsidetrns.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
							die("Invalied File format");
						}
					}

	
				$sqlinsert = "insert into cp_outsidetrcource (ot_file,ot_training,ot_institute,ot_closingdate,ot_fees,ot_comnt) 
							values ('".$newscf."','".$cname."','".$cins."','".$cldate."','".$fees."','".$comnt."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "බාහිර ආයතන මගින් පවත්වන පාඨමාලා ඇතුලත් කිරීම සාර්ථකයි...නව පාඨමාලාක් ඇතුලත් කිරීම සඳහා <a href='outsidetrns.php'>මෙතනින්</a> යන්න<br><br>
							";
						}
						
  
		?>    
    
    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  </table>
</form>
</body>
</html>