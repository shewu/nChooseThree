<?php
include("header.php");
?>
<article>
<section class="column grid_6">
<div class="blurb">
<h3>Know three friends who should go on a date?</h3>
<h3>Which of your friends would make a cute triple?</h3>
<p>Triples often meet through mutual friends. After all, your friends and you
know each other best. Why not suggest a date among three of your friends?</p>
<p>nChooseThree lets you anonymously suggest a match between two of your
friends; you remain anonymous until they both accept the match!</p>
<p>Privacy and security are our top priorities - no information about romantic intent is revealed to anyone unless all three parties accept the match. Additionally, this service is limited to members of the MIT community.</p>
<p>Only when the match is accepted by all three parties is the identity of the matchmaker divulged and the success of the match reported to the matchmaker. If only one or two of the matchees accept the match, the other matchee or matchees and the matchmaker DO NOT learn this information.</p>
<p>We hope you enjoy using nChooseThree!</p>
<p>
<br />
Cheers,<br />
<br />
Brian and Sherry <br />
(MIT '14)
</p>
</div>
</section>
<section class="column grid_6">
<div class="stylized myform">
<form action="feedback.php" method="post" id="feedback_form">
<h1>Feedback</h1>
<p>Got concerns, suggestions, or comments? Use the form below to drop us a line.</p>
<div class="form-element">
<label for="email">Your email</label>
<input type="text" id="email" name="email" class="text" />
</div>
<div class="form-element">
<label for="comment">Comment</label>
<textarea id="comment" name="comment" class="text"></textarea>
</div>
<button type="submit">Send</button>
</form>
</div>
</section>
<div id="twocolumnfooter"></div>
</article>
<?php
include("footer.php");
?>
