<?Php
	session_start(); //To use the SESSION variable

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
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
        	<!--<button class="tablinks" onclick="openCity(event, 'London')" >තනතුරු ඇතුලත් කරන්න</button>-->
            <button class="tablinks" onclick="openCity(event, 'Paris')">පුහුණු වැඩ සටහන් සඳහා තෝරාගත් නිලධාරීන්ගේ පැමිණීම සටහන් කිරීම</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 	<!--	<div id="London" class="tabcontent" style="display:block">
            <?Php require_once("adddesigsnations.php"); ?>
        </div>
      -->                
        <div id="Paris" class="tabcontent" style="display:block">

                         <div align="center">
							<?Php //require_once("srch_trcandidates.php"); ?>
                    	</div>
						<div>
             			<?Php require_once("employeeattendancelist.php"); ?>
                        </div>

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