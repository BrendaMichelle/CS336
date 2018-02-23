<?php

// Create connection
//$conn = new mysqli($servername, $username, $password);

$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
   die("Connection failed: " . $conn->connect_error);
}
$db_selected = mysql_select_db($database, $conn);

if(!$db_selected){
	echo "ERROR\n";
}

$name = $_POST['Name'];
$email = $_POST['Email'];
$comment = $_POST['Comment'];
$date = $_POST['Date'];
$type = $_POST['serviceType'];
$rating = $_POST['Rating'];
$hotelID = $_POST['HotelID'];
$CID = "SELECT cid FROM Customer WHERE '$name' = name AND '$email' = email";
if(mysql_query($CID)){

	$sql = "INSERT INTO serviceReviewRates(Rating, TextComment, sType, hotelID, dateWritten) VALUES ('$rating' , '$comment' , '$type', '$hotelID' , '$date')";

	$sql2 = "SELECT * FROM serviceReviewRates";

	if(!mysql_query($sql)){
		die("you suck");
	}else{
		echo "Thanks for your feedback! Here are some other reviews!\n";
		$result = mysql_query($sql2) or die(mysql_error());
		 while($row = mysql_fetch_array($result)):
			$reviews = $row['TextComment'];
	   		$rating = $row['Rating'];
	   		$hotelID = $row['hotelID'];
	    	$output = "Review: $reviews <br/> Rating: $rating <br/> HotelID: $hotelID";
			echo "<div class =\"box\"> $output </div>";
			echo "\n";
		endwhile;
		
	}
}else{
	die("Please register!");
}

?>
