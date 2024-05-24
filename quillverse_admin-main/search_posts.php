<?php
// Replace with your database connection details
$servername = "localhost";
$username = "root";
$password = "Shahil";
$dbname = "blog_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if search_post is set and not empty
    if (isset($_POST["search_post"]) && !empty($_POST["search_post"])) {
        $search_post = $_POST["search_post"];
        
        // Prepare a statement to fetch post by PostID
        $sql = "SELECT users.Username, posts.PostID FROM posts INNER JOIN users ON posts.UserID = users.UserID WHERE posts.PostID = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param("i", $search_post);
            
            // Execute statement
            $stmt->execute();
            
            // Get result
            $result = $stmt->get_result();
            
            // Check if there are results
            if ($result->num_rows > 0) {
                echo "<table class='table table-striped table-hover'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th><strong>Post ID</strong></th>";
                echo "<th><strong>Username</strong></th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["PostID"] . "</td>";
                    echo "<td>" . $row["Username"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No posts found.";
            }
            
            // Close statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Please enter a PostID.";
    }
}

// Close connection
$conn->close();
?>
