<?php
	error_reporting(0);
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page();
	
	$id = $handle->handleGET('id');
	if($id > 0)$curPage->setID($id);
	

//echo $curPage->getStatic('header');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $curPage->getContent('title'); ?></title>
    <meta name="description" content="">
    <link rel="stylesheet" href="static/css/normalize.css">
    <link rel="stylesheet" href="static/css/main.css">
    <!--<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>-->

</head>
<body>

    <header>
        <a style="width:100%; height:100%;display: block;" href="index.php"></a>
    </header>
    <div id="main">

        <?php
        echo $curPage->getContent('html');
        ?>
    </div>
    <aside>
        <?php
        echo $curPage->getStatic('sidebar');
        ?>
       
    </aside>
</body>
</html>
<?php
//echo $curPage->getStatic('footer');
?>