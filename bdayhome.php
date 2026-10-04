<?php
@include_once "db.php";

$todayMD = date("m-d");
$bdayStaff = [];

if (isset($con) && $con && !$con->connect_error) {
    $sql = "SELECT * FROM cp_staff ORDER BY stf_office ASC";
    $rs = @mysqli_query($con, $sql);
    if ($rs && mysqli_num_rows($rs) > 0) {
        while ($row = mysqli_fetch_assoc($rs)) {
            if (!empty($row["stf_dob"])) {
                $dobMD = substr($row["stf_dob"], 5); // MM-DD
                if ($dobMD === $todayMD) {
                    $bdayStaff[] = $row;
                }
            }
        }
    }
}
?>

<div class="birthday-widget-container">
  <?php if (!empty($bdayStaff)): ?>
    <div class="bday-list">
      <?php foreach ($bdayStaff as $staff): ?>
        <div class="bday-person-card">
          <div class="bday-icon-circle">&#127874;</div>
          <div class="bday-info">
            <h4 class="bday-name"><?php echo htmlspecialchars($staff["stf_Name"]); ?></h4>
            <span class="bday-office"><?php echo htmlspecialchars($staff["stf_office"]); ?></span>
          </div>
          <span class="bday-wishes-badge">සුභ උපන්දිනයක්!</span>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="bday-empty-row">
      <span class="bday-empty-icon">&#127881;</span>
      <span class="bday-empty-text">අද දින (<?php echo date('Y-m-d'); ?>) උපන් දින සමරන නිලධාරීන් නොමැත.</span>
    </div>
  <?php endif; ?>
</div>

<style>
.birthday-widget-container {
  width: 100%;
  font-family: 'Noto Sans Sinhala', 'Inter', sans-serif;
}

.bday-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  width: 100%;
}

.bday-person-card {
  display: flex;
  align-items: center;
  gap: 14px;
  background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
  border: 1px solid #fde68a;
  border-radius: 12px;
  padding: 12px 18px;
}

.bday-icon-circle {
  font-size: 1.5rem;
  width: 44px;
  height: 44px;
  background: #ffffff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 6px rgba(245, 158, 11, 0.2);
}

.bday-info {
  flex: 1;
}

.bday-name {
  margin: 0;
  font-size: 1rem;
  font-weight: 700;
  color: #78350f;
}

.bday-office {
  font-size: 0.82rem;
  color: #92400e;
}

.bday-wishes-badge {
  background: #f59e0b;
  color: #ffffff;
  font-size: 0.75rem;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 20px;
}

.bday-empty-row {
  display: flex;
  align-items: center;
  gap: 10px;
  padding: 14px 18px;
  background: #f8fafc;
  border-radius: 12px;
  border: 1px dashed #cbd5e1;
  width: 100%;
}

.bday-empty-icon {
  font-size: 1.3rem;
}

.bday-empty-text {
  font-size: 0.9rem;
  color: #64748b;
  font-weight: 500;
}
</style>