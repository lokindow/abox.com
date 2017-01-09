<?php
session_start();
if(!isset($_SESSION['skn_user'])){ if(isset($_COOKIE['skn_user'])){ $_SESSION['skn_user'] = $_COOKIE['skn_user']; }}?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv='Content-Type'content='text/xhtml;charset=UTF-8'>
		<meta name='keywords'content='KEYWORDS'>
		<meta name='author'content='Alphabox Team'>
		<title>SKN Engenharia</title>
		<!-- UBUNTU fonts -->
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:200,300,400,500,600,700' rel='stylesheet'>
        <link href='std.css' rel='stylesheet'>
		<script src='jquery.js'></script>
	</head>

	<body>
		<! HEAD > <header></header>
		<! HOME > <home></home>
		<! POPS > <popup></popup>
		<! MSGS > <message></message>
        <! LOAD > <loading></loading>
	</body>

	<!-- HANDLERS -->
	<script type='text/javascript'src='fn.js'></script>
	<script>
		$(window).resize(function(){ adjust(); });
		$(document).ready(function(){std_require_page("head",HEAD);});
		setTimeout(function(){ 
            HOME.css({'top':HEAD.height()+5});
            $('popup,message,loading').hide();
        },400);
	</script>


</html>
