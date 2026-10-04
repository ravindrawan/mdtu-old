<?php 
include 'db_config.php'; 
header('Content-Type: text/html; charset=utf-8');
ob_start();
include 'header.php'; 
$header_content = ob_get_clean();
echo str_replace('text/html; charset=utf-8', 'text/html; charset=UTF-8', $header_content);
?>

<!DOCTYPE html>
<html lang="si">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Noto Sans Sinhala', sans-serif; }</style>
</head>
<body class="bg-gray-50 min-h-screen">
<div class="max-w-6xl mx-auto px-6 pt-6 no-print">
    <a href="index.php" class="inline-flex items-center gap-2 bg-white text-slate-700 font-bold py-2 px-5 rounded-xl shadow-sm border border-slate-200 hover:bg-slate-50 hover:shadow-md transition-all active:scale-95 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        ආපසු මුල් පිටුවට (Back)
    </a>
</div>
<div class="max-w-6xl mx-auto p-6">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 mb-8">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
            <div>
                <label class="block text-sm font-bold text-gray-600 mb-2">වර්ෂය</label>
                <select name="year" class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-slate-50">
                    <?php
                    $curYear = date('Y');
                    for($i=$curYear; $i>=2020; $i--) {
                        $sel = (isset($_GET['year']) && $_GET['year'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i වසර</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-600 mb-2">කාර්යාලය / සේවා ස්ථානය</label>
                <select name="office" class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-slate-50" required>
                    <option value="">-- තෝරන්න --</option>
                    <?php
                    $off_sql = "SELECT DISTINCT tapp_office FROM cp_trainingapplications ORDER BY tapp_office ASC";
                    $off_res = $con->query($off_sql);
                    while($off = $off_res->fetch_assoc()) {
                        $selected = (isset($_GET['office']) && $_GET['office'] == $off['tapp_office']) ? 'selected' : '';
                        echo "<option value='".htmlspecialchars($off['tapp_office'])."' $selected>{$off['tapp_office']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white font-bold p-3.5 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-100 transition-all active:scale-95">
                වාර්තාව ලබාගන්න
            </button>
        </form>
    </div>

    <?php
    if(isset($_GET['year']) && isset($_GET['office'])):
        $year = mysqli_real_escape_string($con, $_GET['year']);
        $office = mysqli_real_escape_string($con, $_GET['office']);

        // දත්ත ලබා ගැනීමේ Query එක (JOIN භාවිතයෙන්)
        $sql = "SELECT t.tapp_trname, t.tapp_trstartdate, t.tapp_officerNid, s.stf_Name 
                FROM cp_trainingapplications t 
                LEFT JOIN cp_staff s ON t.tapp_officerNid = s.stf_Nid 
                WHERE t.tapp_office = '$office' AND YEAR(t.tapp_trstartdate) = '$year' 
                ORDER BY t.tapp_trstartdate DESC";
        
        $result = $con->query($sql);
        $count = $result->num_rows;

        if($count > 0):
    ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-slate-800 p-5 flex justify-between items-center text-white">
                    <h3 class="text-lg font-bold"><?php echo $office; ?> - <?php echo $year; ?> වාර්තාව</h3>
                    <span class="bg-blue-500 px-4 py-1 rounded-full text-xs font-bold uppercase">ප්‍රතිඵල: <?php echo $count; ?></span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 border-b border-gray-200">
                                <th class="p-4 text-xs font-bold text-gray-500 uppercase">දිනය</th>
                                <th class="p-4 text-xs font-bold text-gray-500 uppercase">පුහුණු වැඩසටහනේ නම</th>
                                <th class="p-4 text-xs font-bold text-gray-500 uppercase">නිලධාරියාගේ නම</th>
                                <th class="p-4 text-xs font-bold text-gray-500 uppercase text-right">NIC අංකය</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-blue-50 transition-colors">
                                <td class="p-4 text-gray-600 font-bold whitespace-nowrap"><?php echo $row['tapp_trstartdate']; ?></td>
                                <td class="p-4 text-gray-800 font-semibold"><?php echo $row['tapp_trname']; ?></td>
                                <td class="p-4 text-gray-700 italic"><?php echo $row['stf_Name'] ? $row['stf_Name'] : 'නම ඇතුළත් කර නැත'; ?></td>
                                <td class="p-4 text-right font-mono text-blue-600 font-bold"><?php echo $row['tapp_officerNid']; ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

                <div class="p-6 bg-gray-50 border-t border-gray-100 flex justify-end">
                    <div class="text-right">
                        <span class="text-sm text-gray-500 block">මුළු සහභාගීත්වය (වාර්තා ගණන)</span>
                        <span class="text-3xl font-black text-slate-800"><?php echo $count; ?></span>
                    </div>
                </div>
            </div>

            <div class="mt-8 text-center no-print">
                <button onclick="window.print()" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold py-2 px-8 rounded-lg transition">
                    මෙම වාර්තාව මුද්‍රණය කරන්න (Print)
                </button>
            </div>

    <?php 
        else:
            echo "<div class='bg-white p-12 rounded-2xl shadow-sm text-center text-gray-400 font-bold border-2 border-dashed'>තෝරාගත් වසරේදී මෙම කාර්යාලය සඳහා පුහුණු වැඩසටහන් වාර්තා වී නොමැත.</div>";
        endif;
    endif; 
    ?>
</div>

<style>
    @media print {
        .no-print { display: none; }
        body { background: white; }
        .rounded-2xl { border-radius: 0; box-shadow: none; border: 1px solid #eee; }
    }
</style>

</body>
</html>