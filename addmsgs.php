<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addmsgdata.php">
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">නිවේදන ඇතුලත් කරන්න</td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">ඇතුලත් කරන දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="date" name="msgdate" value="<?Php echo date("Y-m-d"); ?>" /></td>
  </tr>
  <tr>
    <td align="right">* නිවේදනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="sprytextarea1">
      <textarea name="msg" id="textarea1" cols="45" rows="5"></textarea>
      <span class="textareaRequiredMsg">නිවේදනය ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">නිවේදනය පෙන්නුම් කිරීම</td>
    <td align="center">&nbsp;</td>
    <td align="left">
      <select name="msgstatus">
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
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>