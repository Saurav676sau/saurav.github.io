<?php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $username = $_POST["username"];
  $password = $_POST["password"];

  // Connect to the databases
  $conn = mysqli_connect('localhost','root','','databases');

  // Check if the connection was successful
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Prepare the SQL query
  $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  // Execute the query
  if (mysqli_query($conn, $query)) {
    echo "Record created successfully";
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  // Close the connection
  mysqli_close($conn);
}
?>
