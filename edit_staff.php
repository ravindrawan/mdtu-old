<?Php

	include "db.php"; // call the database connection
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_staff where stf_ID='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);


	$sqld="SELECT * FROM cp_desigs order by des_name ASC";
	$rsd=mysqli_query($con,$sqld);

	$sqlo="SELECT * FROM offices order by of_name ASC";
	$rso=mysqli_query($con,$sqlo);

	$sqls="SELECT * FROM cp_services order by ser_name ASC";
	$rss=mysqli_query($con,$sqls);

		$off=$_SESSION['offid'];
		$logtype=$_SESSION['logtype'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="editstaffdata.php?did=<?Php echo $did; ?>">
<table width="100%" border="0">
  <tr>
    <td colspan="4" align="left" style="font-size:18px;font-weight:700">කාර්යමණ්ඩල තොරතුරු වෙනස් කරන්න</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ඡායාරූපය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="file" name="photo" /></td>
    <td rowspan="4" align="left">
	<?Php if($row["stf_Photo"]!=""){
		?>
		<img src="staff/<?Php echo $row["stf_Photo"]; ?>" width="112" />
        <?Php
	}
	else{
		?>
		<img src="staff/staffavatar.png" width="112" />
        <?Php
	}
		?>
        </td>
  </tr>
  <tr>
    <td align="right">ජාතික හැඳුනුම්පත් අංකය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="nid" id="text1" value="<?Php echo $row["stf_Nid"]; ?>" />
      <span class="textfieldRequiredMsg">ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span></span></td>
    </tr>
  <tr>
    <td align="right">නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield2">
      <input type="text" name="name" id="text2" size="50"  value="<?Php echo $row["stf_Name"]; ?>"  />
      <span class="textfieldRequiredMsg">නම ඇතුලත් කරන්න</span></span></td>
    </tr>
  <tr>
    <td align="right">උපන් දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="date" name="dob"  value="<?Php echo $row["stf_dob"]; ?>" /></td>
    </tr>
  <tr>
    <td align="right">ස්ත්‍රී / පුරුෂ භාවය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    	<select name="sex">
        	<option <?Php if($row["stf_sex"]=="පුරුෂ"){ ?> selected="selected" <?Php } ?>>පුරුෂ</option>
        	<option <?Php if($row["stf_sex"]=="ස්ත්‍රී"){ ?> selected="selected" <?Php } ?>>ස්ත්‍රී</option>

        </select>
    </td>
  </tr>
  
  <tr>
    <td align="right">තනතුර</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    <select name="desig">
    	<?Php
		$numberofRowsd= mysqli_num_rows($rsd);
		if($numberofRowsd !=0){
			while($rowsd=mysqli_fetch_assoc($rsd)){
		?>
        		<option  <?Php if($row["stf_desig"]==$rowsd["des_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsd["des_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    </td>
  </tr>
  <tr>
    <td align="right">කාර්යාලය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    <select name="office">
    	<?Php
		$numberofRowso= mysqli_num_rows($rso);
		if($numberofRowso !=0){
			while($rowso=mysqli_fetch_assoc($rso)){
		?>
        		<option  <?Php if($row["stf_office"]==$rowso["of_name"]){ ?> selected="selected" <?Php } ?>>
				<?Php echo $rowso["of_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">උප කාර්යාලය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="suboff"   value="<?Php echo $row["stf_suboff"]; ?>" /> (අදාල නම් පමණක් ඇතුලත් කරන්න)</td>
  </tr>
  
  <tr>
    <td align="right">ජංගම දුරකථන අංකය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield3">
    <input type="text" name="mobile" id="text3"  value="<?Php echo $row["stf_mobile"]; ?>" />
    <span class="textfieldRequiredMsg">ජංගම දුරකථන අංකය ඇතුලත් කරන්න</span><span class="textfieldInvalidFormatMsg">නිවැරදි ජංගම දුරකථන 
    අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි ජංගම දුරකථන 
    අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජංගම දුරකථන 
    අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  
  <tr>
    <td align="right">රාජකාරී දුරකථන අංකය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield4">
    <input type="text" name="officetele" id="text4"  value="<?Php echo $row["stf_ofstele"]; ?>" />
    <span class="textfieldMinCharsMsg">නිවැරදි රාජකාරී දුරකථන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි රාජකාරී දුරකථන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldRequiredMsg">රාජකාරී දුරකථන අංකය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ඊමේල් ලිපිනය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield5">
      <input type="text" name="email" id="text5"  value="<?Php echo $row["stf_email"]; ?>" />
      <span class="textfieldInvalidFormatMsg">නිවැරදි ඊමේල් ලිපිනයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">තනතුරෙහි ස්වභාවය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    	<select name="desigtype">
        	<option <?Php if($row["stf_desigtype"]=="ස්ථිර"){ ?> selected="selected" <?Php } ?>>ස්ථිර</option>
        	<option <?Php if($row["stf_desigtype"]=="අනියම්"){ ?> selected="selected" <?Php } ?>>අනියම්</option>
        	<option <?Php if($row["stf_desigtype"]=="තාවකාලික"){ ?> selected="selected" <?Php } ?>>තාවකාලික</option>

        </select>
    </td>
  </tr>
  <tr>
    <td align="right">සේවය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    
     <select name="service">
     <option></option>
    	<?Php
		$numberofRowss= mysqli_num_rows($rss);
		if($numberofRowss !=0){
			while($rowss=mysqli_fetch_assoc($rss)){
		?>
        		<option <?Php if($row["stf_service"]==$rowss["ser_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowss["ser_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    
    
    <!--
    <span id="sprytextfield6">
      <input type="text" name="service" id="text6"  value="<?Php echo $row["stf_service"]; ?>" />
</span>
-->
</td>
  </tr>
  <tr>
    <td align="right">පන්තිය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield7">
      <input type="text" name="class" id="text7"  value="<?Php echo $row["stf_class"]; ?>" />
</span></td>
  </tr>
  <tr>
    <td align="right">මුල් පත්වීමේ දිනය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><input type="date" name="firstappdate"  value="<?Php echo $row["stf_firstappdate"]; ?>" /></td>
  </tr>
  <tr>
    <td align="right">වර්තමාන තනතුරුට පත් වූ දිනය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><input type="date" name="cdesigdate"  value="<?Php echo $row["stf_cdesigdate"]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="submit" value=" වෙනස් කරන්න " /></td>
  </tr>
</table>
</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {minChars:10, maxChars:12});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {minChars:10, maxChars:10});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {minChars:10, maxChars:10});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "email", {isRequired:false});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "none", {isRequired:false});
</script>
</body>
</html>