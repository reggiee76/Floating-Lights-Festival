<?php
$pagetitle = "Contact Page";
include("header.php");
?>
<main>
		
	
	<fieldset><legend >Have Questions?</legend>
	<p style="font-size: 22px; margin-left: 9em;"> Feel free to contact us </p>
				
	<form method="post" action="mailto:officialreggiee76@gmail.com">
			
		<label for="myName">Name:</label>
		<input type="text" name="myName" id="myName" required><br>
				
		<label for="myEmail">E-mail:</label>
		<input type="email" name="myEmail" id="myEmail" required><br>
				
		<label for="mycomment">Comments/Questions:</label>
		<textarea name="mycomment" rows="5" cols="40" id="mycomment" required></textarea><br>
		<input type="submit" value="Submit" id="mySubmit" >
	</form>
	</fieldset>
</main>        

<?php
include("footer.php");
?>