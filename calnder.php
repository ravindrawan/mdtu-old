<?php
@include_once "db.php";

$currentYear = date("Y");
$currentMonth = date("m");
$currentDay = intval(date("d"));

$firstDayTimestamp = strtotime("$currentYear-$currentMonth-01");
$daysInMonth = intval(date("t", $firstDayTimestamp));
$startDayOfWeek = intval(date("w", $firstDayTimestamp)); // 0 (Sun) to 6 (Sat)

$startDate = "$currentYear-$currentMonth-01";
$endDate = "$currentYear-$currentMonth-$daysInMonth";

$eventDays = [];
if (isset($con) && $con && !$con->connect_error) {
    $sql = "SELECT atp_day1, atp_trname FROM cp_atp WHERE (atp_day1 BETWEEN '$startDate' AND '$endDate') AND atp_addhome='ඔව්'";
    $rs = @mysqli_query($con, $sql);
    if ($rs && mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            $dayNum = intval(substr($row["atp_day1"], 8, 2));
            $eventDays[$dayNum][] = $row["atp_trname"];
        }
    }
}

$monthNamesSinhala = [
    "01" => "ජනවාරි", "02" => "පෙබරවාරි", "03" => "මාර්තු",
    "04" => "අප්‍රේල්", "05" => "මැයි", "06" => "ජූනි",
    "07" => "ජූලි", "08" => "අගෝස්තු", "09" => "සැප්තැම්බර්",
    "10" => "ඔක්තෝබර්", "11" => "නොවැම්බර්", "12" => "දෙසැම්බර්"
];
$sinhalaMonth = isset($monthNamesSinhala[$currentMonth]) ? $monthNamesSinhala[$currentMonth] : date("F");
?>

<div class="modern-calendar-widget">
  <div class="cal-header">
    <span class="cal-title"><?php echo $sinhalaMonth . " " . $currentYear; ?></span>
    <span class="cal-subtitle"><?php echo date("F Y"); ?></span>
  </div>

  <div class="cal-grid">
    <div class="cal-day-name sun">ඉරි</div>
    <div class="cal-day-name">සඳු</div>
    <div class="cal-day-name">අඟ</div>
    <div class="cal-day-name">බදා</div>
    <div class="cal-day-name">බ්‍රහ</div>
    <div class="cal-day-name">සිකු</div>
    <div class="cal-day-name sat">සෙන</div>

    <!-- Empty cells before first day of month -->
    <?php for ($b = 0; $b < $startDayOfWeek; $b++): ?>
      <div class="cal-cell empty"></div>
    <?php endfor; ?>

    <!-- Days of current month -->
    <?php for ($day = 1; $day <= $daysInMonth; $day++): ?>
      <?php
        $isToday = ($day === $currentDay);
        $hasEvent = isset($eventDays[$day]);
        $eventTitle = $hasEvent ? implode(" | ", $eventDays[$day]) : "";
      ?>
      <div 
        class="cal-cell <?php echo $isToday ? 'today' : ''; ?> <?php echo $hasEvent ? 'has-event' : ''; ?>"
        <?php if ($hasEvent): ?>title="<?php echo htmlspecialchars($eventTitle); ?>"<?php endif; ?>
      >
        <span class="day-number"><?php echo $day; ?></span>
        <?php if ($hasEvent): ?>
          <span class="event-indicator" title="<?php echo htmlspecialchars($eventTitle); ?>"></span>
        <?php endif; ?>
      </div>
    <?php endfor; ?>
  </div>

  <div class="cal-legend">
    <span class="legend-item"><span class="legend-dot today-dot"></span> අද දිනය</span>
    <span class="legend-item"><span class="legend-dot event-dot"></span> පුහුණු වැඩසටහන්</span>
  </div>
</div>

<style>
.modern-calendar-widget {
  width: 100%;
  font-family: 'Noto Sans Sinhala', 'Inter', sans-serif;
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.cal-header {
  display: flex;
  align-items: baseline;
  justify-content: space-between;
  padding-bottom: 10px;
  border-bottom: 1px solid #e2e8f0;
}

.cal-title {
  font-size: 1.05rem;
  font-weight: 700;
  color: #0f172a;
}

.cal-subtitle {
  font-size: 0.8rem;
  font-weight: 600;
  color: #64748b;
}

.cal-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 4px;
  text-align: center;
}

.cal-day-name {
  font-size: 0.75rem;
  font-weight: 700;
  color: #64748b;
  padding: 6px 0;
}

.cal-day-name.sun { color: #ef4444; }
.cal-day-name.sat { color: #3b82f6; }

.cal-cell {
  aspect-ratio: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  border-radius: 8px;
  font-size: 0.85rem;
  font-weight: 500;
  color: #1e293b;
  position: relative;
  transition: all 0.2s ease;
  cursor: default;
}

.cal-cell.empty {
  visibility: hidden;
}

.cal-cell:not(.empty):hover {
  background-color: #f1f5f9;
}

.cal-cell.today {
  background-color: #dbeafe;
  color: #1d4ed8;
  font-weight: 700;
}

.cal-cell.has-event {
  background-color: #eff6ff;
  border: 1px solid #93c5fd;
  color: #1e40af;
  font-weight: 700;
  cursor: pointer;
}

.cal-cell.has-event:hover {
  background-color: #3b82f6;
  color: #ffffff;
  transform: scale(1.08);
  box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
}

.event-indicator {
  position: absolute;
  bottom: 3px;
  width: 5px;
  height: 5px;
  background-color: #ef4444;
  border-radius: 50%;
}

.cal-cell.has-event:hover .event-indicator {
  background-color: #ffffff;
}

.cal-legend {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  padding-top: 6px;
  border-top: 1px solid #f1f5f9;
  font-size: 0.75rem;
  color: #64748b;
}

.legend-item {
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.legend-dot {
  width: 8px;
  height: 8px;
  border-radius: 50%;
}

.today-dot { background-color: #3b82f6; }
.event-dot { background-color: #ef4444; }
</style>