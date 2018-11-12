<?php

    function do_html_header($title) {

echo '
<!DOCTYPE html>

<html>
<head>
   	<meta charset="utf-8">
   	<meta name="description" content="Maintenance Tracker App">
   	<meta name="keywords" content="maintenance, app, tracker">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<title>'?><?php echo $title; ?><?php echo'</title>
   	';

}
	
	function header1() {

	echo '
	<!-- contains links to the css styles of login and sign-up pages -->
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
   <link rel="stylesheet" type="text/css" href="assets/css/userstyle2.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-style.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/style.js"></script>
</head>
<body>
';

}

	function header2() {

	echo '
	<!-- contains links to css file of the user view -->
	<link rel="stylesheet" type="text/css" href="../assets/css/userstyle.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-style.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
';

}
	function header3() {

	echo '
	<!-- contains links to css file of the user view and forms -->
	<link rel="stylesheet" type="text/css" href="../assets/css/userstyle.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/userstyle2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-style.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
';

}
	function header4() {

	echo '
	<!-- contains links to the css styles of login and sign-up pages -->
	<link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/userstyle2.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-style.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
';

}
?>