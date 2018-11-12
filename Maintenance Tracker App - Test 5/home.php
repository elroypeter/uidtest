<?php

	include_once "includes/dbconnection.php";
	include_once "includes/user.inc.php";
	require_once 'functions/display_fn.php';
	
	include 'functions/headers.php'; 

	do_html_header('Maintenance Tracker App');

	include 'functions/navigations.php';
	
	header1();
	navigation1();

	display_index();

	include 'includes/footer.php'; 
?>