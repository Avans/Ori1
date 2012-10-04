<?php
	//
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page();
	
	$id = $handle->handleGET('id');
	if($id > 0)$curPage->setID($id);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS test</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="static/css/style_cms.css">
		
	</head>
	<body>
		<div class="centerPage">
			<?= $curPage->getStatic('header')?>
			<div class="page_container">
				<div class="page_heading">
					<h3><?= $curPage->getContent('title')?></h3>
				</div>
				
				<div class="page_content">
					<?= $curPage->getContent('html')?>
				</div>
				<div class="page_sidebar">
					<?= $curPage->getContent('html_side')?>
				</div>
			
			</div>
			<?= $curPage->getStatic('footer')?>
		</div>
	</body>
</html>	
