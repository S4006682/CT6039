<?php
session_start();
// Connect to the database
$servername = "localhost";
$username = "S4006682";
$password = "MQGBcc*Ept$7k6(8";
$dbname = "social_engineering_db";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Start a session and assign a user ID if necessary


// Get the user ID and scenario ID from the submitted form data
$user_id = $_POST['user_id'];
$scenario_id = $_POST['scenario_id'];

// Get the selected influence from the submitted form data
$influence = $_POST['influence'];



// Insert the new user response into the database
$sql = "INSERT INTO block_responses (user_id, scenario_id, influence) VALUES ('$user_id', '$scenario_id', '$influence')";
if (mysqli_query($conn, $sql)) {
    echo "New response added successfully";
	header("Location: /Focus_Group2/testing/index.php");
	exit();
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>