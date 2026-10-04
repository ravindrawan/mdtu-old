<?Php

	session_start(); //To use the SESSION variable

	include "db.php"; // call the database connection

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<link href="css/tabpanel.css" rel="stylesheet" type="text/css" />
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="scripts/tabpanel.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
        	<button class="tablinks" onclick="openCity(event, 'London')" > පුහුණු වැඩ සටහන් අවසන් කිරීම</button>
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block">
        <?Php

	$atpiddata=trim(htmlspecialchars($_GET["atpid"]));
	$trds=explode('|',$atpiddata);
	$atpid=$trds[0];
	$atpsdate=$trds[1];

		?>
        <form name="frmo" method="post" action="finishTrainingProgram.php?det=<?Php echo $atpiddata; ?>">

                <table width="80%" border="0">
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">සත්‍ය වියදම</td>
                    <td>&nbsp;</td>
                    <td align="left"><span id="sprytextfield1">
                      <input type="text" name="expence" id="text1" />
                    <span class="textfieldRequiredMsg">සත්‍ය වියදම ඇතුලත් කරන්න</span></span> (උදා- 12345.55)</td>
                  </tr>
                  <tr>
                    <td align="right" valign="top">වෙනත් කරුණු</td>
                    <td>&nbsp;</td>
                    <td align="left"><textarea name="comnt"></textarea></td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="right">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left"><input type="submit" name="submit" value="ඇතුලත් කරන්න" /></td>
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