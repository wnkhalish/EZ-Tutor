<html>

<?php
require_once("php/dbconfig.php");

	$query ="SELECT * FROM subject WHERE lID = '" . $_POST["lID"] . "'";
	$results = $conn->query($query);
	
?>
	<option value="" >Select Subject</option>
<?php
	while ($rss = $results->fetch_assoc()){
?>
	<option value="<?php echo $rss["sID"]; ?>"><?php echo $rss["sname"]; ?></option>
<?php

}
?>
</html>