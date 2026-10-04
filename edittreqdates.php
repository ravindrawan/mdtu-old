
<?Php
	session_start(); //To use the SESSION variable


	include "db.php"; // call the database connection

	$sdate=trim(htmlspecialchars($_POST["sdate"]));
	$edate=trim(htmlspecialchars($_POST["edate"]));


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
        	<button class="tablinks" onclick="openCity(event, 'London')" >සැලඅස්ම සකස් කිරීම සඳහා අවශ්‍ය පුහුණු අවශ්‍යතා ඇතුලත් කල දිනය වෙනස් කිරීම</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
 		<div id="London" class="tabcontent" style="display:block">
            <?Php //require_once("edit_trd.php"); ?>
        <?Php
        //	if(mysqli_num_rows($rs)<1){//if user not exists
			
				$sqlinsert = "update cp_treqperiod set trq_sdate='$sdate',trq_edate='$edate' where trq_id='1'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "පුහුණු ඉල්ලීම් ඇතුලත් කිරීමේ කාල සීමාව වෙනස් කිරීම සාර්ථකයි...<br><br>
							<a href='control.php'>පාලන පුවරුව</a>
							";
						}
		/*	}
			else{
				echo "පුහුණු ඉල්ලීම් ඇතුලත් කිරීමේ කාල සීමාව වෙනස් කිරීම අසාර්ථකයි...<br><br>
							<a href='control.php'>පාලන පුවරුව</a>
							";
	
			}
   	*/
		?>    
            
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