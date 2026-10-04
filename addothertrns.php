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
<form name="frm" method="post" enctype="multipart/form-data" action="addothertrnsdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">වෙනත් කාර්යාල/දෙපාර්තමේන්තු මගින් පැවැත්වූ පුහුණ වැඩ සටහන් ඇතුලත් කරන්න</td>
  </tr>
  <tr>
    <td align="right">කාර්යාලයේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="text" name="offname" id="text1" size="50" />
      <span class="textfieldRequiredMsg">කාර්යාලයේ නම ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පුහුණු වැඩ සටහන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield7">
      <input type="text" name="trname" id="text7" size="50" />
      <span class="textfieldRequiredMsg">පුහුණු වැඩ සටහන ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">පුහුණුව ආරම්භ වූ දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="date" name="trsdate" /></td>
  </tr>
  <tr>
    <td align="right">පැවැත් වූ දින ගණන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="noofdays" /></td>
  </tr>
  <tr>
    <td align="right">වැය කල මුදල</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield8">
      <input type="text" name="amnt" id="text8" />
      <span class="textfieldRequiredMsg">වැය කල මුදල ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">වෙනත් විස්තර</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="other"></textarea></td>
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
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7");
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
</script>
</body>
</html>