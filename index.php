<?


/* pull in the function to write the page */
include('shell.php');

/* actual html for the content section */
$body = '

	<h2><a href="register.php">Register Attendees</h2>
	<h2><a href="events.php">Events</h2>
		<ul>
			<!-- ------------------------------- generate this list automatically ----------->
			<li><a href="#">61 Class Reunion
			<li><a href="#">61 Class Reunion
			<li><a href="#">61 Class Reunion
			<li><a href="#">More&hellip;
		</ul>
	<h2><a href="attendees.php">Attendees</h2>
	<h3><a href="reports.php">Reports</h3>
	<h3><a href="preferences.php">Preferences</h3>

	';


/* set the page parameters */
		$title = getconferencetitle();
		$navlocation = "home";

/* write the html */
echo shellhtml($title,$navlocation,$body);

?>
