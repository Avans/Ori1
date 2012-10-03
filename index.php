<?php
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page($handle->handleGET($_GET));
?>
<?php 
echo $curPage->getStatic('header');
echo $curPage->getContent('html');
?>
