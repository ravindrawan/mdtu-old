<?Php

	include "db.php"; // call the database connection

	$dwndate=trim(htmlspecialchars($_POST["dwndate"]));
	$dwntype=trim(htmlspecialchars($_POST["dwntype"]));
	$name=trim(htmlspecialchars($_POST["name"]));
	$trname=trim(htmlspecialchars($_POST["trname"]));

	$dwnfile=$_FILES["dwnfile"]["name"]; //User Photo
	if($dwnfile!=""){
		$dwnfile=$_FILES["dwnfile"]["name"];
		$fileSize = $_FILES["dwnfile"]["size"]/1024;
		$fileType = $_FILES["dwnfile"]["type"];
	}
	else{
		$newdwnfile="";
		$fileSize ="";
		$fileType ="";
	}

	$dwnfile2=$_FILES["dwnfile2"]["name"]; //User Photo
	if($dwnfile2!=""){
		$dwnfile2=$_FILES["dwnfile2"]["name"];
		$fileSize2 = $_FILES["dwnfile2"]["size"]/1024;
		$fileType2 = $_FILES["dwnfile2"]["type"];
	}
	else{
		$newdwnfile2="";
		$fileSize2 ="";
		$fileType2 ="";
	}

	$dwnfile3=$_FILES["dwnfile3"]["name"]; //User Photo
	if($dwnfile3!=""){
		$dwnfile3=$_FILES["dwnfile3"]["name"];
		$fileSize3 = $_FILES["dwnfile3"]["size"]/1024;
		$fileType3 = $_FILES["dwnfile3"]["type"];
	}
	else{
		$newdwnfile3="";
		$fileSize3 ="";
		$fileType3 ="";
	}

	$dwnfile4=$_FILES["dwnfile4"]["name"]; //User Photo
	if($dwnfile4!=""){
		$dwnfile4=$_FILES["dwnfile4"]["name"];
		$fileSize4 = $_FILES["dwnfile4"]["size"]/1024;
		$fileType4 = $_FILES["dwnfile4"]["type"];
	}
	else{
		$newdwnfile4="";
		$fileSize4 ="";
		$fileType4 ="";
	}
	
	$dwndes=trim(htmlspecialchars($_POST["dwndes"]));

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
		//set the file's destination
			$target="uploads/";

					if($dwnfile!=""){//if the file is added
						//if (($fileSize<90000000000)){ //file size <5MB
							$n=rand();
							//$target="slideshow/"; //Remote folder. Photos are uploaded to this folder
							$path=$target.basename($dwnfile); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['dwnfile']['tmp_name'],$path); // Upload the photo
							$newdwnfile=$n."_".$dwnfile;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("$target/$dwnfile","$target/$newdwnfile");
							
					//	}
					//	else{ //invalied Photo
                 //       	echo "ගොනුවේ විශාලත්වය වැඩිය! කරුණාකර 5MB ට අඩු ගොනුවක් තේරීම සඳහා <a href='downloads.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
					//		die("Exceed the file size");
				//		}
				
					}

					if($dwnfile2!=""){
						//if (($fileSize2<90000000000)){ //file size <5MB
							$n2=rand();
							//$target="slideshow/"; //Remote folder. Photos are uploaded to this folder
							$path2=$target.basename($dwnfile2); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['dwnfile2']['tmp_name'],$path2); // Upload the photo
							$newdwnfile2=$n2."_".$dwnfile2;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("$target/$dwnfile2","$target/$newdwnfile2");
							
						}
				//		else{ //invalied Photo
           //             	echo "ගොනුවේ විශාලත්වය වැඩිය! කරුණාකර 5MB ට අඩු ගොනුවක් තේරීම සඳහා <a href='downloads.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
			//				die("Exceed the file size");
		//				}
		
				if($dwnfile3!=""){

			//			if (($fileSize3<90000000000)){ //file size <5MB
							$n3=rand();
							//$target="slideshow/"; //Remote folder. Photos are uploaded to this folder
							$path3=$target.basename($dwnfile3); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['dwnfile3']['tmp_name'],$path3); // Upload the photo
							$newdwnfile3=$n3."_".$dwnfile3;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("$target/$dwnfile3","$target/$newdwnfile3");
							
						}
				//		else{ //invalied Photo
                    //    	echo "ගොනුවේ විශාලත්වය වැඩිය! කරුණාකර 5MB ට අඩු ගොනුවක් තේරීම සඳහා <a href='downloads.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
					//		die("Exceed the file size");
				//		}


					if($dwnfile4!=""){
				//		if (($fileSize4<90000000000)){ //file size <5MB
							$n4=rand();
							//$target="slideshow/"; //Remote folder. Photos are uploaded to this folder
							$path4=$target.basename($dwnfile4); // set the photo path
							//$rno=rand();//Genarate the random number to change the photo name
							move_uploaded_file($_FILES['dwnfile4']['tmp_name'],$path4); // Upload the photo
							$newdwnfile4=$n4."_".$dwnfile4;//Change the name of the photo with the random number. This will avoid the Overwritings.
						
							//Rename the uploaded photo with the new name (with the random number)
							rename("$target/$dwnfile4","$target/$newdwnfile4");
							
						}
					//	else{ //invalied Photo
                   //     	echo "ගොනුවේ විශාලත්වය වැඩිය! කරුණාකර 5MB ට අඩු ගොනුවක් තේරීම සඳහා <a href='downloads.php'>මෙතනින්</a>නැවත උත්සහ කරන්න...<br>";
				//			die("Exceed the file size");
					//	}
		
				$sqlinsert = "insert into cp_downloads (dwn_date,dwn_name,dwn_training,dwn_file,
				dwn_file2,dwn_file3,dwn_file4,dwn_des,dwn_type) 
							values ('".$dwndate."','".$name."','".$trname."','".$newdwnfile."'
							,'".$newdwnfile2."','".$newdwnfile3."','".$newdwnfile4."','".$dwndes."','".$dwntype."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "ගොනුව ඇතුලත් කිරීම සාර්ථකයි...නව ගොනුවක් ඇතුලත් කිරීම සඳහා <a href='downloads.php'>මෙතනින්</a> යන්න<br><br>
							";
						}
			//		}
			//		else{
			//			echo "ගොනුවක් තෝරාගෙන නැත. කරුණාකර නැවත උත්සහ කිරීම සඳහා <a href='downloads.php'>මෙතනින්</a> යන්න";	
			//		}
  
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