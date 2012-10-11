<?php
	ob_start();
	require_once '../classlib.php';
	$handle = new PageHandle();
	$curPage = new Page();
	$cms = new CMS();
	$id = $handle->handleGET('id');
	
	if($_GET['mode'] == 3){
		$cms->deleteArticle($id);
		$handle->relocate("cms");
	}else if($_GET['mode'] == 1){
		$id = -1;
	}
	
	$curPage->setID($id);
	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>CMS - edit article</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../static/css/style_cms.css">
		
	</head>
	<body>
		<?php echo$curPage->getStatic('cms_header')?>
		<div class="cms_container">
			<div class="cms_entry" style="height: 17px;">
				<strong style="text-transform: uppercase;">[EDITING] <?php echo $curPage->getContent('title')?></strong>
			</div>
			<form method="post" action="edit_1.php">
				<div class="cms_entry">
					<strong>title:</strong> <br>
					<input class="input1" type="text" value="<?php echo $curPage->getContent('title')?>" name="title">					
				</div>
				
				<div class="cms_entry">
					<strong>html:</strong> <br>
					<textarea rows="8" cols="45" name="html"><?php echo $curPage->getContent('html')?></textarea>
				</div>
				
				<div class="cms_entry">
					<strong>html_side:</strong> <br>
					<textarea rows="8" cols="45" name="html_side"><?php echo $curPage->getContent('html_side')?></textarea>
				</div>
				
				<div class="cms_entry">
					<strong>bg_image:</strong> <br>
					<input class="input1" type="text" value="<?php echo $curPage->getContent('bg_image')?>" name="bg_image">					
				</div>
				
				<div class="cms_entry">
					<input type="hidden" name="id" value="<?php echo$id?>">
					<input type="submit" value="submit" name="submit" style="float: left;"><input type="reset" value="reset" name="reset" style="float: left;margin-left:5px;"><input type="button" value="back" name="back" onClick="window.location='cms.php'" style="float: left;margin-left:5px;">					
				</div>
			</form>
			
		
		</div>
	
	</body>
</html>	
