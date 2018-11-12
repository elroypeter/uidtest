<?php

	function navigation1() {

	echo '
		<nav class="navbar navbar-expand-lg navbar fixed-top navbar-dark" style="background-color:#0977A3;">
			  <a class="navbar-brand display-4" href="#">Mantainence App Tracker</a>
			  <ul class="navbar-nav ml-auto" style="background-color:#0977A3; color:#fff;">
			    <li class="nav-item">
			      <a class="nav-link">HOME</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#services">SERVICES</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#pricing">PRICING</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#about">ABOUT US</a>
			    </li>
			    <li class="nav-item">
			      <a class="nav-link" href="#contact">CONTACTS</a>
			    </li>
			  </ul>
			</nav>
		';
	}

	function navigation2() {

	echo '
	<div class="container">
		<div class="heading" style="background-color:#0977A3;">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="userview.php" class="active"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="userDashboard.php"><span class="icon-meter"> </span>Dashboard</a></li>
				<li class="nav"><a href="../leaderboard.php"><span class="icon-user-tie"> </span>Leaderboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="form-control">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
		';
	}

	function navigation3() {

	echo '
	<div class="container">
		<div class="heading" style="background-color:#0977A3;">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="userview.php"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="userDashboard.php" class="active"><span class="icon-meter"> </span>Dashboard</a></li>
				<li class="nav"><a href="../leaderboard.php"><span class="icon-user-tie"> </span>Leaderboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="form-contro">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
		';
	}

	function navigation4() {

	echo '
	<div class="container">
		<div class="heading" style="background-color:#0977A3;">
			<h1>Maintenance Tracker App</h1> 
		</div>
		';
	}
	function userSideBar($login_session) {

	echo '
        <div class="nested">
			<div class="v-menu">
                <ul>
                    <div class="profile">
                        <button class="dropdown-btn">
                            <img alt="profile picture" src="../assets/images/male-avatar.png">'; echo $login_session; echo '</button>
                        <div class="dropdown-container">
                            <a href="">Preferences</a>
                            <a href="userProfile.php">Profile</a>
                        </div>
                    </div>
                    <h3>Maintenance Menu</h3>
                    <li><a href="requestOrder.php">Request Order Details</a></li>
                    <li><a href="userRequests.php">Submitted Requests</a></li>
                    <li><a href="userassets.php">My Devices</a></li>
                    <div class="search-spacing2">
                    <label>Find Device</label>
                        <input type="search" name="search" class="form-control" placeholder=" ">
                    <a class="submit">Go</a></div>
                </ul>
			</div>
			';
	}

	function admin_navigation1() {

	echo '
	<div class="container">
		<div class="heading" style="background-color:#0977A3;">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="adminview.php" class="active"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="adminDashboard.php"><span class="icon-meter"> </span>Dashboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="search-spacing1">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
		';
	}

	function admin_navigation2() {

	echo '
	<div class="container">
		<div class="heading" style="background-color:#0977A3;">
			<h1>Maintenance Tracker App</h1> 
		</div>

		<div class="menu">
			<ul class="nav">
				<li class="nav"><a href="adminview.php"><span class="icon-home"> </span>Home</a></li>
				<li class="nav"><a href="adminDashboard.php" class="active"><span class="icon-meter"> </span>Dashboard</a></li>
                <input type="search" name="search" placeholder="Search site" class="search-spacing1">
                <li class="nav"><a href="../includes/logout.php"><span class="icon-exit"> </span>Logout</a></li>
			</ul>
		</div>
		';
	}

	function adminSideBar($login_session) {

	echo '
        <div class="nested">
			<div class="v-menu">
                <ul>
                    <div class="profile">
                        <button class="dropdown-btn">
                            <img alt="profile picture" src="../assets/images/male-avatar.png">'; echo $login_session; echo '</button>
                        <div class="dropdown-container">
                            <a href="">Preferences</a>
                            <a href="adminprofile.php">Profile</a>
                        </div>
                    </div>
                    <h3>Maintenance Menu</h3>
                    <li><a href="adminRequestsDetails.php">Request Order Details</a></li>
                    <li><a href="adminRequests.php">Submitted Requests</a></li>
                    <li><a href="">People & Teams</a></li>
                    <li><a href="devices.php">Devices</a></li>
                    <div class="search-spacing2">
                    <label>Find Device</label>
                        <input type="search" name="search" placeholder=" ">
                    <a class="submit">Go</a></div>
                </ul>
			</div>
			';
	}
?>
