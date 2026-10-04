<?Php

	include "db.php"; // call the database connection
		$logid=$_SESSION['logid'];
		$office=$_SESSION['offid'];
		$un=$_SESSION['un'];
		$pwd=$_SESSION['pwd'];
		$ut=$_SESSION['logtype'];
		$dat=date("Y-m-d");

	$desig=trim(htmlspecialchars($_POST["desig"]));
	$tr=trim(htmlspecialchars($_POST["tr"]));
	$othertr=trim(htmlspecialchars($_POST["othertr"]));
	
	if($tr==""){
		$tr=$othertr;	
	}
	
	$noemp=trim(htmlspecialchars($_POST["noemp"]));
	$comments=trim(htmlspecialchars($_POST["comments"]));
	$isadd="";

	$sql="SELECT * FROM cp_trrequirements where (req_adddate='$dat' AND req_post='$desig') AND 
	(req_addoffice='$office' AND req_training='$tr')";
	$rs=mysqli_query($con,$sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addtreqdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">
        <?Php
        	if(mysqli_num_rows($rs)<1){//if user not exists
			
				$sqlinsert = "insert into cp_trrequirements(req_adddate,req_addoffice,req_post,req_training,req_noofemps,
				req_comments,req_isadd)
				values('".$dat."','".$office."','".$desig."','".$tr."','".$noemp."','".$comments."','".$isadd."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "පුහුණු අවශ්‍යතාවය ඇතුලත් කිරීම සාර්ථකයි...නව පුහුණු අවශ්‍යතාවයක් ඇතුලත් කරන්න";
						}
			}
			else{
				echo "මෙම පුහුණු අවශ්‍යතාවය දැනටමත් ඇතුලත් කර ඇත...කරුණාකර වෙනත් පුහුණු අවශ්‍යතාවයක් ඇතුලත් කරන්න.";	
			}
   
		?>    
    
    </td>
  </tr>
  <tr>
    <td align="right">තනතුරු නාමය</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    
        	<select name="desig">
            	<option></option>
            <?Php
				$sqlr="SELECT * FROM cp_desigs order by des_name ASC";
				$rsr=mysqli_query($con,$sqlr);
				$numberofRowsr= mysqli_num_rows($rsr);
				if($numberofRowsr !=0){
					while($rowsr=mysqli_fetch_assoc($rsr)){
						?>
                        <option><?php echo $rowsr["des_name"]; ?></option>
                <?Php
					}
				}
			?>
            </select>
    </td>
  </tr>
  <tr>
    <td align="right">පුහුණු අවශ්‍යතාවය</td>
    <td align="center">&nbsp;</td>
    <td align="left">
        	<select name="tr">
            	<option></option>
            <?Php
				$sqlt="SELECT * FROM cp_trainings order by tr_name ASC";
				$rst=mysqli_query($con,$sqlt);
				$numberofRowst= mysqli_num_rows($rst);
				if($numberofRowst !=0){
					while($rowst=mysqli_fetch_assoc($rst)){
						?>
                        <option><?php echo $rowst["tr_name"]; ?></option>
                <?Php
					}
				}
			?>
            </select>    
    </td>
  </tr>
  <tr>
    <td align="right">වෙනත් පුහුණු අවශ්‍යතාවයක් නම් මෙහි සඳහන් කරන්න</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="othertr" size="50" /></td>
  </tr>
  <tr>
    <td align="right">ඉහත වැඩමුළුව අවශ්‍ය නිලධාරීන් ගණන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="noemp" id="text1" />
      <span class="textfieldInvalidFormatMsg">අවශ්‍ය නිලධාරීන් ගණන ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">වෙනත් කරුණු</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="comments"></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" ඇතුල් කරන්න " /></td>
  </tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {isRequired:false});
</script>
</body>
</html>