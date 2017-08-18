<div data-role="navbar" data-iconpos="right">
		<ul>
			<li><a href="./" data-icon="bars" <?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo 'class="ui-btn-active"'; ?>>List</a></li>
			<li><a href="search.php" data-icon="search" <?php if(basename($_SERVER['PHP_SELF'])=="search.php") echo 'class="ui-btn-active"'; ?>>Cari</a></li>
			<li><a href="manage_nilai.php" data-icon="bullets" <?php if(basename($_SERVER['PHP_SELF'])=="manage_nilai.php") echo 'class="ui-btn-active"'; ?>>Kelola</a></li>
			<li><a href="index.php" data-icon="arrow-r" <?php if(basename($_SERVER['PHP_SELF'])=="index.php") echo 'class="ui-btn-active"'; ?>>Logout</a></li>
		</ul>
</div>