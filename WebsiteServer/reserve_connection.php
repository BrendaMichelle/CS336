<?php
$servername   = "127.0.0.1";
$database = "HultonHotels";
$username = "root";
$password = "Pikapoke1!1";

// Create connection
$conn = mysql_connect($servername, $username, $password);
// Check connection
if (!$conn) {
   die("Connection failed: " . $conn->connect_error);
}else{

	echo "Connected successfully\n";
}
//select the database
$db_selected = mysql_select_db($database, $conn);

if(!$db_selected){
	echo "ERROR\n";

}
$name = $_POST['Name'];
$email = $_POST['Email'];
$resDate = $_POST['Date'];
$room_type = $_POST['roomType'];
$hotel = $_POST['HotelID'];
$c_number = $_POST['CNumber'];

$sql = "INSERT INTO ReservationMakes(Resdate) VALUES('$resDate')";

if (mysql_query($sql)) {
    echo "\nCongrats on your Reservation!\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
