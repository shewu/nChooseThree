<!DOCTYPE html>
<html lang="en">
<head>
<title>nChooseThree</title>
<style type="text/css">
/* make all the html5 elements display block */
html {
	color: #343434;
	margin: 0px;
	padding: 0px;
}

body {
	font-size: 75%;
	color: #222;
	background: #fff;
	font-family: "Helvetica Neue", Arial, Helvetica, sans-serif;
}

a:focus, a:hover {
	color: #000;
}

a {
	color: #254a86;
	text-decoration: none;
}

h1,h2,h3,h4,h5,h6 {
	font-weight: normal;
	color: #333;
	font-family: "Helvetical Neue", Arial, Helvetica, sans-serif;
}

h3 {
	font-size: 1.5em;
	line-height: 1;
	margin-bottom: 1em;
}

p {
	margin: 0 0 1.5em;
}

header,nav,footer {
	display: block;
}

nav {
	text-align: right;
	font-weight: lighter;
}

nav a {
	color: #254A86;
	text-decoration: none;
}

nav a:hover {
	color: #222;
}

header {
	border-bottom: 2px dotted #CCC;
	margin-bottom: 24px;
	background: url('static/img/logo.png') no-repeat;
	padding: 5px 0 8px 32px;
	text-shadow: #999 0px 1px 1px;
	font-family: Georgia, 'Times New Roman', Times, serif;
	font-size: 2em;
}

header a, header a:visited, header a:active, a:hover {
	color: #222;
}

footer {
	border-top: 2px dotted #CCC;
	text-align: center;
	font-weight: lighter;
}

.column {
	float: left;
	margin: 0px 10px;
	overflow: hidden;
}

.grid_6 {
	width: 460px;
}

.error, .notice, .success {
	border: 1px solid #DDD;
	margin-bottom: 1em;
	padding: 0.4em 0.8em;
}

.notice {
	background: #FFF6BF;
	border-color: #FFD324;
	color: #514721;
}

.stylized {
	background: #EBF4FB;
	border: 2px solid #B7DDF2;
}

.stylized h1 {
	font-size: 14px;
	font-weight: bold;
	margin-bottom: 8px;
}

.stylized p {
	border-bottom: 1px solid #B7DDF2;
	color: #666;
	font-size: 12px;
	margin-bottom: 20px;
	padding-bottom: 10px;
}

.myform {
	margin: 0px auto 24px;
	padding: 14px;
	width: 400px;
}

#twocolumnfooter {
	clear: both;
}

.html5logo {
	margin: 24px auto;
	background: url('static/img/5.png') no-repeat;
	height: 64px;
	width: 165px;
}
</style>
</head>
<body>
<nav>
	<a href="/about">About</a> | <a href="/about#feedback">Feedback</a> | <a
href="/">Home</a>
</nav>
<header>
	<a href="/">nChooseThree</a>
</header>
<article>
<section class="column grid_6">
<div class="blurb">
<h3>Know three friends who should go on a date?</h3>
<h3>Which of your friends would make a cute triple?</h3>
<p>Use nChooseThree to anonymously make match suggestions, and to get matched up
by your friends!</p>
<p><strong>If not all three matchees accept, none of the matchees or the
matchmaker learn of any other response.</strong> The matchmaker's identity is
revealed when all three A, B, and C accept the match.</p>
<p><a href="#">Read more about nChooseThree</a></p>
</div>
<div class="notice">
<h3>Alert</h3>
<p>This is not a sarcastic rendition of our sister site, <a
href="http://nchoosetwo.com">nChooseTwo.com</a></p>
</div>
</section>
<section class="column grid_6">
<div class="stylized myform">
<form action="/invite/" method="post" id="invite_form">
<h1>Request an invitation</h1>
<p>nChooseThree is currently limited to the <strong>MIT</strong> community.</p>
<div class="form-element">
<label for="email">Email</label>
<input type="text" id="email" name="email" class="text" />
</div>
<button type="submit">Request</button>
</form>
</div>
<div class="stylized myform">
<form action="/login/" method="post" id="login_form">
<h1>Login</h1>
<p>Welcome back! (<a href="/resetpass/">Forgot your password?</a>)</p>
<div class="form-element">
<label for="email">Email</label>
<input type="text" id="email" name="email" class="text" />
</div>
<div class="form-element">
<label for="password">Password</label>
<input type="password" id="password" name="password" class="text" />
</div>
<button type="submit">Login</button>
</form>
</div>
</section>
<div id="twocolumnfooter"></div>
</article>
<footer>
	<div class="html5logo"></div>
	Logo created with <a href="http://www.latex-project.org/"><img alt="\Latex"
	src="static/img/latex.png" width="38" height="16" style="vertical-align: middle" /></a>
</footer>
</body>
</html>

