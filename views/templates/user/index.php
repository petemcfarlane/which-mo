<h1>Index users</h1>
<ul>
	<?php foreach($users as $user) { ?>
		<li><a href="/users/<?php print $user->get_id(); ?>"><?php print $user->getName(); ?></a></li>
	<?php } ?>
</ul>
