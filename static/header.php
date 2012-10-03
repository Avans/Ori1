<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $curPage->getContent('title'); ?></title>
    <meta name="description" content="">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">
		html, body {
			height: 100%;
		}

		html {
			background-color: #2E282D;
		}

		body {
			width: 1000px;
			margin: 0 auto;
			background-color: #F6F6F6;
		}

		aside {
			padding-top: 14px;
			float: left;
			display: block;
			width: 20%;
		}

		#main {
			padding: 25px;
			float: left;
			width: 70%;
		}
		header {
			/* het logo */
			background-image: url(http://creativecommons.org/images/deed/cc-logo.jpg);
			background-repeat: no-repeat;
			padding-left: 150px;
			height: 150px;
		}

		a:link {
			color: #CEE864;
		}
		a:visited {
			color: #717D61;
		}
		a:hover {
			color: #F74114;
		}

		li, ul {
			display: inline;
			margin: 0px;
			padding: 2px;
		}

		ul {
			margin: 50px;
			border: 1px solid black;
		}

		#carousel {
			border: 1px solid black;
			width: 650px;
			height: 200px;
		}

		.stereotype {
			border: 1px solid black;
			width: 100%;
			height: 150px;
			margin-top: 10px;
		}
    </style>

</head>
<body>

    <header>
        <nav>
            <ul>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Over Ons</a>
                </li>
                <li>
                    <a href="#">Opdracht</a>
                </li>
                <li>
                    <a href="#">Stereotype</a>
                </li>
            </ul>
        </nav>
    </header>

    <div id="main">