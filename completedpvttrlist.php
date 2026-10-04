<?Php

	include "db.php"; // call the database connection

	$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];

	$sql="SELECT * FROM cp_privatetrainings order by pvtt_cstartdate ASC";
	$rs=mysqli_query($con,$sql);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/tabls.css" rel="stylesheet" type="text/css" />
<title>Untitled Document</title>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="addtoatp.php">
<table width="100%" border="1" class="zebra">
  <tr>
    <th width="3%">අනු අංකය</th>
    <th >ජා.හැ. අංකය</th>
    <th >නම</th>
    <th >තනතුර</th>
    <th >කාර්යාලය</th>
      <th >පාඨමාලාව</th>
    <th >පැවැත්වූ ආයතනය</th>
      
      <th >ආරම්භ වූ දිනය</th>
  
    <th>අවසන් වන දිනය</th>
    <th>පාඨමාලා ගාස්තුව (රු)</th>
    <th>ගෙවූ මුදල (රු)</th>
    <th>චෙක්පත් අංකය</th>
    <th>සහතික ඉදිරිපත් කිරීම</th>

  </tr>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
			$cf=0; $pa=0;
			while($rows=mysqli_fetch_assoc($rs)){
?>
  <tr >
    <td><?Php echo $number; ?></td>
    <td><?Php echo $rows["pvtt_nid"]; ?></td>
    <td>
	<?Php 
	$nid=$rows["pvtt_nid"];
	$sqls="SELECT * FROM cp_staff WHERE stf_Nid='$nid'";
	$rss=mysqli_query($con,$sqls);
	$rowss=mysqli_fetch_assoc($rss);
	echo $rowss["stf_Name"];
	?>
    </td>
    <td><?Php echo $rowss["stf_desig"]; ?></td>
    <td><?Php echo $rowss["stf_office"]; ?></td>
    <td align="left"><?Php echo $rows["pvtt_cname"]; ?></td>
    <td align="left" ><?Php echo $rows["pvtt_cinstitute"]; ?></td>
    <td align="center" style="font-family:Verdana, Geneva, sans-serif"><?Php echo $rows["pvtt_cstartdate"]; ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="center"><?Php echo $rows["pvtt_cenddate"]; ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php if($rows["pvtt_amount"]!=""){ echo number_format($rows["pvtt_fees"],2); } ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php if($rows["pvtt_amount"]!=""){echo number_format($rows["pvtt_amount"],2);} ?></td>
    <td align="center"><?Php echo $rows["pvtt_chequeno"]; ?></td>
    <td><?Php echo $rows["pvtt_certificatesubmit"]; ?></td>

  </tr>

<?Php
	$cf=$cf+$rows["pvtt_fees"];
	$pa=$pa+$rows["pvtt_amount"];
	$number=$number+1;
			}
	?>
   <tr style="font-weight:600">
    <td colspan="9" align="center">එකතුව</td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php echo number_format($cf,2); ?></td>
    <td style="font-family:Verdana, Geneva, sans-serif" align="right"><?Php if($pa!=""){ echo number_format($pa,2); } ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>

  </tr>
   
    <?Php		
		}
		else{
?>
  <tr>
    <td colspan="13" style="font-size:18px;font-weight:700" align="center">තොරතුරු කිසිවක් නොමැත...!</td>
  </tr>
<?Php
		}
		$con->close();
?>
</table>
    	<table width="100%"><tr><td width="80%"></td><td style="padding-left:5px;background-color:#000;font-size:16px" align="center" id="menulink" height="25px" width="20%">    <?Php
	if($_SESSION['logtype']=="Administrator"){
	?>
    <a href="control.php">පාලන පුවරුව</a>
    <?Php
	}
	else{
	?>
    <a href="usercontrolpanel.php">පාලන පුවරුව</a>
	<?Php
	}
	?>    
</td></tr></table>
</form>
</body>
</html>