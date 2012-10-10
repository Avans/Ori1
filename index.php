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
    <link href='http://fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>

</head>
<body>

    <header>
        <nav>
            <ul>
                <li>
                    <a href="index.php?id=1">Home</a>
                </li>
                <li>
                    <a href="#">Over Ons</a>
                </li>
                <li>
                    <a href="#">Opdracht</a>
                </li>
                <li>
                    <a href="#">Persona</a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="main">
        <?php
        echo $curPage->getContent('html');
        ?>
    </div>
    <aside>
        <a href="index.php?id=4"><img src="static/img/peter2.jpg" alt="Peter" title="Peter" width="200" height="150" /></a>
        <a href="index.php?id=5"><img src="static/img/lucy2.jpg" alt="Lucy" title="Lucy" width="200" height="150"/></a>
        <a href="index.php?id=6"><img src="static/img/hans2.jpg" alt="Hans" title="Hans" width="200" height="150"/></a>
        <a href="index.php?id=7"><img src="static/img/vragenlijst.jpg" alt="Maak de vragen lijst!" title="Maak de vragen lijst!" width="200" height="150"/></a>
    </aside>
</body>
</html>
<?php
//echo $curPage->getStatic('footer');
?>