<?php
	require_once('../includes/session.php');
	include('../functions/headers.php');

	do_html_header('User View');
	header3();
	
	include('../functions/navigations.php');
	navigation2();

	require_once('../functions/content_view_fns.php');
	userSidebar($login_session);

	display_userProfile();

	include('../includes/footer-2.php'); 
?>