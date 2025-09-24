<?php
require_once("dbconnect.php");

$eventID = $_GET['event'];

$query = $dbc -> prepare("
SELECT eventID, eventName, eventLocation, DATE_FORMAT(eventDate, '%m/%d/%y') AS date, eventImage, eventImgAlt, eventCost, eventPageID, eventDetail, eventHero
FROM floating_lights_festival.events
WHERE eventID = :eventID");
$query -> bindParam('eventID', $eventID);
$query -> execute();
$result = $query->fetch();

/*$datesquery = $dbc -> prepare("
SELECT DATE_FORMAT(eventDate, '%m/%d/%y') AS date
FROM floating_lights_festival.events 
WHERE eventID = :eventID");
$datesquery -> bindParam('eventID', $eventID);
$datesquery -> execute();
$datesresult = $datesquery->fetch();*/

$pagetitle = $result['eventName'];
$pageClass = $result['eventPageID'] . " eventpage";
//$heroImage = $result['eventHero'];
include("header.php");
?>

<main>	
		<section id="hero">
			<section id="herocontent">
				<p><?php echo $result['eventName'];?></p>
			</section>
		</section>
	
		<section id="mainhead">
			<h1><?php echo $result['eventLocation'] ?></h1>
			<p><?php echo $result['date'] ?></p>
		</section>
		<section id="eventdetails">
			<img src="images/<?php echo $result['eventImage'] ?>" width="400" height="300" alt="<?php echo $result['eventName']?>"/>
			
			<article>
				<p><?php echo $result['eventDetail'] ?></p>
				<p>$<?php echo $result['eventCost'] ?> per person</p>
				<p><a href="#" class="cta">Purchase Tickets</a></p>
			</article>
		</section>
	
</main>
<?php include("footer.php"); ?>