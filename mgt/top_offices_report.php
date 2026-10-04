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
<body class="bg-slate-50 min-h-screen">

<div class="max-w-6xl mx-auto px-6 pt-6 no-print">
    <a href="index.php" class="inline-flex items-center gap-2 bg-white text-slate-700 font-bold py-2 px-5 rounded-xl shadow-sm border border-slate-200 hover:bg-slate-50 hover:shadow-md transition-all active:scale-95 group">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
       ආපසු මුල් පිටුවට (Back)
    </a>
</div>


<div class="max-w-4xl mx-auto p-6">
    <div class="mb-8 text-center">
        <h2 class="text-3xl font-black text-slate-800">පුහුණු සහභාගීත්ව විශ්ලේෂණය</h2>
        <p class="text-slate-500 mt-2">වැඩිම සහභාගීත්වයක් සහිත කාර්යාල වර්ගීකරණය</p>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 mb-8">
        <form method="GET" class="flex items-end justify-center gap-4">
            <div class="w-64">
                <label class="block text-sm font-bold text-gray-600 mb-2">වර්ෂය තෝරන්න</label>
                <select name="year" class="w-full border border-gray-300 p-3 rounded-xl focus:ring-2 focus:ring-orange-500 outline-none bg-slate-50">
                    <?php
                    $curYear = date('Y');
                    for($i=$curYear; $i>=2020; $i--) {
                        $sel = (isset($_GET['year']) && $_GET['year'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i වසර</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="bg-orange-500 text-white font-bold px-8 py-3.5 rounded-xl hover:bg-orange-600 shadow-lg shadow-orange-100 transition-all active:scale-95">
                දත්ත පෙන්වන්න
            </button>
        </form>
    </div>

    <?php
    if(isset($_GET['year'])):
        $year = mysqli_real_escape_string($con, $_GET['year']);

        // කාර්යාල අනුව Count එක ගෙන Sort කිරීමේ Query එක
        $sql = "SELECT tapp_office, COUNT(*) as total_count 
                FROM cp_trainingapplications 
                WHERE YEAR(tapp_trstartdate) = '$year' 
                GROUP BY tapp_office 
                ORDER BY total_count DESC";
        
        $result = $con->query($sql);

        if($result && $result->num_rows > 0):
            $rank = 1;
    ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-800 text-white">
                            <th class="p-4 text-center w-20">ස්ථානය</th>
                            <th class="p-4">කාර්යාලය / සේවා ස්ථානය</th>
                            <th class="p-4 text-center">සහභාගී වූ වාර ගණන</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php while($row = $result->fetch_assoc()): 
                            // පළමු ස්ථාන 3 ට විශේෂ වර්ණ ලබා දීම
                            $rank_css = "text-gray-600";
                            if($rank == 1) $rank_css = "bg-yellow-400 text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto";
                            if($rank == 2) $rank_css = "bg-slate-300 text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto";
                            if($rank == 3) $rank_css = "bg-orange-300 text-white rounded-full w-8 h-8 flex items-center justify-center mx-auto";
                        ?>
                        <tr class="hover:bg-orange-50 transition-colors">
                            <td class="p-4 font-bold text-center">
                                <span class="<?php echo $rank_css; ?>"><?php echo $rank; ?></span>
                            </td>
                            <td class="p-4 text-gray-800 font-bold"><?php echo $row['tapp_office']; ?></td>
                            <td class="p-4 text-center">
                                <span class="bg-orange-100 text-orange-700 px-4 py-1 rounded-full font-black">
                                    <?php echo $row['total_count']; ?>
                                </span>
                            </td>
                        </tr>
                        <?php $rank++; endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-sm text-gray-400 italic text-center">
                * මෙහි දැක්වෙන්නේ එක් එක් කාර්යාලයේ නිලධාරීන් සහභාගී වූ මුළු පුහුණු අවස්ථා සංඛ්‍යාවයි.
            </div>

    <?php 
        else:
            echo "<div class='bg-white p-12 rounded-2xl text-center text-gray-400 font-bold border-2 border-dashed'>දත්ත හමු නොවීය.</div>";
        endif;
    endif; 
    ?>
</div>

</body>
</html>