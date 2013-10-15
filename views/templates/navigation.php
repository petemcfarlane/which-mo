<menu>
	<a href="/">Home</a>
	<a href="/users">Users</a>
	<?php if ($user) { ?><a href="/logout">Logout <?php print $user->getName(); ?></a><?php } ?>
</menu>