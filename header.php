<?php
function curPageURL() {
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}

$url = curPageURL();
if(!strpos(strtolower($url),"nchoosethree.com")) {
	header("Location: http://www.nchoosethree.com");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="icon" type="image/png" href="/nChooseThree/static/img/favico.png" />
<title>nChooseThree</title>
<style type="text/css">
@import '/nChooseThree/static/css/reset.css';
@import '/nChooseThree/static/css/grid.css';
@import '/nChooseThree/static/css/main.css';
@import '/nChooseThree/static/css/forms.css';
@import '/nChooseThree/static/css/typography.css';
</style>
<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-21230749-1']);
_gaq.push(['_trackPageview']);

(function() {
 var ga = document.createElement('script'); ga.type =
 'text/javascript'; ga.async = true;
 ga.src = ('https:' == document.location.protocol ?
	 'https://ssl' : 'http://www') +
 '.google-analytics.com/ga.js';
 var s = document.getElementsByTagName('script')[0];
 s.parentNode.insertBefore(ga, s);
 })();
</script>
</head>
<body>
<div class="full-wrapper">
<nav>
<?php
require_once("auth.php");
if($auth_name) {
	echo $auth_name . ' | <a href="/nChooseThree/logout.php">Log Out</a> | ';
}
?>
	<a href="/nChooseThree/about.php">About</a> | <a href="/nChooseThree/about.php#feedback">Feedback</a> | <a
href="/nChooseThree/index.php">Home</a>
</nav>
<header>
	<div>
	<a href="/nChooseThree/index.php">nChooseThree</a>
	</div>
</header>

