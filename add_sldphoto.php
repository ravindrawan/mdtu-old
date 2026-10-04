<?Php

	include "db.php"; // call the database connection

	$photo=$_FILES["photo"]["name"]; //User Photo
	if($photo!=""){
		$photo=$_FILES["photo"]["name"];
		$fileSize = $_FILES["photo"]["size"]/1024;
		$fileType = $_FILES["photo"]["type"];
	}
	else{
		$newphoto="";
		$fileSize ="";
		$fileType ="";
	}
	
	$photostatus=trim(htmlspecialchars($_POST["photostatus"]));

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
<form name="frm" method="post" enctype="multipart/form-data" action="addmsgdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">

        <?Php

					if($photo!=""){//if the photo is added
						if (($fileSize<1012000) && (($fileType=="image/jpeg") or ($fileType=="image/png"))){
							$n=rand();
							$target="slideshow/"; //Remote folder. Photos are uploaded to this folder
							$path=$target.basename($photo); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['photo']['tmp_name'],$path); // Upload the photo
							$newphoto=$n."_".$photo;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("slideshow/$photo","slideshow/$newphoto");
							
						}
						else{ //invalied Photo
                        	echo "ප්‍රමිතියෙන් තොර ඡායාරූපයකි! කරුණාකර <a href='slideshowimages.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
							die("Invalied File format or Exceed the file size");
						}
					}
		
			
				$sqlinsert = "insert into cp_slideshowimgs (slp_photo,slp_status) 
							values ('".$newphoto."','".$photostatus."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "ඡායාරූපය ඇතුලත් කිරීම සාර්ථකයි...නව ඡායාරූපයක් ඇතුලත් කිරීම සඳහා <a href='slideshowimages.php'>මෙතනින්</a> යන්න<br><br>
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