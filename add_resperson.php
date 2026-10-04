<?Php

	include "db.php"; // call the database connection

	$nid=trim(htmlspecialchars($_POST["nid"]));
	$name=trim(htmlspecialchars($_POST["name"]));
	$dob=trim(htmlspecialchars($_POST["dob"]));
	$sex=trim(htmlspecialchars($_POST["sex"]));

	$desig=trim(htmlspecialchars($_POST["desig"]));
	$office=trim(htmlspecialchars($_POST["office"]));
	$mobile=trim(htmlspecialchars($_POST["mobile"]));
	$officetele=trim(htmlspecialchars($_POST["officetele"]));
	$hometele=trim(htmlspecialchars($_POST["hometele"]));

	$email=trim(htmlspecialchars($_POST["email"]));
	$phd=trim(htmlspecialchars($_POST["phd"]));
	$msc=trim(htmlspecialchars($_POST["msc"]));
	$degree=trim(htmlspecialchars($_POST["degree"]));
	$al=trim(htmlspecialchars($_POST["al"]));
	$prof=trim(htmlspecialchars($_POST["prof"]));

	$expe=trim(htmlspecialchars($_POST["expe"]));

	$trfield1=trim(htmlspecialchars($_POST["trfield1"]));
	$trfield2=trim(htmlspecialchars($_POST["trfield2"]));
	$trfield3=trim(htmlspecialchars($_POST["trfield3"]));
	$trfield4=trim(htmlspecialchars($_POST["trfield4"]));
	$trfield5=trim(htmlspecialchars($_POST["trfield5"]));
	

	$sql="SELECT * FROM cp_resourcepersons where rp_nid='$nid'";
	$rs=mysqli_query($con,$sql);

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
<form name="frm" method="post" enctype="multipart/form-data" action="addrecepdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="4" align="left" style="font-size:18px;font-weight:700">
        <?Php
        	if(mysqli_num_rows($rs)<1){//if user not exists
			
			$sqlinsert = "insert into cp_resourcepersons(rp_nid,rp_name,rp_dob,rp_gender,rp_desig,
rp_office,rp_mobile,rp_offtele,rp_hometele,rp_email,rp_phd,rp_msc,rp_degree,rp_al,rp_profq,rpexp,
rp_fld1,rp_fld2,rp_fld3,rp_fld4,rp_fld5)
				values('".$nid."','".$name."','".$dob."','".$sex."','".$desig."','".$office."','".$mobile."','".$officetele."'
				,'".$hometele."','".$email."','".$phd."','".$msc."','".$degree."','".$al."','".$prof."'
				,'".$expe."','".$trfield1."','".$trfield2."','".$trfield3."','".$trfield4."','".$trfield5."')";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "සම්පත්දායකයන් ඇතුලත් කිරීම සාර්ථකයි...නව සම්පත්දායකයෙක් ඇතුලත් කරන්න";
						}
			}
			else{
				echo "මෙම ජාතික හැඳුනුම්පත් අංකය හිමි සම්පත්දායකයා දැනටමත් ඇතුලත් කර ඇත...කරුණාකර වෙනත් සම්පත්දායකයෙකු ඇතුලත් කරන්න.";	
			}
   
		?>    
    
    </td>
  <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td align="right">ජාතික හැඳුනුම්පත් අංකය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield1">
      <input type="text" name="nid" id="text1" />
      <span class="textfieldRequiredMsg">ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජාතික හැඳුනුම්පත් අංකය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">නම</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield2">
      <input type="text" name="name" id="text2" size="50" />
      <span class="textfieldRequiredMsg">නම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">උපන් දිනය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><input type="date" name="dob" /></td>
  </tr>
  <tr>
    <td align="right">ස්ත්‍රී / පුරුෂ භාවය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    	<select name="sex">
        	<option>පුරුෂ</option>
        	<option>ස්ත්‍රී</option>

        </select>
    </td>
  </tr>
  
  <tr>
    <td align="right">තනතුර</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield9">
      <input type="text" name="desig" id="text9" />
      <span class="textfieldRequiredMsg">තනතුර ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">කාර්යාලය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield10">
      <input type="text" name="office" id="text10" />
</span></td>
  </tr>
  <tr>
    <td align="right">ජංගම දුරකථන අංකය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield3">
    <input type="text" name="mobile" id="text3" />
    <span class="textfieldRequiredMsg">ජංගම දුරකථන අංකය ඇතුලත් කරන්න</span><span class="textfieldInvalidFormatMsg">නිවැරදි ජංගම දුරකථන 
    අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි ජංගම දුරකථන 
    අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජංගම දුරකථන 
    අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">රාජකාරී දුරකථන අංකය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield4">
    <input type="text" name="officetele" id="text4" />
    <span class="textfieldMinCharsMsg">නිවැරදි රාජකාරී දුරකථන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි රාජකාරී දුරකථන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldRequiredMsg">රාජකාරී දුරකථන අංකය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">නිවසේ දුරකථන අංකය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield8">
    <input type="text" name="hometele" id="text8" />
    <span class="textfieldInvalidFormatMsg">නිවැරදි දුරකථන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි දුරකථන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි දුරකථන අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ඊමේල් ලිපිනය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><span id="sprytextfield5">
      <input type="text" name="email" id="text5" />
      <span class="textfieldInvalidFormatMsg">නිවැරදි ඊමේල් ලිපිනයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">අධ්‍යාපන සුදුසුකම්</td>
    <td align="center">&nbsp;</td>
    <td width="14%" align="right">ආචාර්ය උපාධිය</td>
    <td width="51%" align="left"><input type="text" name="phd" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">පශ්චාත් උපාධිය</td>
    <td align="left"><input type="text" name="msc" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">උපාධිය</td>
    <td align="left"><input type="text" name="degree" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="right">අ.පො.ස (උසස් පෙළ)</td>
    <td align="left"><input type="text" name="al" /></td>
  </tr>
  <tr>
    <td align="right">වෘත්තීය සුදුසුකම්</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><textarea name="prof"></textarea></td>
    </tr>
  <tr>
    <td align="right">පළපුරුද්ද</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left"><textarea name="expe"></textarea></td>
    </tr>
  <tr>
    <td align="right">පළමු විෂය ක්ෂේත්‍රය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
<?Php
	$sqld="SELECT * FROM cp_trfields order by tf_name ASC";
	$rsd=mysqli_query($con,$sqld);

?>
    <select name="trfield1">
    	<option></option>
    
    	<?Php
		$numberofRowsd= mysqli_num_rows($rsd);
		if($numberofRowsd !=0){
			while($rowsd=mysqli_fetch_assoc($rsd)){
		?>
        		<option><?Php echo $rowsd["tf_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    	
    </td>
  </tr>
  <tr>
    <td align="right">දෙවන විෂය ක්ෂේත්‍රය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
<?Php
	$sqld2="SELECT * FROM cp_trfields order by tf_name ASC";
	$rsd2=mysqli_query($con,$sqld2);

?>
    
    <select name="trfield2">
    	<option></option>
    
    	<?Php
		$numberofRowsd2= mysqli_num_rows($rsd2);
		if($numberofRowsd2 !=0){
			while($rowsd2=mysqli_fetch_assoc($rsd2)){
		?>
        		<option><?Php echo $rowsd2["tf_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">තෙවන විෂය ක්ෂේත්‍රය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    <?Php
	$sqld3="SELECT * FROM cp_trfields order by tf_name ASC";
	$rsd3=mysqli_query($con,$sqld3);

	?>

    <select name="trfield3">
    	<option></option>
    	<?Php
		$numberofRowsd3= mysqli_num_rows($rsd3);
		if($numberofRowsd3 !=0){
			while($rowsd3=mysqli_fetch_assoc($rsd3)){
		?>
        		<option><?Php echo $rowsd3["tf_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">සිව්වන විෂය ක්ෂේත්‍රය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    <?Php
	$sqld4="SELECT * FROM cp_trfields order by tf_name ASC";
	$rsd4=mysqli_query($con,$sqld4);

	?>
    
    <select name="trfield4">
    	<option></option>
    
    	<?Php
		$numberofRowsd4= mysqli_num_rows($rsd4);
		if($numberofRowsd4 !=0){
			while($rowsd4=mysqli_fetch_assoc($rsd4)){
		?>
        		<option><?Php echo $rowsd4["tf_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">පස්වන විෂය ක්ෂේත්‍රය</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">
    <?Php
	$sqld5="SELECT * FROM cp_trfields order by tf_name ASC";
	$rsd5=mysqli_query($con,$sqld5);

	?>
    
    <select name="trfield5">
        	<option></option>

    	<?Php
		$numberofRowsd5= mysqli_num_rows($rsd5);
		if($numberofRowsd5 !=0){
			while($rowsd5=mysqli_fetch_assoc($rsd5)){
		?>
        		<option><?Php echo $rowsd5["tf_name"]; ?></option>
        <?Php		
			}
		}
		?>
    </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" ඇතුල් කරන්න " /></td>
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