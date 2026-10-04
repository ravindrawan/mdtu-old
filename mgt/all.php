<?php 
// දත්ත පද්ධතියට සම්බන්ධ වීම
include 'db_config.php'; 

// සිංහල අකුරු ගැටලුව විසඳීමට මෙය අනිවාර්ය වේ
header('Content-Type: text/html; charset=utf-8');
ob_start();

// ඔබේ header.php එක සම්බන්ධ කිරීම
include 'header.php'; 

// header.php තුළ තිබිය හැකි වැරදි encoding වෙනස් කිරීම
$header_content = ob_get_clean();
echo str_replace('text/html; charset=utf-8', 'text/html; charset=UTF-8', $header_content);
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* සිංහල අකුරු ලස්සනට පෙන්වීමට */
        body { font-family: 'Noto Sans Sinhala', sans-serif; }
        .font-sinhala { font-family: 'Noto Sans Sinhala', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
<div class="max-w-6xl mx-auto px-6 pt-6 no-print">
    <a href="index.php" class="inline-flex items-center gap-2 bg-white text-slate-700 font-bold py-2 px-5 rounded-xl shadow-sm border border-slate-200 hover:bg-slate-50 hover:shadow-md transition-all active:scale-95 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        ආපසු මුල් පිටුවට (Back)
    </a>
</div>
<div class="max-w-6xl mx-auto p-6 font-sinhala">
    <div class="bg-white p-6 rounded-lg shadow-md mb-8 border-t-4 border-yellow-500">
        <form method="GET" class="flex flex-wrap items-end gap-4">
            <div class="flex flex-col">
                <label class="text-sm font-bold mb-2 text-gray-700">වසර තෝරන්න</label>
                <select name="year" class="border border-gray-300 p-2.5 rounded-lg w-48 focus:ring-2 focus:ring-blue-500 outline-none">
                    <?php
                    $curYear = date('Y');
                    for($i=$curYear; $i>=2020; $i--) {
                        $sel = (isset($_GET['year']) && $_GET['year'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i වසර</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-8 py-2.5 rounded-lg hover:bg-blue-700 font-bold shadow-md transition-all active:scale-95">
                සොයන්න
            </button>
        </form>
    </div>

    <?php
    if(isset($_GET['year'])):
        $year = mysqli_real_escape_string($con, $_GET['year']);
        
        // වැඩසටහන් නාමය සහ දිනය ලබා ගැනීම
        $sql = "SELECT DISTINCT tapp_trname, tapp_trstartdate FROM cp_trainingapplications WHERE YEAR(tapp_trstartdate) = '$year' ORDER BY tapp_trstartdate ASC";
        $result = $con->query($sql);

        if($result && $result->num_rows > 0):
            while($row = $result->fetch_assoc()):
                $tr_name = $row['tapp_trname'];
                $tr_date = $row['tapp_trstartdate'];
                
                // cp_staff ටේබල් එක සමඟ JOIN කර නම ලබා ගැනීම
                $details_sql = "SELECT t.tapp_office, t.tapp_officerNid, s.stf_Name 
                                FROM cp_trainingapplications t 
                                LEFT JOIN cp_staff s ON t.tapp_officerNid = s.stf_Nid 
                                WHERE t.tapp_trname = '".mysqli_real_escape_string($con, $tr_name)."' 
                                AND t.tapp_trstartdate = '$tr_date'";
                
                $details_res = $con->query($details_sql);
                $count = $details_res->num_rows;
    ?>
                <div class="bg-white mb-10 rounded-xl shadow-lg overflow-hidden border border-gray-200">
                    <div class="bg-slate-800 text-white p-5 flex flex-wrap justify-between items-center gap-4">
                        <h2 class="font-bold text-xl tracking-wide"><?php echo $tr_name; ?></h2>
                        <div class="bg-yellow-400 text-slate-900 px-4 py-1.5 rounded-full text-sm font-bold shadow-inner">
                            පැවැත්වූ දිනය: <?php echo $tr_date; ?>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse border border-gray-100">
                                <thead>
                                    <tr class="bg-slate-50 border-b-2 border-gray-200">
                                        <th class="p-4 text-slate-700 font-bold text-sm">නිලධාරියාගේ නම</th>
                                        <th class="p-4 text-slate-700 font-bold text-sm">කාර්යාලය / සේවා ස්ථානය</th>
                                        <th class="p-4 text-slate-700 font-bold text-sm text-right">NIC අංකය</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    <?php while($d = $details_res->fetch_assoc()): ?>
                                    <tr class="hover:bg-blue-50 transition-colors">
                                        <td class="p-4 text-gray-800 font-medium border-r border-gray-50 italic"><?php echo $d['stf_Name'] ? $d['stf_Name'] : 'නම ඇතුළත් කර නැත'; ?></td>
                                        <td class="p-4 text-gray-600 border-r border-gray-50"><?php echo $d['tapp_office']; ?></td>
                                        <td class="p-4 text-right font-mono text-blue-600 font-bold"><?php echo $d['tapp_officerNid']; ?></td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6 flex justify-end items-center">
                            <div class="bg-blue-50 border border-blue-200 px-6 py-2 rounded-lg">
                                <span class="text-blue-900 font-bold uppercase text-xs mr-2">මුළු සහභාගීත්වය:</span>
                                <span class="text-blue-700 font-extrabold text-lg"><?php echo $count; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
    <?php 
            endwhile;
        else:
            echo "<div class='bg-white p-12 rounded-xl shadow-inner text-center border-2 border-dashed border-gray-200 text-gray-400 font-bold'>තෝරාගත් වසර සඳහා දත්ත පද්ධතියේ කිසිදු වාර්තාවක් හමු නොවීය.</div>";
        endif;
    endif; 
    ?>
</div>

</body>
</html>