<?php
	session_start();
	include '../includes/dbconnection.php';
	include '../includes/user.inc.php';
	include '../includes/requests.inc.php';
	require_once '../includes/session.inc.php';
	include '../functions/headers.php';
	
	do_html_header('View Requests');
	header3();

	include '../functions/navigations.php';
	navigation2();
	
	require_once '../functions/content.inc.php';

	userSidebar($_SESSION['login_user']);
	$login_sess = $_SESSION['login_user'];

	$sessionObj = new Session;
	$sessionObj->sessionCheck($login_sess);

	display_viewRequest();

	include '../includes/footer-2.php'; 
?>