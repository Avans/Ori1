<?php
	error_reporting(0);
	require_once 'classlib.php';
	$handle = new PageHandle();
	$curPage = new Page();	
	$id = 7;
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
        <a href="index.php?id=4"><img src="static/img/peter2.jpg" alt="Peter" title="Peter" width="200" height="150" /></a>
        <a href="index.php?id=5"><img src="static/img/lucy2.jpg" alt="Lucy" title="Lucy" width="200" height="150"/></a>
        <a href="index.php?id=6"><img src="static/img/hans2.jpg" alt="Hans" title="Hans" width="200" height="150"/></a>
        <a href="test.php"><img src="static/img/vragenlijst.jpg" alt="Maak de vragen lijst!" title="Maak de vragen lijst!" width="200" height="150"/></a>
    </aside>

</body>
<script>
    var peter = 0;
    var hans = 0;
    var lucy = 0;

    function updatePersona(realname) {

        //Get the variable by the name realname
        window[realname]++;
        var element_id = "#" + realname + "_bar";

        //Update Progressbar, nine points per person
        $(element_id).progressbar("value", window[realname] * 100 / 9);
    }


    $("button").click(function() {

        /*
         //Get all the siblings
         var $siblings = $(this).parent().children();
         alert($siblings);
         //Slide the question away
         $siblings.slideUp();
         $siblings.parent().slideUp();
         */
        $(this).parent('p').slideUp();
        var classes = $(this).attr('class');
        var classes_arr = classes.split(" ");

        $.each(classes_arr, function(index, value) {
            updatePersona(value);
        });
        //Prevent button from firing
        return false;
    });
    //Init the progress bars
    $("#peter_bar, #hans_bar, #lucy_bar").progressbar({
        value : 0

        //Update the colors on value change
    }).bind('progressbarchange', function(event, ui) {
        var selector = "#" + this.id + " > div";
        var value = this.getAttribute("aria-valuenow");
        if(value < 10) {
            $(selector).css({
                'background' : 'Red'
            });
        } else if(value < 30) {
            $(selector).css({
                'background' : 'Orange'
            });
        } else if(value < 50) {
            $(selector).css({
                'background' : 'Yellow'
            });
        } else {
            $(selector).css({
                'background' : 'Green'
            });
        }
    });

</script>
</html>
<?php
//echo $curPage->getStatic('footer');
?>