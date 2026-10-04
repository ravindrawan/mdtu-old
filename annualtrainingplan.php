<?Php

	include "db.php"; // call the database connection

	$sqld="SELECT * FROM trdate where trd_id='1'";
	$rsd=mysqli_query($con,$sqld);
	$rowsd=mysqli_fetch_assoc($rsd);
	$d=$rowsd["trd_date"];

	$sql="SELECT * FROM cp_atp where atp_requestDate>'$d' AND atp_isinatp='Yes' order by atp_requestDate ASC";
	$rs=mysqli_query($con,$sql);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Management Development & Training Unit - Central Provincial Council</title>
</head>

<body>
<center>
	<?php
		$number=1;
		$numberofRows= mysqli_num_rows($rs);
		if($numberofRows !=0){
		?>
        	<div align="center" style="font-size:24px;font-weight:700"><?Php echo date("Y"); ?> වාර්ෂික පුහුණු සැලැස්ම</div>
    <hr style="color:#000;size:5" />

        <?Php	
			while($rows=mysqli_fetch_assoc($rs)){
				
?>
			<table width="75%" border="1" style="border-collapse:collapse">
              <tr>
                <td colspan="3" align="center" style="font-size:24px"><?Php echo '('.$number.')'.' '.$rows["atp_trname"]; ?></td>
                </tr>
              <tr>
                <td align="right">වැඩමුළුවේ අරමුණ</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_purpose"]; ?></td>
              </tr>
              <tr>
                <td align="right">පාඨමාලා අන්තර්ගතය</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_content"]; ?></td>
              </tr>
              <tr>
                <td align="right">ඉලක්ක කණ්ඩායම</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_targetgroup"]; ?></td>
              </tr>
              <tr>
                <td align="right">වැඩමුළු ගණන</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_nooftrainings"]; ?></td>
              </tr>
              <tr>
                <td align="right">වැඩමුළුව පවත්වන දින ගණන</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_noofdays"]; ?></td>
              </tr>
              <tr>
                <td align="right">පැවැත්වීමට අපේක්ෂිත වැඩමුළු සංඛ්‍යාව</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_nooftrainings"]; ?></td>
              </tr>
              <tr>
                <td align="right">වැඩමුළුව පවත්වන ස්ථානය</td>
                <td>&nbsp;</td>
                <td align="left"><?Php echo $rows["atp_location"]; ?></td>
              </tr>
			</table>
            <br /><br />
  <?Php
	$number=$number+1;
			}
		}
		else{
			echo "පුහුණු සැලැස්ම සකස් වී නොමැත";
		}
?>
</center>
</body>
</html>