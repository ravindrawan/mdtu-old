<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td valign="top" align="left" width="50%">
    නියෝජ්‍ය ප්‍රධාන ලේකම් (පිරිස් හා පුහුණු) කාර්යාලය<br />
    වයඹ පළාත් සභාව<br />
    කුරුණෑගල<br />
    <br /><br />
    දුරකථන : +94 37 2222018<br />
    ෆැක්ස් : +94 37 2223655<br />
    </td>
    <td valign="top">
    <form name="frm" method="post" action="submitsuggestions.php">
    <table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:20px;font-weight:700">ඔබගේ අදහස් යොමු කරන්න</td>
    </tr>
  <tr>
    <td align="right">නම</td>
    <td>&nbsp;</td>
    <td align="left"><input type="text" name="name" /></td>
  </tr>
  <tr>
    <td align="right">කාර්යාලය</td>
    <td>&nbsp;</td>
    <td align="left"><input type="text" name="off" /></td>
  </tr>
  <tr>
    <td align="right">දුරකතන අංකය</td>
    <td>&nbsp;</td>
    <td align="left"><span id="sprytextfield1">
    <input type="text" name="tele" id="text1" />
    <span class="textfieldInvalidFormatMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMinCharsMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span><span class="textfieldMaxCharsMsg">නිවැරදි දුරකතන අංකයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">ඊමේල් ලිපිනය</td>
    <td>&nbsp;</td>
    <td align="left"><span id="sprytextfield2">
      <input type="text" name="email" id="text2" />
      <span class="textfieldInvalidFormatMsg">නිවැරදි ඊමේල් ලිපිනයක් ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right" valign="top">* අදහස</td>
    <td>&nbsp;</td>
    <td align="left"><span id="sprytextarea1">
      <textarea name="des" id="textarea1" cols="45" rows="5"></textarea>
      <span class="textareaRequiredMsg">ඔබගේ අදහස ඇතුලත් කරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left"><input type="submit" name="submit" value="ඇතුලත් කරන්න" /></td>
  </tr>
    </table>

    </form>
    </td>
  </tr>
  <tr>
    <td valign="top" align="left">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
    
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15823.009471795445!2d80.35765423232489!3d7.492570380421936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae339f66334030d%3A0x909fb3f8c2a02e19!2sProvincial+Council+Public+Service+Comission+NWP!5e0!3m2!1sen!2slk!4v1534475747395" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>    </td>
  </tr>
  <tr>
    <td valign="top" align="left">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {isRequired:false, minChars:10, maxChars:10});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
</script>
</body>
</html>