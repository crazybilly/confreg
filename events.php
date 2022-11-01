<?

include('shell.php');
include('db.php');

/* what event is this? */
$eventid = 1;

/* get details about the event */
		/* ---------------------------probably need to join in the place name -------------- */
$eventdetailsq = $link->prepare("SELECT * from `events` where `event_id` = (?) ");
$eventdetailsq->bind_param('s',$eventid);
$eventdetailsq->execute();
$eventdetailsq->bind_result($eventidq,$eventname,$eventcost,$time,$date,$place,$confID);
while ($eventdetailsq->fetch() ) {
	$eventdetails['name'] = $eventname;
	$eventdetails['cost'] = $eventcost;
	$eventdetails['time'] = $time;
	$eventdetails['date'] = $date;
	$eventdetails['place'] = $place;
}
$eventdetailsq->close();


/* grab the conference ID out of the cookie */
$current_conf = getcurrentconf();

/* get a list of registered attendees; returns an array of attendees where pidm is key and val = array of details

	/* set the table name of the registration table */
	$eventtablename = $current_conf."_registration";
	$eventattendeeqstring = "SELECT a.attendee_ID as pidm, first, last, amt_paid, meal_choice FROM `attendees` a, `".$eventtablename."` r where r.event_id = (?) and a.attendee_ID = r.attendee_ID ";
	$eventattendeesq = $link->prepare($eventattendeeqstring);
	$eventattendeesq->bind_param('i',$eventid);
	$eventattendeesq->execute();
	$eventattendeesq->bind_result($pidm, $first, $last, $amt_paid, $meal);
	while ($eventattendeesq->fetch() ) {
		$eventattendees[$pidm] = Array($first,$last,$amt_paid,$meal);
	}

/* get count of attendees */
	$numberattendees = count($eventattendees);


/* starting writing the html */

	/* set the page parameters */
		$title = getconferencetitle();
		$navlocation = "events";

	/* start writing the body */
	$body ="
		<div class='row titlerow'>
			<h2 class='span4'>".$eventdetails['name']."</h2>
			<div class='attendeenum span2'>".$numberattendees."</div>
		</div> <!-- title row -->
		
		<div class='row eventdesc'>
			<div class='span2'>
				Place: ".$eventdetails['place']."
			</div>
			<div class='span2'>
				Cost: ".$eventdetails['place']."
			</div>
		</div> <!-- eventdesc -->
		
		<div class='row eventdesc'>
			<div class='span2'>
				Time: ".$eventdetails['time']."
			</div>
			<div class='span2'>
				Date: ".$eventdetails['date']."
			</div>
		</div> <!-- eventdesc -->


		<h3>Attendees</h3>
		";



		/* output the html */
		echo shellhtml($title,$navlocation,$body);

?>
