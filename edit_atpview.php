<?Php
	$did=$_GET["did"];

	$Sql="SELECT * FROM cp_atp WHERE atp_id='$did'";
	$rs=mysqli_query($con,$Sql);
	$row=mysqli_fetch_assoc($rs);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="editatpdetails.php?did=<?Php echo $did; ?>">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="center" style="font-size:18px;font-weight:700">පුහුණු වැඩ සටහන - 
    <input style="font-size:16px;font-weight:bolder" type="text" name="trname" value="<?Php echo $row["atp_trname"]; ?>" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
 <!--********************* Edit Details **************************************************-->   
    <table width="100%" border="0">
  <tr>
    <td width="23%" align="right">ලිපි ගොනු අංකය</td>
    <td colspan="2" align="left"><span id="sprytextfield1">
      <input type="text" name="fileno" id="text1" value="<?Php echo $row["atp_fileno"]; ?>" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
    <td width="22%" align="right">පුහුණු වැඩ සටහන අධීක්ෂණය</td>
    <td width="26%" align="left"><span id="sprytextfield2">
      <input type="text" name="subjno" id="text2" value="<?Php echo $row["atp_subjctno"]; ?>" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
    </tr>
  <tr>
    <td align="right">අරමුණ</td>
    <td colspan="2" align="left"><span id="sprytextarea1">
      <textarea name="purpose" id="textarea1" cols="45" rows="5"><?Php echo $row["atp_purpose"]; ?></textarea>
      <span class="textareaRequiredMsg">ඇතුලත් කරන්න</span></span></td>
    <td align="right">අන්තර්ගතය</td>
    <td align="left"><span id="sprytextarea2">
      <textarea name="content" id="textarea2" cols="45" rows="5"><?Php echo $row["atp_content"]; ?></textarea>
      <span class="textareaRequiredMsg">ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ඉලක්කගත කණ්ඩායම</td>
    <td colspan="2" align="left"><span id="sprytextfield3">
      <input type="text" name="targetg" id="text3"  value="<?Php echo $row["atp_targetgroup"]; ?>" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
    <td align="right">වැඩමුළු ගණන</td>
    <td align="left"><span id="sprytextfield4">
      <input type="text" name="nooftrs" id="text4" value="<?Php echo $row["atp_nooftrainings"]; ?>" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">එක් වැඩමුළුවකට දින ගණන</td>
    <td colspan="2" align="left"><span id="sprytextfield5">
      <input type="text" name="noofdays" id="text5"  value="<?Php echo $row["atp_noofdays"]; ?>" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
    <td align="right">සහභාගී කරගන්නා නිලධාරීන් ගණන</td>
    <td align="left"><span id="sprytextfield6">
      <input type="text" name="noofparticipants" id="text6"  value="<?Php echo $row["atp_noofparticipants"]; ?>" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">වැඩමුළුව පැවැත්වෙන ස්ථානය</td>
    <td colspan="2" align="left">
    <select name="trlocation">
    <option></option>
    <?Php
	$sqltrc="SELECT * FROM cp_trcenters order by trc_name ASC";
	$rstrc=mysqli_query($con,$sqltrc);
		$numberofRowstrc= mysqli_num_rows($rstrc);
		if($numberofRowstrc !=0){
			while($rowstrc=mysqli_fetch_assoc($rstrc)){
		?>
        	<option <?Php if($row["atp_location"]==$rowstrc["trc_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowstrc["trc_name"]; ?></option>
        <?Php
			}
		}
	
	?>
    </td>
    <td align="right">මූල්‍ය ප්‍රභවය</td>
    <td align="left">
    <select name="fsource">
    <option></option>
    <?Php
	$sqlfs="SELECT * FROM cp_funds order by fnd_name ASC";
	$rsfs=mysqli_query($con,$sqlfs);
		$numberofRowsfs= mysqli_num_rows($rsfs);
		if($numberofRowsfs !=0){
			while($rowsfs=mysqli_fetch_assoc($rsfs)){
		?>
        	<option <?Php if($row["atp_fundsource"]==$rowsfs["fnd_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsfs["fnd_name"]; ?></option>
        <?Php
			}
		}
	
	?>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">එක් වැඩමුළුවක් සඳහා වෙන් කල මුදල (රුපියල්)</td>
    <td align="left" colspan="2"><input type="text" name="budj"   value="<?Php echo $row["atp_bdjet"]; ?>"/></td>
  </tr>
  <tr>
    <td align="right">වැඩ සටහනේ ආරම්භක දිනය</td>
    <td colspan="2" align="left"><input type="date" name="day1"  
    	value="<?Php if($row["atp_day1"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day1"]; } ?>" />
    </td>
    <td align="right">2 වන දිනය</td>
    <td align="left"><input type="date" name="day2"  value="<?Php if($row["atp_day2"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day2"]; } ?>" /></td>
  </tr>
  <tr>
    <td align="right">3 වන දිනය</td>
    <td colspan="2" align="left"><input type="date" name="day3"   value="<?Php if($row["atp_day3"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day3"]; } ?>" /></td>
    <td align="right">4 වන දිනය</td>
    <td align="left"><input type="date" name="day4"  value="<?Php if($row["atp_day4"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day4"]; } ?>" /></td>
  </tr>
  <tr>
    <td align="right">5 වන දිනය</td>
    <td colspan="2" align="left"><input type="date" name="day5"  value="<?Php if($row["atp_day5"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day5"]; } ?>" /></td>
    <td align="right">6 වන දිනය</td>
    <td align="left"><input type="date" name="day6"  value="<?Php if($row["atp_day6"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day6"]; } ?>" /></td>
  </tr>
  <tr>
    <td align="right">7 වන දිනය</td>
    <td colspan="2" align="left"><input type="date" name="day7"  value="<?Php if($row["atp_day7"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day7"]; } ?>" /></td>
    <td align="right">8 වන දිනය</td>
    <td align="left"><input type="date" name="day8"  value="<?Php if($row["atp_day8"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day8"]; } ?>" /></td>
  </tr>
  <tr>
    <td align="right">9 වන දිනය</td>
    <td colspan="2" align="left"><input type="date" name="day9"  value="<?Php if($row["atp_day9"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day9"]; } ?>" /></td>
    <td align="right">10 වන දිනය</td>
    <td align="left"><input type="date" name="day10"  value="<?Php if($row["atp_day10"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_day10"]; } ?>" /></td>
  </tr>
  <tr>
    <td align="right">ආරම්භ වන වෙලාව</td>
    <td colspan="2" align="left"><span id="sprytextfield8">
      <input type="text" name="stime" id="text8"  value="<?Php echo $row["atp_stime"]; ?>" />
</span></td>
    <td align="right">අවසන් වන වෙලාව</td>
    <td align="left"><span id="sprytextfield9">
      <input type="text" name="etime" id="text9"  value="<?Php echo $row["atp_etime"]; ?>" />
</span></td>
  </tr>
  <tr>
    <td align="right">පුහුණු සැලැස්මට ඇතුලත් වේද?</td>
    <td colspan="2" align="left">
    	<select name="addatp">
        	<option <?Php if($row["atp_isaddatp"]=="ඔව්"){ ?> selected="selected" <?Php } ?>>ඔව්</option>
        	<option <?Php if($row["atp_isaddatp"]=="නැත"){ ?> selected="selected" <?Php } ?>>නැත</option>
        </select>
    </td>
    <td align="right">මෙම වැඩසටහන මුල් පිටුවට ඇතුලත් කිරීම</td>
    <td align="left">
    	<select name="addhome">
        	<option <?Php if($row["atp_addhome"]=="ඔව්"){ ?> selected="selected" <?Php } ?>>ඔව්</option>
        	<option <?Php if($row["atp_addhome"]=="නැත"){ ?> selected="selected" <?Php } ?>>නැත</option>
        </select>
    
    </td>
  </tr>
  <tr>
    <td align="right">වැඩමුළුව සඳහා අයදුම් කල හැකි අවසාන දිනය</td>
    <td colspan="2" align="left"><input type="date" name="appclaseday"  value="<?Php if($row["atp_lastdateapply"]=="1111-11-11"){
			echo "";}
			else{
		echo $row["atp_lastdateapply"]; } ?>" /></td>
    <td align="right">වෙනත් කරුණු</td>
    <td align="left"><textarea name="otherfacts"><?Php echo $row["atp_otherfacts"]; ?></textarea></td>
  </tr>
  <tr>
    <td align="right">විශේෂ කරුණු හා එම කරුණු ප්‍රදර්ශනය කිරීම</td>
    <td width="15%" align="left">
    	<textarea name="specialfacts" cols="50"><?Php echo $row["atp_specialfacts"]; ?></textarea></td>
    <td width="14%" align="left" valign="top">
    <select name="showspecialfacts">
      <option <?Php if($row["atp_showspecialfacts"]=="ඔව්"){ ?> selected="selected" <?Php } ?>>ඔව්</option>
      <option <?Php if($row["atp_showspecialfacts"]=="නැත"){ ?> selected="selected" <?Php } ?>>නැත</option>
    </select></td>
    <td align="right">විශේෂ කරුණු කැඳවීම් ලිපියට ඇතුලත් කිරීම</td>
    <td align="left">
		<select name="addspecialtoltr">
      		<option <?Php if($row["atp_specialfinletter"]=="ඔව්"){ ?> selected="selected" <?Php } ?>>ඔව්</option>
      		<option <?Php if($row["atp_specialfinletter"]=="නැත"){ ?> selected="selected" <?Php } ?>>නැත</option>
    	</select>    
    </td>
  </tr>
  <tr>
    <td align="right">1 වන සම්පත්දායකයා</td>
    <td colspan="2" align="left">
    	<select name="rp1">
        	<option></option>
		<?php
		$sqlrp="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp=mysqli_query($con,$sqlrp);

		$numberofRows= mysqli_num_rows($rsrp);
		if($numberofRows !=0){
			while($rowsrp=mysqli_fetch_assoc($rsrp)){
		?>
        	<option <?Php if($row["atp_resourcep1"]==$rowsrp["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    </td>
    <td align="right">2 වන සම්පත්දායකයා</td>
    <td align="left">
    	<select name="rp2">
        	<option></option>
		<?php
		$sqlrp2="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp2=mysqli_query($con,$sqlrp2);

		$numberofRows2= mysqli_num_rows($rsrp2);
		if($numberofRows2 !=0){
			while($rowsrp2=mysqli_fetch_assoc($rsrp2)){
		?>
        	<option <?Php if($row["atp_resourcep2"]==$rowsrp2["rp_name"]){ ?> selected="selected" <?Php } ?>>
			<?Php echo $rowsrp2["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
  </tr>
  <tr>
    <td align="right">3 වන සම්පත්දායකයා</td>
    <td colspan="2" align="left">
    	<select name="rp3">
        	<option></option>
		<?php
		$sqlrp3="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp3=mysqli_query($con,$sqlrp3);

		$numberofRows3= mysqli_num_rows($rsrp3);
		if($numberofRows3 !=0){
			while($rowsrp3=mysqli_fetch_assoc($rsrp3)){
		?>
        	<option <?Php if($row["atp_resourcep3"]==$rowsrp3["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp3["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
    <td align="right">4 වන සම්පත්දායකයා</td>
    <td align="left">
    	<select name="rp4">
        	<option></option>
		<?php
		$sqlrp4="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp4=mysqli_query($con,$sqlrp);

		$numberofRows4= mysqli_num_rows($rsrp4);
		if($numberofRows4 !=0){
			while($rowsrp4=mysqli_fetch_assoc($rsrp4)){
		?>
        	<option  <?Php if($row["atp_resourcep4"]==$rowsrp4["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp4["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
  </tr>
  <tr>
    <td align="right">5 වන සම්පත්දායකයා</td>
    <td colspan="2" align="left">
    	<select name="rp5">
        	<option></option>
		<?php
		$sqlrp5="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp5=mysqli_query($con,$sqlrp5);

		$numberofRows5= mysqli_num_rows($rsrp5);
		if($numberofRows5 !=0){
			while($rowsrp5=mysqli_fetch_assoc($rsrp5)){
		?>
        	<option <?Php if($row["atp_resourcep5"]==$rowsrp5["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp5["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
    <td align="right">6 වන සම්පත්දායකයා</td>
    <td align="left">
    	<select name="rp6">
        	<option></option>
		<?php
		$sqlrp6="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp6=mysqli_query($con,$sqlrp6);

		$numberofRows6= mysqli_num_rows($rsrp6);
		if($numberofRows6 !=0){
			while($rowsrp6=mysqli_fetch_assoc($rsrp6)){
		?>
        	<option <?Php if($row["atp_resourcep6"]==$rowsrp6["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp6["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
  </tr>
  <tr>
    <td align="right">7 වන සම්පත්දායකයා</td>
    <td colspan="2" align="left">
    	<select name="rp7">
        	<option></option>
		<?php
		$sqlrp7="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp7=mysqli_query($con,$sqlrp7);

		$numberofRows7= mysqli_num_rows($rsrp7);
		if($numberofRows7 !=0){
			while($rowsrp7=mysqli_fetch_assoc($rsrp7)){
		?>
        	<option <?Php if($row["atp_resourcep7"]==$rowsrp7["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp7["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
    <td align="right">8 වන සම්පත්දායකයා</td>
    <td align="left">
    	<select name="rp8">
        	<option></option>
		<?php
		$sqlrp8="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp8=mysqli_query($con,$sqlrp8);

		$numberofRows8= mysqli_num_rows($rsrp8);
		if($numberofRows8 !=0){
			while($rowsrp8=mysqli_fetch_assoc($rsrp8)){
		?>
        	<option <?Php if($row["atp_resourcep8"]==$rowsrp8["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp8["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
  </tr>
  <tr>
    <td align="right">9 වන සම්පත්දායකයා</td>
    <td colspan="2" align="left">
    	<select name="rp9">
        	<option></option>
		<?php
		$sqlrp9="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp9=mysqli_query($con,$sqlrp9);

		$numberofRows9= mysqli_num_rows($rsrp9);
		if($numberofRows9 !=0){
			while($rowsrp9=mysqli_fetch_assoc($rsrp9)){
		?>
        	<option <?Php if($row["atp_resourcep9"]==$rowsrp9["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp9["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
    <td align="right">10 වන සම්පත්දායකයා</td>
    <td align="left">
    	<select name="rp10">
        	<option></option>
		<?php
		$sqlrp10="SELECT * FROM cp_resourcepersons order by rp_name ASC";
		$rsrp10=mysqli_query($con,$sqlrp10);

		$numberofRows10= mysqli_num_rows($rsrp10);
		if($numberofRows10 !=0){
			while($rowsrp10=mysqli_fetch_assoc($rsrp10)){
		?>
        	<option <?Php if($row["atp_resourcep10"]==$rowsrp10["rp_name"]){ ?> selected="selected" <?Php } ?>><?Php echo $rowsrp10["rp_name"]; ?></option>
        <?Php		
			}
		}
		?>
    	</select>
    
    </td>
  </tr>
  <tr>
    <td align="right">පුහුණු වැඩ සටහන සම්බන්ධීකාරක (ජා.හැ.අංකය)</td>
    <td colspan="2" align="left"><span id="sprytextfield10">
    <input type="text" name="ssnid1" id="text10" value="<?Php echo $row["atp_supportstaff1"]; ?>" />
<span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
    <td align="right">සහාය කාර්ය මණ්ඩලය 2 (ජා.හැ.අංකය)</td>
    <td align="left"><span id="sprytextfield11">
    <input type="text" name="ssnid2" id="text11" value="<?Php echo $row["atp_supportstaff2"]; ?>" />
    <span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">සහාය කාර්ය මණ්ඩලය 3 (ජා.හැ.අංකය)</td>
    <td colspan="2" align="left"><span id="sprytextfield12">
    <input type="text" name="ssnid3" id="text12" value="<?Php echo $row["atp_supportstaff3"]; ?>" />
    <span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
    <td align="right">සහාය කාර්ය මණ්ඩලය 4 (ජා.හැ.අංකය)</td>
    <td align="left"><span id="sprytextfield13">
    <input type="text" name="ssnid4" id="text13" value="<?Php echo $row["atp_supportstaff4"]; ?>" />
    <span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">සහාය කාර්ය මණ්ඩලය 5 (ජා.හැ.අංකය)</td>
    <td colspan="2" align="left"><span id="sprytextfield14">
    <input type="text" name="ssnid5" id="text14" value="<?Php echo $row["atp_supportstaff5"]; ?>" />
    <span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
    <td align="right">සහාය කාර්ය මණ්ඩලය 6 (ජා.හැ.අංකය)</td>
    <td align="left"><span id="sprytextfield15">
    <input type="text" name="ssnid6" id="text15"  value="<?Php echo $row["atp_supportstaff6"]; ?>" />
    <span class="textfieldMinCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි ජා.හැ.අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">මුදල් භාර නිලධාරියාගේ නම</td>
    <td colspan="2" align="left"><input type="text" name="cashoff"  value="<?Php echo $row["atp_cashofficername"]; ?>" /></td>
    <td align="right">මුදල් භාර නිලධාරියාගේ තනතුර</td>
    <td align="left"><input type="text" name="cashoffdesig"  value="<?Php echo $row["atp_cashofficerdesig"]; ?>" /></td>
  </tr>
  <tr>
    <td align="right">මුදල් භාර නිලධාරියාගේ වෙනත් විස්තර</td>
    <td colspan="2" align="left"><textarea name="cashoffdetails"><?Php echo $row["atp_cashofficerotherdetails"]; ?></textarea></td>
    <td align="right">පුහුණු වැඩසටහනේ වර්ගය</td>
    <td align="left">
    	<select name="trtype">
        	<option <?php if($row["atp_trtype"]=="MDTU පුහුණුවකි"){ ?> selected="selected" <?Php } ?>>MDTU පුහුණුවකි</option>
        	<option <?php if($row["atp_trtype"]=="ඵලදායිතා පුහුණුවකි"){ ?> selected="selected" <?Php } ?>>ඵලදායිතා පුහුණුවකි</option>
            
        </select>
    </td>
  </tr>
  
  <tr>
    <td align="right">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>

  </table>

    
    </td>
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
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8", "none", {isRequired:false});
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "none", {minChars:10, maxChars:12, isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {isRequired:false, minChars:10, maxChars:12});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none", {isRequired:false, minChars:10, maxChars:12});
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {isRequired:false, minChars:10, maxChars:12});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {isRequired:false, minChars:10, maxChars:12});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "none", {isRequired:false, minChars:10, maxChars:12});
</script>
</body>
</html>