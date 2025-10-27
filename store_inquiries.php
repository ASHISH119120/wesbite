<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insurance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data safely
$name = mysqli_real_escape_string($conn, $_POST['name']);
$number = mysqli_real_escape_string($conn, $_POST['number']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$insurance_type = mysqli_real_escape_string($conn, $_POST['subject']);

// Insert data into database
$sql = "INSERT INTO inquiries (name, number, email, insurance_type)
        VALUES ('$name', '$number', '$email', '$insurance_type')";

if ($conn->query($sql) === TRUE) {
    // Redirect to thank-you page
    header("Location: thankyou.html");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
