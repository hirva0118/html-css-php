<?php
// Database connection parameters
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'wd';

// Create a database connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the registration form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    // Insert candidate data into the database
    $query = "INSERT INTO new_useer VALUES ('$first_name', '$middle_name', '$last_name', '$dob', '$city', '$address')";

    if (mysqli_query($conn, $query)) {
        // Registration successful, you can redirect to a success page or perform other actions
        echo "Registration successful.";
    } else {
        // Registration failed, display an error message
        echo "Registration failed. Please try again.";
    }
}
// Close the database connection
mysqli_close($conn);
?>
