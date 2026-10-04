<?Php

	include "db.php"; // call the database connection
	$uptr=$_GET["did"];
	$uptr = explode('|',$uptr);//get the atp id relevent to the training program
	$trid = $uptr[0];
	$nid = $uptr[1];

//echo $trid."<br>".$nid;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/controls.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationRadio.js" type="text/javascript"></script>
</head>

<body>
<form name="frm" method="post" enctype="multipart/form-data" action="applytrsdata.php?did=<?Php echo $trid; ?>">

<?Php
	$sql="SELECT * FROM cp_atp where atp_id='$trid'";
	$rs=mysqli_query($con,$sql);
	$rowatp=mysqli_fetch_assoc($rs);
	
	$sqls="SELECT * FROM cp_staff where stf_Nid='$nid'";
	$rss=mysqli_query($con,$sqls);
	$rowstf=mysqli_fetch_assoc($rss);

?>
<table width="100%" border="0">
  <tr>
    <td colspan="3" align="left" style="font-size:18px;font-weight:700">පුහුණු වැඩ සටහන් සඳහා අයදුම් කරන්න</td>
  </tr>
  <tr>
    <td width="39%" align="right">&nbsp;</td>
    <td width="1%" align="center">&nbsp;</td>
    <td width="60%" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">පුහුණු වැඩ සටහන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="trname" value="<?Php echo $rowatp["atp_trname"]; ?>" readonly="readonly" />
      </td>
  </tr>
  <tr>
    <td align="right">ජාතික හැඳුනුම්පත් අංකය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="nid" value="<?Php echo $rowstf["stf_Nid"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">නිලධාරියාගේ නම</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="ofname" value="<?Php echo $rowstf["stf_Name"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">තනතුර</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="ofdesig" value="<?Php echo $rowstf["stf_desig"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">කාර්යාලය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="office" value="<?Php echo $rowstf["stf_office"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">ජංගම දුරකතන අංකය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="mobile" value="<?Php  echo $rowstf["stf_mobile"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">ඊමේල් ලිපිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="email" value="<?Php echo $rowstf["stf_email"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">පාඨමාලාව ආරම්භ වන දිනය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="trsdate" value="<?Php echo $rowatp["atp_day1"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">පැවැත්වෙන දින ගණන</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="trnoofdates" value="<?Php echo $rowatp["atp_noofdays"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">පැවැත්වෙන ස්ථානය</td>
    <td align="center">&nbsp;</td>
    <td align="left"><input type="text" name="trlocation" value="<?Php echo $rowatp["atp_location"]; ?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right">මෙම පුහුණු වැඩ සටහන මෙම නිලධාරියාට සෘජුවම අදාල වේද?</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    	<span id="spryradio1">
    	<label>
    	  <input type="radio" name="RadioGroup1" value="ඔව්" id="RadioGroup1_0" checked="checked" />
    	  ඔව්</label>
    	
    	<label>
    	  <input type="radio" name="RadioGroup1" value="නැත" id="RadioGroup1_1"  />
   	    නැත</label>
    	
   	  <span class="radioRequiredMsg">කරුණාකර තෝරන්න</span></span></td>
  </tr>
  <tr>
    <td align="right">මෙම නිලධාරියාට ලබා දිය යුතු ප්‍රමුඛතාවය</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    	<select name="priority">
        	<option>1</option>
        	<option>2</option>
        	<option>3</option>
        	<option>4</option>
        	<option>5</option>
        	<option>6</option>
        	<option>7</option>
        	<option>8</option>
        	<option>9</option>
        	<option>10</option>
        	<option>11</option>
        	<option>12</option>
        	<option>13</option>
        	<option>14</option>
        	<option>15</option>
        	<option>16</option>
        	<option>17</option>
        	<option>18</option>
        	<option>19</option>
        	<option>20</option>
        	<option>21</option>
        	<option>22</option>
        	<option>23</option>
        	<option>24</option>
        	<option>25</option>
        	<option>26</option>
        	<option>27</option>
        	<option>28</option>
        	<option>29</option>
        	<option>30</option>
        	<option>31</option>
        	<option>32</option>
        	<option>33</option>
        	<option>34</option>
        	<option>35</option>
        	<option>36</option>
        	<option>37</option>
        	<option>38</option>
        	<option>39</option>
        	<option>40</option>
        	<option>41</option>
        	<option>42</option>
        	<option>43</option>
        	<option>44</option>
        	<option>45</option>
        	<option>46</option>
        	<option>47</option>
        	<option>48</option>
        	<option>49</option>
        	<option>50</option>

        </select>
    </td>
  </tr>
  <tr>
    <td align="right">නවාතැන් පහසුකම් අවශ්‍යද?</td>
    <td align="center">&nbsp;</td>
    <td align="left"><span id="spryradio2">
      <label>
        <input type="radio" name="RadioGroup2" value="ඔව්" id="RadioGroup2_0" />
        ඔව්</label>
     
      <label>
        <input type="radio" name="RadioGroup2" value="නැත" id="RadioGroup2_1" checked="checked" />
        නැත</label>
      
      <span class="radioRequiredMsg">කරුණාකර තෝරන්න</span></span></td>
  </tr>
 <!-- <tr>
    <td align="right">ලබා ගැනීමට කැමති ආහාර වර්ගය</td>
    <td align="center">&nbsp;</td>
    <td align="left">
    	<select name="diet">
        	<option></option>
        	<option>මස්</option>
        	<option>මාළු</option>
        	<option>බිත්තර</option>
        	<option>එළවළු</option>

        </select>
    </td>
  </tr>
  
  -->
  <tr>
    <td align="right">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="submit" value=" අයදුම් කරන්න " /></td>
  </tr>
</table>
</form>
<script type="text/javascript">
var spryradio1 = new Spry.Widget.ValidationRadio("spryradio1");
var spryradio2 = new Spry.Widget.ValidationRadio("spryradio2");
</script>
</body>
</html>