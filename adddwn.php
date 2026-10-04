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
<form name="frm" method="post" enctype="multipart/form-data" action="adddwndata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">බාගතකිරීම් ඇතුලත් කරන්න</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="date" name="dwndate" value="<?Php echo date("Y-m-d"); ?>" /></td>
  </tr>
  <tr>
    <td align="right">වර්ගය</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    	<select name="dwntype">
        	<option>Notifications</option>
            <option>ලිපි</option>

		<option>නිබන්ධන</option> 
            <option>ප්‍රශ්න පත්‍ර</option>
            <option>ඡායාරූප</option>
            <option>ආකෘතිපත්‍ර</option>
            <option>අයදුම්පත්‍ර</option>
            
            <option>වෙනත්</option>           
        </select>
    </td>
  </tr>
  <tr>
    <td align="right">ලිපිගොනුවේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield2">
      <input type="text" name="name" id="text2" />
      <span class="textfieldRequiredMsg">A value is required.</span></span></td>
  </tr>
  <tr>
    <td align="right">අදාල පුහුණු වැඩ සටහන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield3">
      <input type="text" name="trname" id="text3" />
</span></td>
  </tr>
  <tr>
    <td align="right">ලිපිගොනුව / ඡායාරූපය 1</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
      <input type="file" name="dwnfile" id="text1" />
      <span class="textfieldRequiredMsg">ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ලිපිගොනුව / ඡායාරූපය 2</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="file" name="dwnfile2" /></td>
  </tr>
  <tr>
    <td align="right">ලිපිගොනුව / ඡායාරූපය 3</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="file" name="dwnfile3" /></td>
  </tr>
  <tr>
    <td align="right">ලිපිගොනුව / ඡායාරූපය 4</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="file" name="dwnfile4" /></td>
  </tr>
  <tr>
    <td align="right">විස්තරය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><textarea name="dwndes"></textarea></td>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
</script>
</body>
</html>