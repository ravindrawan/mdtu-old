<?Php
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_trrequirements WHERE req_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);

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
<form name="frm" method="post" enctype="multipart/form-data" action="edittrreqdata.php?did=<?Php echo $did; ?>">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">පුහුණු අවශ්‍යතාවය වෙනස් කරන්න</td>
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
                        <option <?Php if($row["req_post"]==$rowsr["des_name"]) { ?> selected="selected" <?Php } ?>><?php echo $rowsr["des_name"]; ?></option>
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
                        <option <?Php if($row["req_training"]==$rowst["tr_name"]) { ?> selected="selected" <?Php } ?>>
						<?php echo $rowst["tr_name"]; ?></option>
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
    <td align="left">
                <?Php
				$sqlt="SELECT * FROM cp_trainings order by tr_name ASC";
				$rst=mysqli_query($con,$sqlt);
				$numberofRowst= mysqli_num_rows($rst);
				$othertr="";
				if($numberofRowst !=0){
					while($rowst=mysqli_fetch_assoc($rst)){
						 if($row["req_training"]==$rowst["tr_name"]) { 
						 	$othertr="";
							break;
						 }
						 else{
							 $othertr=$row["req_training"];
						 }
					}
				}
					
				?>

    <input type="text" name="othertr" size="50" value="<?Php echo $othertr; ?>" /></td>
  </tr>
  <tr>
    <td align="right">ඉහත වැඩමුළුව අවශ්‍ය නිලධාරීන් ගණන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="noemp" id="text1"  value="<?Php echo $row["req_noofemps"]; ?>" />
      <span class="textfieldInvalidFormatMsg">අවශ්‍ය නිලධාරීන් ගණන ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">වෙනත් කරුණු</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="comments"><?Php echo $row["req_comments"]; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" වෙනස් කරන්න " /></td>
    </tr>
</table>
</form>
</body>
</html>