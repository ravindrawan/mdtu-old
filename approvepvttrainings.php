<?Php

	session_start(); //To use the SESSION variable



	include "db.php"; // call the database connection
	$pvtid=$_GET["atpid"];

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="css/tabpanel.css" rel="stylesheet" type="text/css" />
<script src="scripts/tabpanel.js" type="text/javascript"></script>

<title>Management Development & Training Unit - Wayamba Provincial Council</title>
</head>

<body>

<table width="100%" border="0" style="position:relative;border-collapse:collapse">
  <tr>
    <td><?php include('header.php');?></td>
  </tr>
  <tr>
    <td>
<!-- ********************** Designations ********************************************** -->
<table width="100%" border="0">
  <tr>
    <td width="20%" valign="top"><?php include('leftmenu.php');?></td>
    <td width="80%" valign="top">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Paris')">පාඨමාලා සඳහා ප්‍රතිපාදන ලබා දීම</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
                      
        <div id="Paris" class="tabcontent" style="display:block">
        <?Php
	$sql="SELECT * FROM cp_privatetrainings where pvtt_id='$pvtid'";
	$rs=mysqli_query($con,$sql);
	$rows=mysqli_fetch_assoc($rs);
		
		?>
			<form name="frm" method="post" action="approvedppttrns.php?atpid=<?Php echo $pvtid; ?>">
            <table width="100%" border="0">
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">ගෙවීම අනුමත කිරීම/නොකිරීම</td>
                <td>&nbsp;</td>
                <td align="left">
                	<select name="isappr">
                   	  <option <?Php if($rows["pvtt_approved"]==""){ ?> selected="selected" <?Php } ?>></option>
                   	  <option value="Yes"  <?Php if($rows["pvtt_approved"]=="Yes"){ ?> selected="selected" <?Php } ?>>
                      අනුමත කර ඇත</option>
                   	  <option value="No"  <?Php if($rows["pvtt_approved"]=="No"){ ?> selected="selected" <?Php } ?>>අනුමත කර නැත</option>
                        
                    </select>
                </td>
              </tr>
              <tr>
                <td align="right">අනුමත කිරීමට/නොකිරීමට හේතුව</td>
                <td>&nbsp;</td>
                <td align="left">
                	<input type="text" name="reason" value="<?Php echo $rows["pvtt_reason"]; ?>" />
                </td>
              </tr>
              <tr>
                <td align="right">මුදල් ගෙවූ චෙක්පත් අංකය</td>
                <td>&nbsp;</td>
                <td align="left"><input type="text" name="chkno" value="<?Php echo $rows["pvtt_chequeno"]; ?>" /></td>
              </tr>
              <tr>
                <td align="right">චෙක්පත නිකුත් කල දිනය</td>
                <td>&nbsp;</td>
                <td align="left"><input type="date" name="chkissudate" value="<?Php echo $rows["pvtt_chequeissuedate"]; ?>" /></td>
              </tr>
               <tr>
                <td align="right">චෙක්පත් දිනය</td>
                <td>&nbsp;</td>
                <td align="left"><input type="date" name="chkdate" value="<?Php echo $rows["pvtt_chequedate"]; ?>" /></td>
              </tr>

              <tr>
                <td align="right">අදාල බැංකුව</td>
                <td>&nbsp;</td>
                <td align="left"><input type="text" name="bank" value="<?Php echo $rows["pvtt_chequebank"]; ?>" /></td>
              </tr>
              <tr>
                <td align="right">මුදල</td>
                <td>&nbsp;</td>
                <td align="left"><input type="text" name="amount" value="<?Php echo $rows["pvtt_amount"]; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top">වෙනත් විස්තර</td>
                <td>&nbsp;</td>
                <td align="left"><textarea name="cmnt"><?Php echo $rows["pvtt_comment"]; ?></textarea></td>
              </tr>
              <tr>
                <td colspan="3" align="center"><input type="submit" name="submit" value=" අනුමත කරන්න " /></td>
              </tr>
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
            </table>
		</form>
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