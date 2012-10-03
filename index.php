<?php
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page($handle->handleGET($_GET));
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS test</title>
	</head>
	<body>
		<?= $curPage->getStatic('header')
		?>
		<h3><?= $curPage->getContent('title')
		?></h3>
		<p>
			<?= $curPage->getContent('html')
			?>
		</p>
	</body>
</html>
