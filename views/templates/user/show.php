<h1>User <?php print $show_user->getName(); ?></h1>

<?php // Only show to user if they match the logged in user
	if ( $user->get_id() === $show_user->get_id() ) { ?>
	<form action="/users/<?php print $show_user->get_id(); ?>" method="post">
		<input type="hidden" name="_method" value="put" />
		<input type="hidden" name="token" value="<?php print $_SESSION['token']; ?>" />
		<input type="text" name="name" placeholder="Your name" value="<?php print $show_user->getName(); ?>" />
		<input type="email" name="email" placeholder="Email" value="<?php print $show_user->getEmail(); ?>" />
		<input type="password" name="password" placeholder="Password" value="<?php print $show_user->getPassword(); ?>" />
		<input type="submit" value="Update" />
	</form>
	
	<form action="/users/<?php print $show_user->get_id(); ?>" method="post">
		<input type="hidden" name="_method" value="delete" />
		<input type="hidden" name="token" value="<?php print $_SESSION['token']; ?>" />
		<input type="submit" value="Delete" />
	</form>
<?php } ?>