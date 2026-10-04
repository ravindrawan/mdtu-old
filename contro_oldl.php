<?Php
	session_start(); //To use the SESSION variable

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/cp.css" rel="stylesheet" type="text/css" />
<title>Management Development & Training Unit - Wayamba Provincial Council</title>
</head>

<body>

<table width="100%" border="0" style="position:relative;border-collapse:collapse">
  <tr>
    <td><?php include('header.php');?></td>
  </tr>
  <tr>
    <td>
<!-- ********************** Control Panel Icons ********************************************** -->
<table width="100%" border="0">
	<?Php if($_SESSION['logtype']=="Administrator"){ ?>
  <tr id="imglink">
    <td width="6%" valign="middle" align="right" style="background-color:#cee2f4"><img src="images/control.png" width="50" height="50" alt="control" /></td>
    <td width="20%" valign="middle" style="background-color:#cee2f4">&nbsp; පාලනය</td>
    <td align="center"><a href="designations.php"><img src="images/designations.png" width="50" height="50" alt="designations" /></a></td>
    <td align="center"><a href="offices.php"><img src="images/office.png" width="50" height="50" alt="office" /></a></td>
    <td align="center"><a href="useraccounts.php"><img src="images/users.png" width="50" height="50" alt="users" /></a></td>
    <td align="center"><a href="trainingprograms.php"><img src="images/trainings.png" width="50" height="50" alt="training programmes" /></a></td>
    <td align="center"><a href="trainingfields.php"><img src="images/subjects.png" width="50" height="50" alt="subjects areas" /></a></td>
    <td align="center"><a href="treqdays.php"><img src="images/timeframe.png" width="50" height="50" alt="timeframe" /></a></td>
  </tr>
  <tr valign="top" id="normallink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td width="14%" align="center"><a href="designations.php">තනතුරු</a></td>
    <td width="12%" align="center"><a href="offices.php">කාර්යාල</a></td>
    <td width="12%" align="center"><a href="useraccounts.php">පරිශීලක ගිණුම්</a></td>
    <td width="12%" align="center"><a href="trainingprograms.php">පුහුණු වැඩ සටහන්</a></td>
    <td width="12%" align="center"><a href="trainingfields.php">විෂය ක්ෂේත්‍රයන්</a></td>
    <td width="12%" align="center"><a href="treqdays.php">පුහුණු ඉල්ලීම් ඇතුලත් කරන කාල සීමාව</a></td>
  </tr>
  <tr>
    <td  style="background-color:#cee2f4">&nbsp;</td>
     <td  style="background-color:#cee2f4">&nbsp;</td>
     <td >&nbsp;</td>
      <td >&nbsp;</td>
       <td >&nbsp;</td>
        <td >&nbsp;</td>
         <td >&nbsp;</td>
          <td >&nbsp;</td>
    </tr>
  <tr id="imglink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"><a href="slideshowimages.php"><img src="images/photos.png" width="50" height="50" alt="Photos" /></a></td>
    <td align="center"><a href="usercomments.php"><img src="images/comments.png" width="50" height="50" alt="comments" /></a></td>
    <td align="center"><a href="downloads.php"><img src="images/download.png" width="50" height="50" alt="downloads" /></a></td>
    <td align="center"><a href="services.php"><img src="images/services.png" width="50" height="50" alt="services" /></a></td>
    <td align="center"><a href="trainingcenters.php"><img src="images/centers.png" width="50" height="50" alt="centers" /></a></td>
    <td align="center"><a href="fundsources.php"><img src="images/funds.png" width="50" height="50" alt="centers" /></a></td>
  </tr>
  <tr valign="top" id="normallink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"><a href="slideshowimages.php">මුල් පිටුවේ ඡායාරූප වෙනස් කිරීම</a></td>
    <td align="center"><a href="usercomments.php">අදහස් හා යෝජනා</a></td>
    <td align="center"><a href="downloads.php">බාගතකිරීම් ඇතුලත් කිරීම</a></td>
    <td align="center"><a href="services.php">සේවාවන් ඇතුලත් කිරීම</a></td>
    <td align="center"><a href="trainingcenters.php">පුහුණු මධ්‍යස්ථාන ඇතුලත් කිරීම</a></td>
    <td align="center"><a href="fundsources.php">මූල්‍ය ප්‍රභවයන් අතුලත් කිරීම</a></td>
  </tr>
  <tr>
    <td  style="background-color:#cee2f4">&nbsp;</td>
     <td  style="background-color:#cee2f4">&nbsp;</td>
     <td >&nbsp;</td>
      <td >&nbsp;</td>
       <td >&nbsp;</td>
        <td >&nbsp;</td>
         <td >&nbsp;</td>
          <td >&nbsp;</td>
    </tr>
  
   <tr id="imglink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"><a href="messages.php"><img src="images/messages.png" width="50" height="50" alt="Photos" /></a></td>
    <td align="center"><a href="food.php"><img src="images/food.png" width="50" height="50" alt="Photos" /></a></td>
    <td align="center"><a href="foreignschols.php"><img src="images/foreignscholarships.png" width="50" height="50" alt="Photos" /></a></td>
    <td align="center"><a href="outsidetrns.php"><img src="images/privatetrainings.png" width="50" height="50" alt="Photos" /></a></td>
    <td align="center"><a href="fscholapplyemp.php"><img src="images/scholofficers.png" width="50" height="50" alt="scholarshipofficers" /></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="top" id="normallink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"><a href="messages.php">නිවේදන ඇතුලත් කිරීම</a></td>
    <td align="center"><a href="food.php">ආහාර පාන ඇතුලත් කිරීම</a></td>
    <td align="center"><a href="foreignschols.php">විදේශ ශිෂ්‍යත්ව වැඩ සටහන්</a></td>
    <td align="center"><a href="outsidetrns.php">බාහිර ආයතන මගින් පවත්වන පුහුණු වැඩ සටහන්</a></td>
    <td align="center"><a href="fscholapplyemp.php">විදේශ ශිෂ්‍යත්ව සඳහා අයදුම් කල නිලධාරීන්</a></td>
    <td align="center">&nbsp;</td>
  </tr>

  <tr>
    <td colspan="8" style="background-color:#cee2f4"><hr /></td>
    </tr>
    <?Php } ?>
  <tr>
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr id="imglink">
    <td align="right" style="background-color:#cee2f4"><img src="images/trainingplan.png" width="50" height="50" alt="Training plan" /></td>
    <td style="background-color:#cee2f4">&nbsp; පුහුණු සැලැස්ම</td>
    <td align="center"><a href="trneeds.php"><img src="images/trainingrequirements.png" width="50" height="50" alt="training requirements" /></a></td>
    <td align="center"><a href="trd.php"><img src="images/trdate.png" width="50" height="50" alt="training requirements" /></a></td>
    <td align="center"><a href="createatp.php">
    <img src="images/preplan.png" width="50" height="52" alt="preparing training plan" /></a></td>
    <td align="center"><a href="editatp.php">
    <img src="images/changeplan.png" width="50" height="50" alt="change training plan" /></a></td>
    <td align="center"><a href="applytrs.php"><img src="images/applytr.png" width="50" height="50" alt="apply for trainings" /></a></td>
   <td align="center" id="imglink"><a href="resourcepersons.php">
    <img src="images/resourcepersons.png" width="50" height="50" alt="resource persons" /></a></td>
  </tr>
  <tr valign="top" id="normallink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"><a href="trneeds.php">පුහුණු අවශ්‍යතා</a></td>
    <td align="center"><a href="trd.php">පුහුණු අවශ්‍යතා ලබා ගැනීමේ අවසන් දිනය</a></td>
    <td align="center"><a href="createatp.php">පුහුණු සැලැස්ම සැකසීම</a></td>
    <td align="center"><a href="editatp.php">පුහුණු සැලැස්ම වෙනස් කිරීම</a></td>
    <td align="center"><a href="applytrs.php">පුහුණු වැඩ සටහන් සඳහා අයදුම් කිරීම</a></td>
     <td align="center" id="normallink"><a href="resourcepersons.php">සම්පත්දායක සංචිතය</a></td>
  </tr>
  <tr>
    <td colspan="8" style="background-color:#cee2f4"><hr /></td>
    </tr>
  <tr>
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr  id="imglink">
    <td align="right" style="background-color:#cee2f4"><img src="images/conducttraiings.png" width="50" height="50" alt="conducting trainings" /></td>
    <td style="background-color:#cee2f4">&nbsp; පුහුණු වැඩමුළු ක්‍රියාත්මක කිරීම</td>
    <td align="center"><a href="trapplications.php"><img src="images/applications.png" width="50" height="50" alt="applications" /></a></td>
    <td align="center"><a href="upcomingtrainings.php">
    <img src="images/trp.png" width="50" height="50" alt="training programs" /></a></td>
    <td align="center"><a href="trcandidates.php">
    <img src="images/selected.png" width="50" height="50" alt="selected employees" /></a></td>
    <td align="center"><a href="finishedtrainings.php">
    <img src="images/complete.png" width="50" height="50" alt="complete" /></a></td>
    <td align="center"><a href="appliedprivatetranings.php"><img src="images/pts.png" width="50" height="50" alt="funds" /></a></td>
    <td align="center"><a href="othertrns.php"><img src="images/othertrns.png" width="50" height="50" alt="funds" /></a></td>
  </tr>
  <tr valign="top"  id="normallink">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"><a href="trapplications.php">ඉදිරිපත් කර ඇති අයදුම්පත්‍ර</a></td>
    <td align="center"><a href="upcomingtrainings.php">පැවැත්වීමට නියමිත පුහුණු වැඩ සටහන්</a></td>
    <td align="center"><a href="trcandidates.php">පුහුණු වැඩමුළු සඳහා තෝරාගත් නිලධාරීන්</a></td>
    <td align="center"><a href="finishedtrainings.php">පුහුණු වැඩ සටහන් අවසන් කිරීම</a></td>
    <td align="center"><a href="appliedprivatetranings.php">බාහිර පුහුණු පාඨමාලා සඳහා ප්‍රතිපාදන ලබා දීම</a></td>
    <td align="center"><a href="othertrns.php">වෙනත් කාර්යාල/දෙපාර්තමේන්තු මගින් පැවැත්වූ පුහුණ වැඩ සටහන්</a></td>
  </tr>
  <tr>
    <td colspan="8" style="background-color:#cee2f4"><hr /></td>
    </tr>
  <tr>
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <?Php if($_SESSION['logtype']=="Administrator"){ ?>
  <tr>
    <td align="right" style="background-color:#cee2f4"><img src="images/employees.png" width="50" height="50" alt="employees" /></td>
    <td style="background-color:#cee2f4">&nbsp; කාර්යමණ්ඩලය</td>
    <td align="center" id="imglink"><a href="staffs.php"><img src="images/addemployee.png" width="50" height="50" alt="add employee" /></a></td>
    <td align="center" id="imglink"><a href="resourcepersons.php">
    <img src="images/resourcepersons.png" width="50" height="50" alt="resource persons" /></a></td>
    <td align="center" id="imglink"><a href="blackliststaff.php"><img src="images/blacklist.png" width="50" height="50" alt="blacklist" /></a></td>
    <td align="center" id="imglink"><a href="addtrainingofficers.php"><img src="images/subjectofficers.png" width="50" height="50" alt="subject officers" /></a></td>
    <td align="center" id="imglink"><a href="fschols.php"><img src="images/foriegnscholars.png" width="50" height="50" alt="subject officers" /></a></td>
    <td align="center" id="imglink"><a href="birthdays.php"><img src="images/birthdays.png" width="50" height="50" alt="subject officers" /></a></td>
  </tr>
  <tr valign="top">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center" id="normallink"><a href="staffs.php">කාර්යමණ්ඩලය ඇතුලත් කිරීම</a></td>
    <td align="center" id="normallink"><a href="resourcepersons.php">සම්පත්දායක සංචිතය</a></td>
    <td align="center" id="normallink"><a href="blackliststaff.php">අසාදුලේඛන ගතවූ නිලධාරීන්</a></td>
    <td align="center" id="normallink"><a href="addtrainingofficers.php">පුහුණු විෂයභාර නිලධාරීන්</a></td>
    <td align="center" id="normallink"><a href="fschols.php">විදේශ ශිෂ්‍යත්ව සඳහා සහභාගී වූ නිලධාරීන්</a></td>
    <td align="center" id="normallink"><a href="birthdays.php">අද දින උපන්දිනය සමරන නිලධාරීන්</a></td>
  </tr>
  <tr>
    <td colspan="8" style="background-color:#cee2f4"><hr /></td>
    </tr>
  <tr>
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" style="background-color:#cee2f4"><img src="images/reports.png" width="50" height="50" alt="reports" /></td>
    <td style="background-color:#cee2f4">&nbsp; වාර්තා</td>
    <td align="center"  id="imglink"><a href="annualtrainingplan.php" target="new"><img src="images/antrpl.png" width="50" height="50" alt="annual training plan" /></a></td>
    <td align="center"  id="imglink"><a href="budjetatp.php" target="new"><img src="images/budjrept.png" width="50" height="50" alt="annual training plan" /></a></td>

    <td align="center"  id="imglink"><a href="completedtrainings.php"><img src="images/completed.png" width="50" height="50" alt="completed trainings" /></a></td>
    <td align="center"  id="imglink"><a href="reportpvttrns.php"><img src="images/ptras.png" width="50" height="50" alt="private trainings" /></a></td>
    <td align="center"  id="imglink"><a href="fulldetailsoftrainings.php"><img src="images/training details.png" width="50" height="50" alt="trainng details" /></a></td>
    <td align="center"  id="imglink"><a href="trsummary.php"><img src="images/summary.png" width="50" height="50" alt="training summary" /></a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr valign="top">
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center"  id="normallink"><a href="annualtrainingplan.php"  target="new">වාර්ෂික පුහුණු සැලැස්ම</a></td>
    <td align="center"  id="normallink"><a href="budjetatp.php"  target="new">වියදම් ඇස්තමේන්තුව සහිත වාර්ෂික පුහුණු සැලැස්ම</a></td>

    <td align="center"  id="normallink"><a href="completedtrainings.php">පවත්වන ලද පුහුණු වැඩ සටහන්</a></td>
    <td align="center"  id="normallink"><a href="reportpvttrns.php">ප්‍රතිපාදන සපයන ලද පුද්ගලික පුහුණු පාඨමාලා</a></td>
    <td align="center"  id="normallink"><a href="fulldetailsoftrainings.php">පුහුණු වැඩ සටහන් පිළිබඳ විස්තර</a></td>
    <td align="center"  id="normallink"><a href="trsummary.php">පාඨමාලා සාරාංශය</a></td>
    <td align="center">&nbsp;</td>
  </tr>
  <?Php } ?>
  <tr>
    <td colspan="2" style="background-color:#cee2f4">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<!-- ********************** End of Control Panel Icons ********************************************** -->
    </td>
  </tr>
  <tr>
    <td style="background-color:#000"><?php include('footer.php');?></td>
  </tr>

</table>

</body>
</html>