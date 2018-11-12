<?php
	session_start();
	include '../includes/dbconnection.php';
	include '../includes/user.inc.php';
	include '../includes/requests.inc.php';
	include '../functions/headers.php';
	
	do_html_header('Add Request');
	header3(); 

	include('../functions/navigations.php');
	navigation2();

	require_once '../functions/content.inc.php';

	userSidebar($_SESSION['login_user']);

	display_addRequest_content();

	include '../includes/footer-2.php'; 
?>