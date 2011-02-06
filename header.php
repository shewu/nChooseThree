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
</head>
<body>
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
	<a href="/nChooseThree/index.php">nChooseThree</a>
</header>

