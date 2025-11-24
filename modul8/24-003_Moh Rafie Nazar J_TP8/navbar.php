<?php
require_once 'config.php';
$currentLevel = getUserLevel();
?>
<nav class="navbar">
    <div class="navbar-left">
        <span class="navbar-brand">Sistem Penjualan</span>
        <ul class="navbar-menu">
            <li><a href="index.php">Home</a></li>

            <?php if ($currentLevel == 1): ?>
                <li><a href="data_master.php">Data Master</a></li>
            <?php endif; ?>

            <li><a href="transaksi.php">Transaksi</a></li>
            <li><a href="laporan.php">Laporan</a></li>
        </ul>
    </div>

    <div class="navbar-right">
        <span class="user-info"><?php echo htmlspecialchars($_SESSION['nama']); ?></span>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</nav>