<?php
	
	include "includes/dbconnection.php";
	include "includes/user.inc.php";
	require 'functions/display_fn.php';

	include 'functions/headers.php'; 
	
	do_html_header('Maintenance Tracker App | Login');
	
	include 'functions/navigations.php';

	header1();
	navigation1();
	
	display_sign_up_form();

	include 'includes/footer.php'; 
?>