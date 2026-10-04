<?Php

	session_start(); //To use the SESSION variable

	include "db.php"; // call the database connection
	$pvtid=$_GET["atpid"];

	$sql="SELECT * FROM cp_privatetrainings where pvtt_id='$pvtid'";
	$rs=mysqli_query($con,$sql);
	$rows=mysqli_fetch_assoc($rs);
	
	$isappr=trim(htmlspecialchars($_POST["isappr"]));
	$reason=trim(htmlspecialchars($_POST["reason"]));
	$chkno=trim(htmlspecialchars($_POST["chkno"]));
	$chkissudate=trim(htmlspecialchars($_POST["chkissudate"]));
	if($chkissudate==""){
		$chkissudate="1111-11-11";	
	}
	$chkdate=trim(htmlspecialchars($_POST["chkdate"]));
	if($chkdate==""){
		$chkdate="1111-11-11";	
	}

	$bank=trim(htmlspecialchars($_POST["bank"]));
	$amount=trim(htmlspecialchars($_POST["amount"]));
	$cmnt=trim(htmlspecialchars($_POST["cmnt"]));
	
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
            <button class="tablinks" onclick="openCity(event, 'Paris')">පාඨමාලා සඳහා ප්‍රතිපාදන ලබා දීම</button>
            <!--<button class="tablinks" onclick="openCity(event, 'col')">Search Employees</button>-->
        </div>
                      
                      
        <div id="Paris" class="tabcontent" style="display:block">
			<form name="frm" method="post" action="">
            <table width="100%" border="0">
              <tr>
                <td align="right">&nbsp;</td>
                <td>&nbsp;</td>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" align="center">
      <?Php

	  
				$sqlinsert = "update cp_privatetrainings set pvtt_approved='$isappr',pvtt_reason='$reason',pvtt_chequeno='$chkno'
				,pvtt_chequeissuedate='$chkissudate',pvtt_chequedate='$chkdate',pvtt_chequebank='$bank',pvtt_amount='$amount'
				,pvtt_comment='$cmnt'
				where pvtt_id='$pvtid'";
 						$rsinsert = mysqli_query($con,$sqlinsert);
						if(!$rsinsert){
							echo "Error : ".mysqli_error($con);	
						}
						else{
							echo "පාඨමාලාව සඳහා ප්‍රතිපාදන ලබා දීම/ප්‍රතික්ෂේප කිරීම සාර්ථකයි...ආපසු යාම සඳහා <a href='appliedprivatetranings.php'>මෙතනින්</a> යන්න";
						}
   
		?>    
                
                </td>
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