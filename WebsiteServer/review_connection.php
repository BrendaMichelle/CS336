<?php
$servername   = "127.0.0.1";
$database = "HultonHotels";
$username = "root";
$password = "Pikapoke1!1";

// Create connection
//$conn = new mysqli($servername, $username, $password);

$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
   die("Connection failed: " . $conn->connect_error);
}else{

	echo "Connected successfully\n";
}

$db_selected = mysql_select_db($database, $conn);

if(!$db_selected){
	echo "ERROR\n";
}

$name = $_POST['Name'];
$email = $_POST['Email'];
$subject = $_POST['Subject'];
$comment = $_POST['Comment'];
$date = $_POST['Date'];
$type = $_POST['roomType'];
$room_num = $_POST['roomNum'];
$rating = $_POST['Rating'];
$hotelID = $_POST['HotelID'];
$CID = "SELECT cid FROM Customer WHERE '$name' = name AND '$email' = email";
if(mysql_query($CID)){
	$sql = "INSERT INTO roomReviewEvaluates(Rating, TextComment, roomType, roomNum, hotelID, dateWritten) VALUES ('$rating' , '$comment' , '$type' , '$room_num' , '$hotelID' , '$date')";
	if(!mysql_query($sql)){
		die("you suck");
	}else{
		echo "success";
		//print query results
	}
}else{
	die("Please register!");
}

?>
