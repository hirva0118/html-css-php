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

// Process the login form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check user credentials
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User authenticated, redirect to a success page
        header("Location: success.html");
        // echo "Successfull";
        exit();
    } else {
        // Authentication failed, display an error message
        echo "Invalid credentials. Please try again.";
    }
}
// Close the database connection
mysqli_close($conn);
?>
