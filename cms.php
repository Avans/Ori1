<?php
	
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page(0);
	$cms = new CMS();
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS test</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="static/css/style_cms.css">
		
	</head>
	<body>
		<?= $curPage->getStatic('cms_header')?>
		<div class="cms_container">
			<div class="cms_entry" style="height: 13px;">
				<a href="index.php">Index</a> | <a href="edit.php?mode=1">Add article</a><br><br>
			</div>
			<?= $cms->getArticles()?>
		
		</div>
	
	</body>
</html>	
