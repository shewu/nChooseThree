<?php
require_once("auth.php");
if($auth_name) {
	header("Location: match/me.php");
	die();
}

include("header.php");
?>
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
</div>
<div class="notice">
<h3>Launch!</h3>
<p>nChooseThree is live!</p>
</div>
<p><a href="about.php">Read more about nChooseThree</a></p>
</section>
<section class="column grid_6">
<div class="stylized myform">
<form action="invite.php" method="post" id="invite_form">
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
<form action="login.php" method="post" id="login_form">
<h1>Login</h1>
<p>Welcome back! ( <a href="/resetpass/">Forgot your password?</a> )</p>
<div class="form-element">
<label for="email2">Email</label>
<input type="text" id="email2" name="email" class="text" />
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
<?php
include("footer.php");
?>
