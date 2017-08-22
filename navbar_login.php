<div data-role="navbar" data-iconpos="right">
		<ul>
			<li><a href="./" data-icon="search" <?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo 'class="ui-btn-active"'; ?>>Cari</a></li>
			<li><a href="manage_nilai.php" data-icon="bullets" <?php if(basename($_SERVER['PHP_SELF'])=="manage_nilai.php" || basename($_SERVER['PHP_SELF'])=="manage_kelas.php" || basename($_SERVER['PHP_SELF'])=="insert_kelas.php" || basename($_SERVER['PHP_SELF'])=="insert_nilai.php") echo 'class="ui-btn-active"'; ?>>Kelola</a></li>
			<li><a href="logout.php" data-icon="arrow-r">Logout</a></li>
		</ul>
</div>