<?php
require_once("dbconnect.php");

$eventsQuery = $dbc -> prepare("SELECT eventID, eventLocation, DATE_FORMAT(eventDate, '%m/%d/%y') AS date, eventImage, eventImgAlt, eventCost FROM floating_lights_festival.events ORDER BY eventDate");

$eventsQuery -> execute();

$pagetitle = "Schedule";
$pageclass = "events";
$heroImage = "fw.jpg";
include("header.php");
?>
<main>
		<section id="hero">
			<section id="herocontent">
			<p>Event Schedule</p>
			</section>
	</section>
	
	<section id="eventgrid">
		<section id="mainhead">
			<h1>2022 Lineup</h1>
			<p style="font-style: italic; ">Events are listed by date</p>
			<form action="eventsearch.php" method="post" class="searchform">
			<p>Or, you can search for available events: &nbsp;<input type="text" name="search" id="search">
			<button type="submit">Search</button></p>
			</form>
		</section>
		<section id="eventgrid">
				<?php
				while($eventResult = $eventsQuery -> fetch()){
					echo "<article>";
						echo "<a href='eventdetail.php?event=" . $eventResult['eventID'] ."'>";
						
						echo "<h2>" . $eventResult['eventLocation'] . "</h2>";
						echo "<img src='images/" . $eventResult['eventImage'] . "' alt= '" . $eventResult['eventImgAlt'] . "' >";
						echo "<p>" . $eventResult['date'] . "</p>";
						echo "<p> Admission: $" . $eventResult['eventCost'] . " per person. </p>";
						echo "</a></article>";
				}
			?>
		</section>
	</section>
</main>
<?php include ("footer.php");