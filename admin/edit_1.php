<?php
	//
	require_once '../classlib.php';
	$handle = new PageHandle();
	$curPage = new Page();
	$cms = new CMS();
	
	if(!$_POST){
		$handle->relocate("cms");
	}
	$id = $handle->dbConnect->escapeInput($_POST['id']);
	$title = $handle->dbConnect->escapeInput($_POST['title']);
	$html = $handle->dbConnect->escapeInput($_POST['html']);
	$html_side = $handle->dbConnect->escapeInput($_POST['html_side']);
	$bg_image = $handle->dbConnect->escapeInput($_POST['bg_image']);
	
	if($id == -1){
		//nieuw artikel
		$cms->addArticle("('', '".$title."', '".$html."', '".$html_side."', '".$bg_image."')");
		$handle->relocate("cms");
	}else{
		//aanpassen artikel
		$cms->updateArticle("title = '".$title."', html = '".$html."', html_side = '".$html_side."', bg_image = '".$bg_image."'", $id);
		$handle->relocate("cms");
	}
	
?>
		