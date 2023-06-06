<!DOCTYPE html>
<html>
  <head>
    <title>Social Engineering Education</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <h1>Social Engineering Education</h1>
    </header>
    <main>
      <div class="box">
		  <h2>Comic based Scenarios:</h2>
        <p>Below is a scenario in the mind of an attacker named Fred shown in a comic format. Please read left to right and follow the numbers. The comic will describe a social engineering scenario and, in the end, explain the principle of influence Fred used and how it influenced the victim.</p>
        <div class="scenario">
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

// Retrieve all scenarios from the database
$sql = "SELECT * FROM comic_learning";
$result = mysqli_query($conn, $sql);
$num_scenarios = mysqli_num_rows($result);

// Store the scenarios in an array
$scenarios = array();
while ($row = mysqli_fetch_assoc($result)) {
  $scenario_id = $row['id'];
  $scenario_name = $row['scenario_name'];
  $comic_source = $row['comic_source'];
  $scenarios[] = array(
    "id" => $scenario_id,
    "scenario_name" => $scenario_name,
    "comic_source" => $comic_source,
  );
}

// Initialize the current scenario counter
if (!isset($_SESSION['current_scenario'])) {
  $_SESSION['current_scenario'] = 0;
}

// Display the current scenario
$current_scenario = $_SESSION['current_scenario'];
$scenario = $scenarios[$current_scenario];
echo "<article>";
echo "<h3>Scenario: {$scenario['scenario_name']}</h3>";
echo "<img src='{$scenario['comic_source']}' alt='Scenario {$scenario['id']}'>";
echo "</article>";

// Increment the current scenario counter
$current_scenario++;
if ($current_scenario >= $num_scenarios) {
  // Display the learning test button
  echo "<div class='button-container'>";
  echo "<button class='test-button' onclick='window.location.href=\"/Focus_Group1/testing/index.php\"'>Take the Learning Test</button>";
  echo "</div>";
  // Reset the current scenario counter to 0
  $current_scenario = 0;
}

$_SESSION['current_scenario'] = $current_scenario;

mysqli_close($conn);
?>

<button onclick="window.location.reload();">Next Scenario</button>
</div>
</div>
</main>
</body>
</html>



         
			

          

