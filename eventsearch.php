<?php
require_once("dbconnect.php");


$rowsPerPage = 2;

if(isset($_POST['search'])){
	$search = $_POST['search'];
}
elseif(isset($_GET['search'])){
	$search = $_GET['search'];
}
else {
	header("location: schedule.php");
}


if(isset($_GET['start'])) 
{
	$start = $_GET['start'];
}
else{
	$start = 0;
}


if(isset($_GET['numpages'])){
	$numPages = $_GET['numpages'];
	$totalRows = $_GET['totalrows'];
}
else{
	$rowCountQuery = $dbc -> prepare("SELECT COUNT(eventID) AS count FROM floating_lights_festival.events WHERE eventName LIKE :search");
	$rowCountQuery -> bindValue(':search', '%' . $search . '%');
	$rowCountQuery -> execute();
	$rowCount = $rowCountQuery -> fetch();
	$totalRows = $rowCount['count'];
	
	if($totalRows <= $rowsPerPage){
		$numPages = 1;
	}
	else{
		$numPages = ceil($totalRows/$rowsPerPage);
	}
}


$eventsQuery = $dbc -> prepare("SELECT eventID, eventLocation, DATE_FORMAT(eventDate, '%m/%d/%y') AS date, eventImage, eventImgAlt, eventCost 
                                FROM floating_lights_festival.events 
                                WHERE eventName LIKE :search
                                ORDER BY eventDate
                                LIMIT $start, $rowsPerPage");

$eventsQuery -> bindValue(':search', '%' . $search . '%');
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
			
			<form action="eventsearch.php" method="post" class="searchform">
			<p>Search for available events: &nbsp;<input type="text" name="search" id="search">
			<button type="submit">Search</button></p>
			</form>
		</section>
		<section id="eventgrid">
		    <p>Your search returned <?php echo $totalRows; ?> results.</p>
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
		        <section id="pagination">
        			<p>
        			<?php
        			if($numPages > 1){
        				$currentPage = ($start/$rowsPerPage) + 1;	
        				
        				if($currentPage != 1){				
        				//Only show when not on first page
        					echo "<a href='eventsearch.php?start=" . ($start - $rowsPerPage) .  "&search=$search&numpages=$numPages&totalrows=$totalRows'>Previous</a> ";
        				}
        
        
        				//Show numbered pages here, with current page unlinked
        				for($i = 1; $i <= $numPages; $i++){
        					if($i != $currentPage){
        						echo " <a href='eventsearch.php?start=" . ($rowsPerPage * ($i - 1)) .  "&search=$search&numpages=$numPages&totalrows=$totalRows'>$i</a> ";
        					}else{
        						echo $i;
        					}
        				}
        				
        				if($currentPage != $numPages){				
        					//Only show when not on last page
        						echo "<a href='eventsearch.php?start=" . ($start + $rowsPerPage) .  "&search=$search&numpages=$numPages&totalrows=$totalRows'>Next</a> ";
        					}			
        			}
        			?>
        			</p>
        		</section>
</main>
<?php include ("footer.php");