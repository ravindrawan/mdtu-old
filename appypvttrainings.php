<?Php

	session_start(); //To use the SESSION variable



	include "db.php"; // call the database connection

	$nid=trim(htmlspecialchars($_POST["nid"]));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="css/tabpanel.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<title>Management Development & Training Unit - Wayamba Provincial Council</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
</head>

<body>

<table width="100%" border="0" style="position:relative;border-collapse:collapse">
  <tr>
    <td><?php include('usrheader.php');?></td>
  </tr>
  <tr>
    <td>
<!-- ********************** Designations ********************************************** -->
<table width="100%" border="0">
  <tr>
    <!--<td width="20%" valign="top"><?php //include('leftmenu.php');?></td>-->
    <td width="100%" valign="top">
        <div class="tab">
        	<button class="tablinks" onclick="openCity(event, 'a1')"  >පාඨමාලා සඳහා ප්‍රතිපාදන ලබා ගැනීමේ අයදුම්පත්‍රය</button>

            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="a1" class="tabcontent" style="display:block">
<?Php

	$Sql="SELECT * FROM cp_staff where stf_Nid='$nid'";
	$rs=mysqli_query($con,$Sql);
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows ==0){
		?>
        <div style="font-size:24px" align="center"><br />
        <?Php	
			echo "ඔබ ඇතුලත් කල ".$nid." දරණ ජාතික හැඳුනුම්පත් අංකය මෙම පද්ධතිය තුල නොමැත. කරුණාකර ඔබගේ කාර්යාලයේ පුහුණු විෂය භාර නිලධාරියා මගින් ඔබගේ තොරතුරු ඇතුලත් කරන්න";	
          ?>
          <br />
          </div>
          <?Php  
		}
		else if($numberofRows>=1){
			$row=mysqli_fetch_assoc($rs);
		?>
        <form name="frm" method="post" action="printpvttrainingsapp.php?nid=<?Php echo $nid; ?>" target="new">
     <table width="100%" border="0">
  <tr>
    <td colspan="4" align="center" style="font-size:22px;color:#FFF;background-color:#000" height="35">
	බාහිර ආයතන මගින් පවත්වන පාඨමාලා සඳහා ප්‍රතිපාදන ලබා ගැනීමේ අයදුම්පත්‍රය</td>
  </tr>
  <tr>
    <td width="15%" rowspan="13" valign="top">&nbsp;</td>
    <td align="right">නිලධාරියාගේ නම&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_Name"]; ?></td>
  </tr>
  <tr>
    <td width="36%" align="right">ජාතික හැඳුනුම්පත් අංකය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_Nid"]; ?></td>
    </tr>
  <tr>
    <td align="right">උපන් දිනය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_dob"]; ?></td>
  </tr>
  <tr>
    <td align="right">තනතුර&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_desig"]; ?></td>
  </tr>
  <tr>
    <td align="right">කාර්යාලය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_office"]; ?></td>
  </tr>
  <tr>
    <td align="right">ජංගම දුරකථන අංකය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_mobile"]; ?></td>
  </tr>
  <tr>
    <td align="right">කාර්යාලීය දුරකථන අංකය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_ofstele"]; ?></td>
  </tr>
  <tr>
    <td align="right">ඊමේල් ලිපිනය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_email"]; ?></td>
  </tr>
  <tr>
    <td align="right">තනතුරෙහි ස්වභාවය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_desigtype"]; ?></td>
  </tr>
  <tr>
    <td align="right">සේවය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_service"]; ?></td>
  </tr>
  <tr>
    <td align="right">පන්තිය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_class"]; ?></td>
  </tr>
  <tr>
    <td align="right">මුල් පත්වීමේ දිනය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_firstappdate"]; ?></td>
  </tr>
  <tr>
    <td align="right">වර්තමාන තනතුරට පත් වූ දිනය&nbsp;:</td>
    <td colspan="2" align="left">&nbsp;<?Php echo $row["stf_cdesigdate"]; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">&nbsp;</td>
    <td colspan="2" align="left">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4">
    <!--******** Participated trainings**************** --></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="top">අධ්‍යාපන සුදුසුකම්</td>
    <td align="left"><span id="sprytextarea1">
      <textarea name="edus" id="textarea1" cols="85" rows="10"></textarea>
      <span class="textareaRequiredMsg">අධ්‍යාපන සුදුසුකම් ඇතුලත් කරන්න</span></span></td>
    <td width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="top">හදාරා ඇති වෙනත් පාඨමාලා&nbsp;</td>
    <td align="left"><span id="sprytextarea2">
      <textarea name="coursedes" id="textarea2" cols="85" rows="10"></textarea>
      <span class="textareaRequiredMsg">හදාරා ඇති වෙනත් පාඨමාලා ඇතුලත් කරන්න</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr align="center">
    <td colspan="4" align="cenet" style="font-size:18px;font-style:italic" ><u>ප්‍රතිපාදන ඉල්ලුම් කරන පාඨමාලාව පිළිබඳ විස්තර</u></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">පාඨමාලාවේ නම</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="cname" id="text1" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">ආයතනය</td>
    <td align="left"><span id="sprytextfield2">
      <label for="text2"></label>
      <input type="text" name="cins" id="text2" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">පාඨමාලාව ආරම්භ වන දිනය</td>
    <td align="left"><span id="sprytextfield3">
      <input type="date" name="csdate" id="text3" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">කාලසීමාව</td>
    <td align="left"><span id="sprytextfield4">
      <input type="text" name="cduration" id="text4" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">අවසන් වන දිනය (ආසන්න වශයෙන්)</td>
    <td align="left"><span id="sprytextfield5">
      <input type="date" name="cedate" id="text5" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right">පාඨමාලා ගාස්තුව</td>
    <td align="left"><span id="sprytextfield6">
      <input type="text" name="cfees" id="text6" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right" valign="top">වර්තමාන රාජකාරි කටයුතු වලට ඇති අදාලත්වය</td>
    <td align="left"><span id="sprytextarea3">
      <textarea name="crelevant" id="textarea3" cols="45" rows="5"></textarea>
      <span class="textareaRequiredMsg">A value is required.</span></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><input type="submit" name="submit" value=" අයදුම් කරන්න " /></td>
    <td>&nbsp;</td>
  </tr>
     </table>
   </form>
        
        <?Php	
		}


?>
        </div>
                      

   
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