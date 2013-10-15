<!DOCTYPE html>
<html>
	<head>
		<title><?php print $title; ?></title>
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
		<script src="/3rdparty/jquery-2.0.3.min.js" ></script>
		<script src="/3rdparty/jquery.pjax.js" ></script>
		<script src="/assets/js/script.js" ></script>
	</head>
	<body>
		<nav><?php include 'navigation.php'; ?></nav>
		<main id="content"><?php include $content; ?></main>
		<footer><?php include 'footer.php'; ?></footer>
	</body>
</html>