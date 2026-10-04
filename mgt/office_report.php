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
<body class="bg-slate-100 min-h-screen">
<div class="max-w-6xl mx-auto px-6 pt-6 no-print">
    <a href="index.php" class="inline-flex items-center gap-2 bg-white text-slate-700 font-bold py-2 px-5 rounded-xl shadow-sm border border-slate-200 hover:bg-slate-50 hover:shadow-md transition-all active:scale-95 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
           ආපසු මුල් පිටුවට (Back)
    </a>
</div>
<div class="max-w-6xl mx-auto p-6">
    <div class="bg-white p-8 rounded-xl shadow-md mb-8 border-l-8 border-blue-600">
        <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-6 items-end">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">කාර්යාලය තෝරන්න</label>
                <select name="office" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50" required>
                    <option value="">-- තෝරන්න --</option>
                    <?php
                    $off_sql = "SELECT DISTINCT tapp_office FROM cp_trainingapplications ORDER BY tapp_office ASC";
                    $off_res = $con->query($off_sql);
                    while($off = $off_res->fetch_assoc()) {
                        $selected = (isset($_GET['office']) && $_GET['office'] == $off['tapp_office']) ? 'selected' : '';
                        echo "<option value='{$off['tapp_office']}' $selected>{$off['tapp_office']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">වසර</label>
                <select name="year" class="w-full border border-gray-300 p-3 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-gray-50">
                    <?php
                    $curYear = date('Y');
                    for($i=$curYear; $i>=2020; $i--) {
                        $sel = (isset($_GET['year']) && $_GET['year'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i වසර</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 text-white font-bold p-3 rounded-lg hover:bg-blue-700 shadow-lg transition duration-200">සොයන්න</button>
        </form>
    </div>

    <?php
    if(isset($_GET['office']) && isset($_GET['year'])):
        $office = mysqli_real_escape_string($con, $_GET['office']);
        $year = mysqli_real_escape_string($con, $_GET['year']);

        // 1. තෝරාගත් කාර්යාලයේ සිටින නිලධාරීන් ලැයිස්තුව ලබා ගැනීම
        $officer_sql = "SELECT DISTINCT t.tapp_officerNid, s.stf_Name 
                        FROM cp_trainingapplications t 
                        LEFT JOIN cp_staff s ON t.tapp_officerNid = s.stf_Nid 
                        WHERE t.tapp_office = '$office' AND YEAR(t.tapp_trstartdate) = '$year'";
        
        $officer_res = $con->query($officer_sql);

        if($officer_res && $officer_res->num_rows > 0):
            echo "<h2 class='text-2xl font-bold text-slate-800 mb-6 border-b-2 border-blue-200 pb-2'>$office - $year වාර්තාව</h2>";
            
            while($officer = $officer_res->fetch_assoc()):
                $nid = $officer['tapp_officerNid'];
                $name = $officer['stf_Name'] ? $officer['stf_Name'] : "නම ඇතුළත් කර නැත";

                // 2. එක් එක් නිලධාරියාට අදාළ පුහුණු වැඩසටහන් ලබා ගැනීම
                $prog_sql = "SELECT tapp_trname, tapp_trstartdate 
                             FROM cp_trainingapplications 
                             WHERE tapp_officerNid = '$nid' AND YEAR(tapp_trstartdate) = '$year' 
                             ORDER BY tapp_trstartdate ASC";
                $prog_res = $con->query($prog_sql);
                $prog_count = $prog_res->num_rows;
    ?>
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
                    <div class="bg-slate-700 p-4 flex justify-between items-center text-white">
                        <div>
                            <span class="text-xs uppercase font-bold text-slate-400 block mb-1">නිලධාරියාගේ නම</span>
                            <span class="text-lg font-bold"><?php echo $name; ?></span>
                        </div>
                        <div class="text-right">
                            <span class="text-xs uppercase font-bold text-slate-400 block mb-1 text-right">NIC අංකය</span>
                            <span class="font-mono text-blue-300"><?php echo $nid; ?></span>
                        </div>
                    </div>

                    <div class="p-5">
                        <table class="w-full text-left">
                            <thead class="text-xs font-bold text-gray-400 uppercase border-b">
                                <tr>
                                    <th class="pb-3">සහභාගී වූ පුහුණු වැඩසටහන</th>
                                    <th class="pb-3 text-right">දිනය</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <?php while($p = $prog_res->fetch_assoc()): ?>
                                <tr>
                                    <td class="py-3 font-medium text-gray-800"><?php echo $p['tapp_trname']; ?></td>
                                    <td class="py-3 text-right text-gray-600 font-bold"><?php echo $p['tapp_trstartdate']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        
                        <div class="mt-4 pt-3 border-t flex justify-end">
                            <span class="text-sm font-bold text-blue-600 bg-blue-50 px-4 py-1 rounded-full border border-blue-100">
                                සම්පූර්ණ වැඩසටහන් ගණන: <?php echo $prog_count; ?>
                            </span>
                        </div>
                    </div>
                </div>
    <?php 
            endwhile;
        else:
            echo "<div class='bg-white p-10 rounded-xl shadow text-center border-2 border-dashed border-gray-200 text-gray-500'>දත්ත හමු නොවීය.</div>";
        endif;
    endif; 
    ?>
</div>

</body>
</html>