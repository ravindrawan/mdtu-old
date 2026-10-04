<?php 
include 'db_config.php'; 
?>

<!DOCTYPE html>
<html lang="si">
<head>
<meta charset="UTF-8">
<script src="https://cdn.tailwindcss.com"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Sinhala:wght@400;700&display=swap" rel="stylesheet">

<style>
body { font-family: 'Noto Sans Sinhala', sans-serif; }
</style>
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-5xl mx-auto p-6">

    <!-- FILTER -->
    <div class="bg-white p-6 rounded-xl shadow mb-6">
        <form method="GET" class="flex gap-4 items-end">

            <div>
                <label class="block text-sm font-bold mb-2">වසර</label>
                <select name="year" class="border p-3 rounded-lg">
                    <?php
                    $curYear = date('Y');
                    for($i=$curYear; $i>=2020; $i--) {
                        $sel = (isset($_GET['year']) && $_GET['year'] == $i) ? 'selected' : '';
                        echo "<option value='$i' $sel>$i</option>";
                    }
                    ?>
                </select>
            </div>

            <button class="bg-blue-600 text-white px-5 py-3 rounded-lg">
                සොයන්න
            </button>

        </form>
    </div>

<?php
if(isset($_GET['year'])):

$year = $_GET['year'];

$sql = "SELECT tapp_trname, COUNT(DISTINCT tapp_officerNid) AS total
        FROM cp_trainingapplications
        WHERE YEAR(tapp_trstartdate) = '$year'
        GROUP BY tapp_trname
        ORDER BY total DESC";

$result = $con->query($sql);

$labels = [];
$data = [];
?>

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-xl font-bold mb-4">
            <?php echo $year; ?> වසරේ පාඨමාලා වාර්තාව
        </h2>

        <!-- TABLE -->
        <table class="w-full text-left mb-6">
            <thead class="border-b font-bold text-gray-600">
                <tr>
                    <th class="py-2">පාඨමාලාව</th>
                    <th class="py-2 text-right">ඉල්ලුම් කළ සංඛ්‍යාව</th>
                </tr>
            </thead>
            <tbody>

            <?php while($row = $result->fetch_assoc()): 
                $labels[] = $row['tapp_trname'];
                $data[] = $row['total'];
            ?>
                <tr class="border-b">
                    <td class="py-2"><?php echo $row['tapp_trname']; ?></td>
                    <td class="py-2 text-right font-bold text-blue-600">
                        <?php echo $row['total']; ?>
                    </td>
                </tr>
            <?php endwhile; ?>

            </tbody>
        </table>

        <!-- CHART -->
        <canvas id="chart"></canvas>

    </div>

<script>
const ctx = document.getElementById('chart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Participants',
            data: <?php echo json_encode($data); ?>
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        }
    }
});
</script>

<?php endif; ?>

</div>
</body>
</html>