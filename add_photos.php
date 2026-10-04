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
<form name="frm" method="post" enctype="multipart/form-data" action="addsldphoto.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">මුල් පිටුව සඳහා ඡායාරූප ඇතුලත් කරන්න</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left"></td>
  </tr>
  <tr>
    <td align="right">ඡායාරූපය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="file" name="photo" id="text1" />
      <span class="textfieldRequiredMsg">ඡායාරූපයක් තෝරන්න</span></span>
       (ඡායාරූපයේ වර්ගය -jpg හෝ png විය යුතුය. විශාලත්වය 1 Mb ට අඩු විය යුතුය.  දිග 940px පළල 318px, Resolution-72)
      </td>
  </tr>
  <tr>
    <td align="right">ඡායාරූපය පෙන්නුම් කිරීම</td>
    <td align="center">&nbsp;</td>
    <td align="left">
      <select name="photostatus">
        <option>ඔව්</option>
        <option>නැත</option>
        
        </select>
      </td>
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
</script>
</body>
</html>