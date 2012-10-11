<?php
error_reporting(0);
require_once 'classlib.php';
$handle = new PageHandle();
$curPage = new Page();
$id = 7;
if ($id > 0)
	$curPage -> setID($id);

//echo $curPage->getStatic('header');
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?php echo $curPage -> getContent('title'); ?></title>
    <meta name="description" content="">
    <link rel="stylesheet" href="static/css/normalize.css">
    <link rel="stylesheet" href="static/css/main.css"><script src="http://code.jquery.com/jquery-latest.js"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script src="static/js/test.js" type="text/javascript"></script>

</head>
<body>

    <header>
        <a style="width:100%; height:100%;display: block;" href="index.php"></a>
    </header>

    <div id="main">

        <?php echo $curPage->getContent('html'); ?>
    </div>

    <aside>
        <?php echo $curPage->getStatic('sidebar'); ?>
    </aside>

</body>
<script>
	var peter = 0;
	var hans = 0;
	var lucy = 0;

	var answerdQuestions = 0;
	var numQuestions = $('.question').length

	function updatePersona(realname) {

		//Get the variable by the name realname
		window[realname]++;
		var element_id = "#" + realname + "_bar";

		//Number of posibilities per person
		var amountPossible = 12;
		//Update Progressbar
		$(element_id).progressbar("value", window[realname] * 100 / amountPossible);
	}

	function showPersona() {
		var nr = Math.max(peter, hans, lucy);
		if(nr == lucy) {
			$('#result').append("<li>Lucy</li>");
			$('#lucy_kenmerken').toggleClass("hidden");
		}

		if(nr == hans) {
			$('#result').append("<li>Hans</li>");
			$('#hans_kenmerken').toggleClass("hidden");
		}

		if(nr == peter) {
			$('#result').append("<li>Peter</li>");
			$('#peter_kenmerken').toggleClass("hidden");
		}
		$('#done').slideDown("slow");
	}

	$("button").click(function() {

		answerdQuestions++;
		$(this).parent('p').slideUp();
		
		var classes = $(this).attr('class');
		
		if(classes){ //if it has a value
			var classes_arr = classes.split(" ");
		} else {
			var classes_arr = new Array();
		}
		
		$.each(classes_arr, function(index, value) {
			updatePersona(value);
		});
	
		if (answerdQuestions == numQuestions) {
			showPersona();
		}

		//Prevent button from firing
		return false;
	});
	
	//Init the progress bars
	$("#peter_bar, #hans_bar, #lucy_bar").progressbar({
		value : 0
	});
	
	//Change bar color
	$("#peter_bar > div").css({ 'background': 'red' });
	$("#hans_bar > div").css({ 'background': 'green' });
	$("#lucy_bar > div").css({ 'background': 'blue' });
</script>
</html>
<?php
//echo $curPage->getStatic('footer');
?>