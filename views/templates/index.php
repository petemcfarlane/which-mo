<h1>Index</h1>

<?php if ($user === null) { ?>
	Login
	<form action="/session" method="post">
		<input type="hidden" name="token" value="<?php print $_SESSION['token']; ?>" />
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" value="Login" />
	</form>
	
	Signup
	<form method="post" action="/users">
		<input type="hidden" name="token" value="<?php print $_SESSION['token']; ?>" />
		<input type="text" name="name" placeholder="Your name" />
		<input type="email" name="email" placeholder="Email" />
		<input type="password" name="password" placeholder="Password" />
		<input type="submit" />
	</form>
	
	Or <a href="<?php print $fb->getLoginUrl(array('scope'=>'email')); ?>">Login with Facebook</a>
<?php } else { ?>
	Welcome <?php print $user->getName(); ?>
<? } ?>
