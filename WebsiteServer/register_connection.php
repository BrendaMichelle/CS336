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
$address = $_POST['address'];
$phone_no = $_POST['phone'];

$sql = "INSERT INTO Customer(email, address, phone_no, name) VALUES('$email','$address', '$phone_no', '$name')";

if (mysql_query($sql)) {
    echo "\nNew record created successfully\n";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
