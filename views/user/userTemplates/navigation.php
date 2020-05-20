<div class="sideBar"></div> 
	<div id="logo"><a href="feed.php">ShortCircuit</a></div>
		<nav>
		<a href="#" class="menu-trigger"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></a>
		<ul>
			<li><a href="feed.php"><i class="fas fa-home"></i></a></li>
			<li><a href="discover.php"><i class="fas fa-compass"></i></a></li>
			<li><a href="profile.php?UserID=<?php echo $_SESSION['user'];?>"><i class="fas fa-user-circle"></i></a></li>
			<li><a href="../landing/logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
			<?php echo'<li id="isAdmin"' . $adminclass . '><a href="../admin/dashboard.php"><i class="fas fa-address-card"></i></a></li>' ?>

		</ul>
		</nav>
<div class="sideBar"></div> 