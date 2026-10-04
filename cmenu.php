<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="inner-nav-container">
  <div class="inner-nav-links">
    <a href="index.php" class="<?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">මුල් පිටුව</a>
    <a href="trainingprogramms.php" class="<?php echo ($currentPage == 'trainingprogramms.php') ? 'active' : ''; ?>">පුහුණු වැඩසටහන්</a>
    <a href="privatetrainings.php" class="<?php echo ($currentPage == 'privatetrainings.php') ? 'active' : ''; ?>">බාහිර පුහුණු පාඨමාලා</a>
    <a href="staffprofile.php" class="<?php echo ($currentPage == 'staffprofile.php') ? 'active' : ''; ?>">කාර්යමණ්ඩලය</a>
    <a href="usrdownloads.php" class="<?php echo ($currentPage == 'usrdownloads.php') ? 'active' : ''; ?>">බාගත කිරීම්</a>
    <a href="contactus.php" class="<?php echo ($currentPage == 'contactus.php') ? 'active' : ''; ?>">අමතන්න</a>
  </div>
</nav>

<style>
.inner-nav-container {
  width: 100%;
  background: #1e3a8a;
  padding: 6px 12px;
  font-family: 'Noto Sans Sinhala', 'Inter', sans-serif;
  border-radius: 8px;
}

.inner-nav-links {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 6px;
}

.inner-nav-links a {
  color: #e0e7ff !important;
  text-decoration: none !important;
  font-size: 14px;
  font-weight: 500;
  padding: 8px 14px;
  border-radius: 6px;
  transition: all 0.2s ease;
  white-space: nowrap;
}

.inner-nav-links a:hover {
  background: rgba(255, 255, 255, 0.15);
  color: #ffffff !important;
}

.inner-nav-links a.active {
  background: #3b82f6;
  color: #ffffff !important;
  font-weight: 700;
}

@media (max-width: 768px) {
  .inner-nav-links {
    justify-content: center;
    gap: 4px;
  }
  .inner-nav-links a {
    padding: 6px 10px;
    font-size: 13px;
  }
}
</style>