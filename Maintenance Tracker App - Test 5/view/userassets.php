<?php
	session_start();
	include '../includes/dbconnection.php';
	include '../includes/user.inc.php';
	require_once '../includes/session.inc.php';
	include '../functions/headers.php';
	
	do_html_header('User Devices');
	header2();

	include '../functions/navigations.php';
	navigation2();

	require_once '../functions/content.inc.php';
	
	userSidebar($_SESSION['login_user']);
	$login_sess = $_SESSION['login_user'];

	$sessionObj = new Session;
	$sessionObj->sessionCheck($login_sess);

	display_userassets_content();

	include('../includes/footer-2.php'); 
?>