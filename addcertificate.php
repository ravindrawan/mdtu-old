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
            <button class="tablinks" onclick="openCity(event, 'Paris')">පාඨමාලා සහතික ඉදිරිපත් කිරීම</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
                      
        <div id="Paris" class="tabcontent" style="display:block">
        <?Php
	$sql="SELECT * FROM cp_privatetrainings where pvtt_id='$pvtid'";
	$rs=mysqli_query($con,$sql);
	$rows=mysqli_fetch_assoc($rs);
		
		?>
			<form name="frm" method="post" action="addpvttrcertificate.php?atpid=<?Php echo $pvtid; ?>">
            <table width="100%" border="0">
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="right">සහතිකය ඉදිරිපත් කිරීම/නොකිරීම</td>
                <td>&nbsp;</td>
                <td align="left">
                  <select name="isappr">
                    <option <?Php if($rows["pvtt_approved"]==""){ ?> selected="selected" <?Php } ?>></option>
                    <option value="Yes"  <?Php if($rows["pvtt_approved"]=="Yes"){ ?> selected="selected" <?Php } ?>>සහතික ඉදිරිපත් කර ඇත</option>
                    <option value="No"  <?Php if($rows["pvtt_approved"]=="No"){ ?> selected="selected" <?Php } ?>>සහතික ඉදිරිපත් කර නැත</option>
                    
                    </select>
                  </td>
              </tr>
              <tr>
                <td colspan="3" align="center"><input type="submit" name="submit" value=" වෙනස් කරන්න " /></td>
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