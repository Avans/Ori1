<?php
	//
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page();
	
	$id = $handle->handleGET('id');
	if($id > 0)$curPage->setID($id);
	

echo $curPage->getStatic('header');
echo $curPage->getContent('html');
echo $curPage->getStatic('footer');
?>