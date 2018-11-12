<?php
	session_start();
	include_once "../includes/dbconnection.php";
	include_once "../includes/user.inc.php";
	include_once "../includes/device.inc.php";
	require_once '../includes/session.inc.php';
	require_once '../functions/display_fn.php';
	
//	require_once '../includes/adminsession.php';
//	require_once '../functions/admin_fns.php';
	
	include '../functions/headers.php';
	do_html_header('Administrator View');
	header2();

	include '../functions/navigations.php';
	admin_navigation1();	

	require_once '../functions/content.inc.php';
	adminSideBar($_SESSION['login_user']);
	$login_sess = $_SESSION['login_user'];

	$sessionObj = new Session;
	$sessionObj->sessionCheck($login_sess);
	
	display_devices();

	include('../includes/footer-2.php'); 
?>