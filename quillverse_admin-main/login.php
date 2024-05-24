<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root";
$password = "Shahil";
$dbname = "blog_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from form
    $username = $_POST['usrname'];
    $password = $_POST['psw'];
    
    // SQL query to check if user exists with the provided credentials
    $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, redirect to dashboard or another page
        header("Location: homepage.html"); // Change 'dashboard.php' to your desired destination
        exit();
    } else {
        // Invalid credentials, display error message
        echo "Invalid username or password";
    }
}

// Close connection
$conn->close();
?>
