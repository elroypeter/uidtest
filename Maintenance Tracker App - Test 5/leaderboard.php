<?php

	include_once "includes/dbconnection.php";
	include_once "includes/user.inc.php";
	require_once 'functions/display_fn.php';
	
	include 'functions/headers.php'; 
	
	do_html_header('Leaderboard');
	header4();
	
	include 'functions/navigations.php' ;
	navigation4();

	display_leaderboard_form();

	include 'includes/footer.php' ; 
?>