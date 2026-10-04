<?Php

	include "db.php"; // call the database connection

	$nid=trim(htmlspecialchars($_POST["nid"]));
	$schname=trim(htmlspecialchars($_POST["schname"]));
	$schcountry=trim(htmlspecialchars($_POST["schcountry"]));
	$appdate=trim(htmlspecialchars($_POST["depdate"]));
	$startdate=trim(htmlspecialchars($_POST["arrdate"]));

	$duration=trim(htmlspecialchars($_POST["duration"]));
	$comnt=trim(htmlspecialchars($_POST["comnt"]));

	$sqls="SELECT * FROM cp_staff where stf_Nid='$nid'";
	$rss=mysqli_query($con,$sqls);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>

<title>Untitled Document</title>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addofficeData.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">
        <?Php
			if(mysqli_num_rows($rss)<1){
				echo $nid." ජාතික හැඳුනුම්පත් අංකය දරණ නිලධාරියාගේ තොරතුරු පද්ධතියට ඇත්ලත් කර නොමැත.<br> එම තොරතුරු ඇතුලත් කිරීම අවශ්‍ය නම් කරුණාකර අදාල කාර්යාලයේ පුහුණු විෂය භාර නිලධාරියා දැනුවත් කරන්න<br><br>
	නව තොරතුරු ඇතුලත් කිරීම සඳහා <a href='fscholapplyemp.php'>මෙතනින්</a> යන්න		";
			}
			else{
				$sqlinsert = "insert into cp_appliedforiegnscholars(apsch_nid,apsch_applydate,apsch_name,apsch_country,
				 apsch_depaturedate,apsch_duration,apsch_comment)
				values('".$nid."','".$appdate."','".$schname."','".$schcountry."','".$startdate."',
				'".$duration."','".$comnt."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "විදේශ ශිෂ්‍යත්ව සඳහා සහභාගීවූවන් ඇතුලත් කිරීම සාර්ථකයි...නව තොරතුරු ඇතුලත් කිරීම සඳහා <a href='fscholapplyemp.php'>මෙතනින්</a> යන්න";
						}
			}
   
		?>    
    
    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
    </tr>
</table>
</form>
</body>
</html>