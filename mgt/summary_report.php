<?php 
include 'db_config.php'; 
header('Content-Type: text/html; charset=utf-8');
ob_start();
include 'header.php'; 
$header_content = ob_get_clean();
echo str_replace('text/html; charset=utf-8', 'text/html; charset=UTF-8', $header_content);

// වසර ලබා ගැනීම (Default current year)
$year = isset($_GET['year']) ? mysqli_real_escape_string($con, $_GET['year']) : date('Y');
$selected_office = isset($_GET['view_office']) ? mysqli_real_escape_string($con, $_GET['view_office']) : '';
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Noto Sans Sinhala', sans-serif; }</style>
</head>
<body class="bg-slate-50 min-h-screen pb-20">
<div class="max-w-6xl mx-auto px-6 pt-6 no-print">
    <a href="index.php" class="inline-flex items-center gap-2 bg-white text-slate-700 font-bold py-2 px-5 rounded-xl shadow-sm border border-slate-200 hover:bg-slate-50 hover:shadow-md transition-all active:scale-95 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
         ආපසු මුල් පිටුවට (Back)
    </a>
</div>





<div class="max-w-5xl mx-auto p-6">
    
    <div class="bg-white p-6 rounded-2xl shadow-sm mb-8 no-print">
        <form method="GET" class="flex items-end justify-center gap-4">
            <div class="w-48">
                <label class="block text-sm font-bold text-gray-600 mb-2">වර්ෂය තෝරන්න</label>
                <select name="year" onchange="this.form.submit()" class="w-full border border-gray-300 p-2.5 rounded-xl bg-slate-50">
                    <?php
                    for($i=date('Y'); $i>=2020; $i--) {
                        $sel = ($year == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i වසර</option>";
                    }
                    ?>
                </select>
            </div>
            <a href="summary_report.php?year=<?php echo $year; ?>" class="text-blue-600 font-bold text-sm mb-3 underline">ප්‍රසාරණය කරන්න (Reset)</a>
        </form>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden self-start">
            <div class="bg-slate-800 text-white p-4 font-bold text-center">
                සහභාගීත්වය අනුව කාර්යාල (<?php echo $year; ?>)
            </div>
            <table class="w-full text-left">
                <tbody class="divide-y divide-gray-100">
                    <?php
                    $summary_sql = "SELECT tapp_office, COUNT(*) as total FROM cp_trainingapplications 
                                    WHERE YEAR(tapp_trstartdate) = '$year' 
                                    GROUP BY tapp_office ORDER BY total DESC";
                    $summary_res = $con->query($summary_sql);
                    
                    while($row = $summary_res->fetch_assoc()):
                        $is_active = ($selected_office == $row['tapp_office']) ? 'bg-orange-100 border-l-4 border-orange-500' : '';
                    ?>
                    <tr class="hover:bg-slate-50 transition <?php echo $is_active; ?>">
                        <td class="p-4">
                            <a href="?year=<?php echo $year; ?>&view_office=<?php echo urlencode($row['tapp_office']); ?>" class="block">
                                <span class="text-slate-700 font-bold"><?php echo $row['tapp_office']; ?></span>
                            </a>
                        </td>
                        <td class="p-4 text-right">
                            <span class="bg-slate-100 text-slate-600 px-3 py-1 rounded-lg font-bold text-sm">
                                <?php echo $row['total']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
            <?php if($selected_office): ?>
                <div class="bg-orange-500 text-white p-4 font-bold">
                    <?php echo $selected_office; ?> - නිලධාරීන් ලැයිස්තුව
                </div>
                <div class="p-4">
                    <?php
                    $detail_sql = "SELECT t.tapp_trname, t.tapp_trstartdate, s.stf_Name 
                                   FROM cp_trainingapplications t 
                                   LEFT JOIN cp_staff s ON t.tapp_officerNid = s.stf_Nid 
                                   WHERE t.tapp_office = '$selected_office' AND YEAR(t.tapp_trstartdate) = '$year' 
                                   ORDER BY t.tapp_trstartdate DESC";
                    $detail_res = $con->query($detail_sql);
                    
                    if($detail_res->num_rows > 0):
                        while($det = $detail_res->fetch_assoc()):
                    ?>
                        <div class="mb-4 border-b border-gray-100 pb-3 last:border-0">
                            <p class="text-slate-800 font-bold text-sm mb-1"><?php echo $det['stf_Name'] ?: 'නම සඳහන් කර නැත'; ?></p>
                            <p class="text-xs text-blue-600 font-semibold"><?php echo $det['tapp_trname']; ?></p>
                            <p class="text-[10px] text-gray-400"><?php echo $det['tapp_trstartdate']; ?></p>
                        </div>
                    <?php 
                        endwhile;
                    else:
                        echo "<p class='text-gray-400 text-center py-10'>දත්ත නැත.</p>";
                    endif;
                    ?>
                </div>
            <?php else: ?>
                <div class="flex flex-col items-center justify-center h-64 text-gray-300 p-10 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="font-bold text-lg text-slate-400">විස්තර බැලීමට කාර්යාලයක් මත ක්ලික් කරන්න</p>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>

</body>
</html>