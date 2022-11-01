<?

/* this needs to be set from the db somehow instead of just manually */
setcookie('current_conf','HC13');

/* grabs the conference ID from a cookie or sets a reasonable default */
function getcurrentconf() {
	/* look at the cookies */
	$current_conf = $_COOKIE['current_conf'];

	/* need some sort of fallback if it's not set*/
	/* also need some sort of white list/sanitization */

	return $current_conf;
}


function getconferencetitle() {

	$current_conf = getcurrentconf();

	include ('db.php');

	$conftitleq = $link->prepare('SELECT `conference_name` from `conferences` where `table_prefix` = (?) ');
	$conftitleq->bind_param('s',$current_conf);
	$conftitleq->execute();
	$conftitleq->bind_result($confqresult);
	while ($conftitleq->fetch() ) {
		$conftitle = $confqresult;
	}

	$conftitleq->close();
	return $conftitle;

}


function shellhtml($title,$navlocation,$body) {
	$pagehtml = 
		'<!DOCTYPE html>
		<html lang="en">
		  <head>
		    <meta charset="utf-8">
			 <title>'.
				$title	
			.'</title>
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <meta name="description" content="">
		    <meta name="author" content="">
		
		    <!-- Le styles -->
		    <link href="css/bootstrap.css" rel="stylesheet">
		    <style>
		      body {
		        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
		      }
		    </style>
		    <link href="css/bootstrap-responsive.css" rel="stylesheet">
		    <link href="css/conf.css" rel="stylesheet">
		
		    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		    <!--[if lt IE 9]>
		      <script src="js/html5shiv.js"></script>
		    <![endif]-->
		
		    <!-- Fav and touch icons -->
		    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
		      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
		                    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
		                                   <link rel="shortcut icon" href="ico/favicon.png">
		  </head>
		
		  <body id="confshell" class="'.$navlocation.'-body">
		
		    <div class="navbar navbar-fixed-top">
		      <div class="navbar-inner">
		        <div class="container text-right">
				  		<ul class="nav">
		          		<li><a class="" href="#">'.$title.'</a>
					 		<li><a href="preferences.php"><i class="icon-wrench"></i></a>
						</ul>
		        </div>
		      </div>
		    </div>
		
		    <div class="container">
			 	
			 		<h1><a href="index.php">'.$title.'</a></h1>

			 		<div class="row">
						<div class="span3" id="sidebar">

		            	<ul class="nav nav-list affix">
								<!------------------------------------------------------need function to highlight the current nav ---------->
			              <li class="active"><a href="events.php">Events</a></li>
			              <li><a href="attendees.php">Attendees</a></li>
			              <li><a href="reports.php">Reports</a></li>
		            </ul>

						</div>

						<div class="span9">
		
					 	'. $body .'

						</div>

					</div><!--row-->
		
		    </div> <!-- /container -->
		
		    <!-- Le javascript
		    ================================================== -->
		    <!-- Placed at the end of the document so the pages load faster -->
		    <script src="js/jquery.js"></script>
		    <script src="js/bootstrap-transition.js"></script>
		    <script src="js/bootstrap-alert.js"></script>
		    <script src="js/bootstrap-modal.js"></script>
		    <script src="js/bootstrap-dropdown.js"></script>
		    <script src="js/bootstrap-scrollspy.js"></script>
		    <script src="js/bootstrap-tab.js"></script>
		    <script src="js/bootstrap-tooltip.js"></script>
		    <script src="js/bootstrap-popover.js"></script>
		    <script src="js/bootstrap-button.js"></script>
		    <script src="js/bootstrap-collapse.js"></script>
		    <script src="js/bootstrap-carousel.js"></script>
		    <script src="js/bootstrap-typeahead.js"></script>
		
		  </body>
		</html>';


	return $pagehtml;

}


?>
