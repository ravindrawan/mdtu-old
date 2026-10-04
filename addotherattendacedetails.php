<?Php

	session_start(); //To use the SESSION variable


	$det=$_GET["nid"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<link href="css/tabpanel.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />

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
        	<button class="tablinks" onclick="openCity(event, 'London')" > මෙම පුහුණුවට අදාලව නිලධාරියාගේ වෙනත් විස්තර ඇතුලත් කරන්න</button>
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block">
        <?Php

	$atpiddata=trim(htmlspecialchars($_GET["nid"]));
	$trds=explode('|',$atpiddata);
	$nid=$trds[0];
	$atpid=$trds[1];
	$atpsdate=$trds[2];

				$sqlattendance="SELECT * FROM cp_trainingattendance where (tratt_atpid='$atpid' AND  tratt_startdate='$atpsdate') AND tratt_empnid='$nid'";
				$rsattendance=mysqli_query($con,$sqlattendance);
		$rowsattends=mysqli_fetch_assoc($rsattendance)
		?>
        <form name="frmo" method="post" action="addtrainingcomnts.php?det=<?Php echo $det; ?>">
            <table width="80%" border="0">
              <tr>
                <td valign="top" align="right">විස්තර ඇතුලත් කරන්න</td>
                <td>&nbsp;</td>
                <td valign="top" align="left"><textarea name="otherdetails"><?Php echo $rowsattends["tratt_comnt"]; ?></textarea></td>
              </tr>
              <tr>
                <td valign="top" align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top" align="left">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="top"><input type="submit" name="submit" value="ඇතුලත් කරන්න" /></td>
                </tr>
              <tr>
                <td valign="top" align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td valign="top" align="left">&nbsp;</td>
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