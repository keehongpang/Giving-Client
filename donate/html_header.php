<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="shorcut icon" href="/images/favicon.png">

	
	<link rel="stylesheet" href="../_css/fonts.css" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:400,700" rel="stylesheet">
	<link rel="stylesheet" href="../_css/css_prpl.css" type="text/css">
	<!-- Added to Augment PRPL's base CSS -->
	<link rel="stylesheet" href="../_css/calebcss.css" type="text/css">
	<link rel="stylesheet" href="../_css/jeffcss.css" type="text/css">

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../_css/jquery-ui.css" rel="stylesheet">	
    <!-- Custom styles for this template -->
<!--    <link href="../_css/navbar-fixed-top.css" rel="stylesheet">	-->


	
	<title>Northland New Online Giving</title>

	
<!--	<link href="https://cloud.typography.com/6046374/767068/css/fonts.css" rel="stylesheet" type="text/css">	-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap-3.3.5/docs/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<?php
	include_once '../includes/db_connect.php';
	include_once '../includes/functions.php';
	 
	sec_session_start();

	$logged_in = login_check($mysqli);
	if ($logged_in) {
		$logged = 'in';
	} else {
		$logged = 'out';
	}

?>

<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top" style="display:none">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand brand-primary" href="http://www.northlandchurch.net">Northland</a><a class="navbar-brand brand-secondary" href="http://www.northlandchurch.net/distributedchurch">A Church Distributed</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
		
			<ul class="nav navbar-nav">
			<?php if ($logged_in) : ?>
				<li id="navbar-accounts"><a href="../mypayment.php">Accounts</a></li>
				<li id="navbar-give"><a href="../givenow.php">Give</a></li>
				<li id="navbar-history"><a href="../myhistory.php">History</a></li>
				<li id="navbar-profile"><a href="../myprofile.php">Profile</a></li>
			<?php else : ?>
			<?php endif; ?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
			<?php if ($logged_in) : ?>
				<li><a href="../logout.php">Sign Out</a></li>
			<?php else : ?>
				<li><a href="../register.php">Register</a></li>
				<li><a href="../index.php">Sign In</a></li>
<!--				<li><a href="./donate/givenologin.php">Give Without an Account</a></li>	-->
			<?php endif; ?>
			</ul>

		</div><!--/.nav-collapse -->
	</div>
</nav>

<header>
	<div class="nav-bar">
		<a href="http://www.northlandchurch.net" class="logo-text">Northland Church <span>A Church Distributed</span></a>
		<ul id="second-nav">
			<li id="link-about"><span class="navb" style="text-transform:none;color:#DBD2C3;font-weight: bold"><a href="../register.php">Register</a></span></li>
			<li id="link-give"><span class="navb" style="text-transform:none;color:#DBD2C3;font-weight: bold"><a href="../index.php">Sign In</a></span></li>
		</ul>
		<a id="mobile-menu-button" class="mobile-nav-close" href="#"><span class="icon-menu"></span></a>
		<span id="search-button">Search</span>
		<div id="search-form"><label><input type="search" class="st-default-search-input" /><span>Search...</span></label><span id="close-search-form">CLOSE</span></div>
	</div>

	<div class="nav-section">
	
		<span class="close mobile-nav-close">CLOSE</span>
		
		<div class="nav-container">
			<a href="http://www.northlandchurch.net" class="logo-text">Northland Church <span>A Church Distributed</span></a>
			
			<nav class="nav-menu-section">
				<ul class="main-nav">
					<li>
						<span class="nav-menu-title">Online Giving</span>
						<ul class="main-nav-submenu">
							<li><a href="../register.php">Register</a></li>
							<li><a href="../index.php">Sign In</a></li>
						</ul>
					</li>
					<li>
						<span class="nav-menu-title">Respond to God</span>
						<ul class="main-nav-submenu">
							<li><a href="http://www.northlandchurch.net/pray">pray</a></li>
							<li><a href="http://www.northlandchurch.net/readthebible">read the Bible</a></li>
							<li class="sub-nav-expand-list-item"><a href="#sub-nav-1" class="sub-nav-expand">MORE &raquo;</a></li>
						</ul>
					</li>
					<li>
						<span class="nav-menu-title">Resources &amp; Media</span>
						<ul class="main-nav-submenu">
							<li><a href="http://www.northlandchurch.net/blogs">articles</a></li>
							<li><a href="http://www.northlandchurch.net/video/category/services">services</a></li>
							<li class="sub-nav-expand-list-item"><a href="#sub-nav-2" class="sub-nav-expand">MORE &raquo;</a></li>
						</ul>
					</li>
					<li>
						<span class="nav-menu-title">Connect @ Northland</span>
						<ul class="main-nav-submenu">
							<li><a href="http://calendar.northlandchurch.net">calendar</a></li>
							<li><a href="http://www.northlandchurch.net/main/ministries/">ministries</a></li>
							<li class="sub-nav-expand-list-item"><a href="#sub-nav-3" class="sub-nav-expand">MORE &raquo;</a></li>
						</ul>
					</li>
				</ul>
				<ul class="secondary-nav">
					<li>
						<a href="http://www.northlandchurch.net/about">About</a>
					</li>
					<li>
						<a href="https://giving.northlandchurch.net">Give</a>
					</li>
					<li>
						<a href="http://www.northlandchurch.net/need-help">Need Help</a>
					</li>
<!--					<li><a href="#">New to Northland &raquo;</a></li>	-->
				</ul>
			</nav>
			<nav class="sub-nav-container">
				<div id="sub-nav-1" class="sub-nav">
					<div class="sub-nav-container">
						<a href="#" class="sub-nav-close">&laquo; BACK</a>
						<ul>
							<li>
								<span class="nav-menu-title">Respond to God</span>
								<ul class="main-nav-submenu">
<!--									<li><a href="#">be in community</a></li>	-->
									<li><a href="https://giving.northlandchurch.net">give</a></li>
<!--									<li><a href="#">go! (missions)</a></li>	-->
									<li><a href="http://www.northlandchurch.net/pray">pray</a></li>
									<li><a href="http://www.northlandchurch.net/readthebible">read the Bible</a></li>
									<li><a href="http://www.northlandchurch.net/serve">serve</a></li>
									<li><a href="http://www.northlandchurch.net/worship">worship</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div id="sub-nav-2" class="sub-nav">
					<div class="sub-nav-container">
						<a href="#" class="sub-nav-close">&laquo; BACK</a>
						<ul>
							<li>
								<span class="nav-menu-title">Resources &amp; Media</span>
								<ul class="main-nav-submenu">
									<li><a href="http://www.northlandchurch.net/blogs">articles</a></li>
									<li><a href="http://www.northlandchurch.net/video/category/services/">services</a></li>
									<li><a href="http://www.northlandchurch.net/series/">series</a></li>
									<li><a href="http://www.northlandchurch.net/video/category/highlights">songs</a></li>
									<li><a href="http://www.northlandchurch.net/newspaper/">newspaper</a></li>
									<li><a href="http://www.northlandchurch.net/video">videos</a></li>
								</ul>
							</li>
							<li>
								<span class="nav-menu-title">CHANNELS</span>
								<ul class="main-nav-submenu">
									<li><a href="http://www.northlandchurch.net/series/askapastor">Ask a Pastor</a></li>
<!--									<li><a href="http://www.northlandchurch.net/series/churcheverywhere">Church Everywhere</a></li>	-->
									<li><a href="http://www.northlandchurch.net/blogs/category/beckyhunter/">Becky's Blog</a></li>
									<li><a href="http://www.northlandchurch.net/series/chasingwisdom">Chasing Wisdom</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
				<div id="sub-nav-3" class="sub-nav">
					<div class="sub-nav-container">
						<a href="#" class="sub-nav-close">&laquo; BACK</a>
						<ul>
							<li>
								<span class="nav-menu-title">Connect @ Northland</span>
								<ul class="main-nav-submenu">
									<li><a href="http://calendar.northlandchurch.net">calendar</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31359">children</a></li>
									<li><a href="http://calendar.northlandchurch.net/calendar?event_types%5B%5D=30424">classes</a></li>
									<li><a href="http://distributedchurch.org" target="_blank">distributed church &raquo;</a></li>
									<li><a href="http://somedayistoday.net" target="_blank">mission trips &raquo;</a></li>
									<li><a href="http://calendar.northlandchurch.net/calendar?event_types%5B%5D=30853">events</a></li>
									<li><a href="http://www.northlandchurch.net/about#locations">locations &amp; times</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31367">men</a></li>
									<li><a href="http://www.northlandchurch.net/main/ministries/">ministries</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31358">pastoral care</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31357">recovery</a></li>
									<li><a href="http://www.northlandchurch.net/serve/">service projects</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31370">special needs</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31371">students</a></li>
									<li><a href="http://www.northlandchurch.net/volunteer">volunteer</a></li>
									<li><a href="http://calendar.northlandchurch.net/search/groups?group_types%5B%5D=31372">women</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</div>
</header>
