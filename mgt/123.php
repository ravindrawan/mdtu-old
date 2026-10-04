<?php 
include 'db_config.php'; 
// ??? ????? Header ?? ??????? ?????
//include 'header.php'; 
?>

<!DOCTYPE html>
<html lang="si">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Sans Sinhala', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

<div class="max-w-6xl mx-auto p-6">
    <div class="bg-white p-6 rounded-lg shadow-md mb-6 border-t-4 border-yellow-500">
        <form method="GET" class="flex items-end gap-4">
            <div>
                <label class="block text-sm font-bold mb-2">??? ??????</label>
                <select name="year" class="border p-2 rounded w-40">
                    <?php
                    $curYear = date('Y');
                    for($i=$curYear; $i>=2020; $i--) {
                        $sel = (isset($_GET['year']) && $_GET['year'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">??????</button>
        </form>
    </div>

    <?php
    if(isset($_GET['year'])):
        $year = $_GET['year'];
        $sql = "SELECT DISTINCT tapp_trname FROM cp_trainingapplications WHERE YEAR(tapp_trstartdate) = '$year'";
        $result = $con->query($sql);

        if($result->num_rows > 0):
            while($row = $result->fetch_assoc()):
                $tr_name = $row['tapp_trname'];
                
                // ?????? ??? ?????
                $details_sql = "SELECT tapp_office, tapp_officerNid FROM cp_trainingapplications WHERE tapp_trname = '$tr_name' AND YEAR(tapp_trstartdate) = '$year'";
                $details_res = $con->query($details_sql);
                $count = $details_res->num_rows;
    ?>
                <div class="bg-white mb-6 rounded-lg shadow overflow-hidden border border-gray-200">
                    <div class="bg-gray-800 text-white p-4 font-bold">
                        <?php echo $tr_name; ?>
                    </div>
                    <div class="p-4">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b">
                                    <th class="p-2 border">???????? (tapp_office)</th>
                                    <th class="p-2 border">NIC ????</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($d = $details_res->fetch_assoc()): ?>
                                <tr class="border-b hover:bg-yellow-50">
                                    <td class="p-2 border"><?php echo $d['tapp_office']; ?></td>
                                    <td class="p-2 border font-mono"><?php echo $d['tapp_officerNid']; ?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <div class="mt-3 text-right font-bold text-blue-800">
                            ???? ????????: <?php echo $count; ?>
                        </div>
                    </div>
                </div>
    <?php 
            endwhile;
        else:
            echo "<div class='bg-white p-6 rounded shadow text-center'>???? ??????? ??? ?????.</div>";
        endif;
    endif; 
    ?>
</div>
</body>
</html>