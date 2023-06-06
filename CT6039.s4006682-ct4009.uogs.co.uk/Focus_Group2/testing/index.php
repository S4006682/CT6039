<!DOCTYPE html>
<html>
<head>
	<title>Social Engineering Education</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Welcome to our Social Engineering Education Website</h1>
	</header>
	<main>
		<section>
			<div class="box">
			<h2>Text based Social Engineering Scenario Test</h2>
				<p>Below is a scenario in the mind of an attacker named Fred in a text format. Please read left to right and follow the numbers. The text will describe a social engineering scenario and, in the end, provides a form to select the principle of influence you believe Fred is using in the shown scenario.</p>
<div class="scenario">
<?php
	// generates a unique identifier based on the current time in microseconds
session_start();
if (isset($_SESSION['user_id'])) {
  // User id exists in session
  $user_id = $_SESSION['user_id'];
} else {
  // User id does not exist in session, generate new id
  $user_id = uniqid();
  $_SESSION['user_id'] = $user_id;
}
				// Connect to the database
				$servername = "localhost";
				$username = "S4006682";
				$password = "MQGBcc*Ept$7k6(8";
				$dbname = "social_engineering_db";
				$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}

				// Retrieve the next scenario ID for the user
				$sql = "SELECT scenario_id FROM block_responses WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					$last_scenario_id = mysqli_fetch_assoc($result)['scenario_id'];
					$next_scenario_id = $last_scenario_id + 1;
					} else {
						$next_scenario_id = 1;
					}

					// Retrieve the next scenario from the database
					$sql = "SELECT * FROM block_scenarios WHERE id='$next_scenario_id'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_assoc($result);
						$scenario_id = $row['id'];
						$block_source = $row['block_source'];
						$reciprocity_description = $row['reciprocity_description'];
						$commitment_description = $row['commitment_description'];
						$social_proof_description = $row['social_proof_description'];
						$liking_description = $row['liking_description'];
						$authority_description = $row['authority_description'];
						$scarcity_description = $row['scarcity_description'];
						
					
						// Display the scenario and form
						
						echo "<h2>Scenario $scenario_id</h2>";
						echo "<div>" . file_get_contents($row['block_source']) . "</div>";
						echo "<form method='post' action='submit.php'>";
						echo "<input type='hidden' name='user_id' value='$user_id'>";
						echo "<input type='hidden' name='scenario_id' value='$scenario_id'>";
						echo "<h3>What principle of influence do you believe fred is using in this scenario to target the victim?</h3>";
						echo "<label><input type='radio' name='influence' value='Reciprocity' required>Reciprocity ($reciprocity_description)</label><br>";
						echo "<label><input type='radio' name='influence' value='Commitment and Consistency' required>Commitment and Consistency ($commitment_description)</label><br>";
						echo "<label><input type='radio' name='influence' value='Social Proof' required>Social Proof ($social_proof_description)</label><br>";
						echo "<label><input type='radio' name='influence' value='Authority' required>Authority ($authority_description)</label><br>";
						echo "<label><input type='radio' name='influence' value='Liking' required>Liking ($liking_description)</label><br>";
						echo "<label><input type='radio' name='influence' value='Scarcity' required>Scarcity ($scarcity_description)</label><br>";
						echo "<input type='submit' value='Submit'>";
						echo "</form>";
					} else {
						echo "<p>No more scenarios.</p>";
						echo "<p>Thank you for completing my training</p>";
					}
					mysqli_close($conn);
					?>
		</div>
	</div>
</section>
</main>
</body>
</html>
