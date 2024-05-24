<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->



    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!----css3---->
    <link rel="stylesheet" href="./post id.css">
  
     <!--google fonts -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


<!--google material icon-->
 <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">




    <title>post</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="finalogo.png" alt="logo">
            </div>

            <span class="logo_name">Quilverse</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="./homepage.html">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Dashboard</span>
                </a></li>
                <li><a href="./user profile.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">User Profile</span>
                </a></li>
                <li><a href="./post id.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Post</span>
                </a></li>
            </ul>

            
            <ul class="logout-mode">
                <li><a href="#">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Logout</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <form id="searchForm" method="post" action="search_posts.php">
    <div class="search-box" style="width:800px">
        <i class="uil uil-search"></i>
        <input id="searchInput" type="text" name="search_post" placeholder="Search by PostID...">
        <!-- No need for the submit button -->
    </div>
</form>

<script>
    document.getElementById("searchInput").addEventListener("keypress", function(event) {
        // Check if Enter key is pressed (key code 13)
        if (event.keyCode === 13) {
            event.preventDefault(); // Prevent default form submission
            document.getElementById("searchForm").submit(); // Submit the form
        }
    });
</script>


            <img src="5315392-middle.png" alt="profile" style="width:100px; height:80px;">
        </div>
<br>
<br>
<br>
         <!--------main-content------------->
		   
		   <div class="main-content">
            <div class="row">
              
             <div class="col-md-12">
             <div class="table-wrapper">
    
         <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
           <h2 class="ml-lg-2">Recent Post</h2>
         </div>
         <div>
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

            // Handle post deletion
            if (isset($_GET['delete'])) {
              $postID = $_GET['delete'];
              $sql_delete = "DELETE FROM posts WHERE PostID = $postID";
              if ($conn->query($sql_delete) === TRUE) {
                echo "<p>Post deleted successfully.</p>";
              } else {
                echo "Error deleting post: " . $conn->error;
              }
            }

            // Pagination configuration
            $results_per_page = 7;
            $current_page = 1;
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
              $current_page = intval($_GET['page']);
            }
            $start_index = ($current_page - 1) * $results_per_page;

            // SQL query to fetch data with pagination
            $sql = "SELECT users.Username, posts.PostID FROM posts INNER JOIN users ON posts.UserID = users.UserID LIMIT $start_index, $results_per_page";

            $result = $conn->query($sql);

            // Check if there are results
            if ($result->num_rows > 0) {
              echo "<table class='table table-striped table-hover'>";
              echo "<thead>";
              echo "<tr>";
              echo "<th><strong>Post ID</strong></th>";
              echo "<th><strong>Username</strong></th>";
              echo "<th><strong>Action</strong></th>"; // New column for action
              echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["PostID"] . "</td>";
                echo "<td>" . $row["Username"] . "</td>";
                echo "<td><a href='?delete=" . $row["PostID"] . "' class='btn-delete'>Delete</a></td>"; // Delete button
                echo "</tr>";
              }
              echo "</tbody>";
              echo "</table>";

              // Pagination links
              $sql_count = "SELECT COUNT(*) AS total FROM posts";
              $result_count = $conn->query($sql_count);
              $row_count = $result_count->fetch_assoc();
              $total_pages = ceil($row_count["total"] / $results_per_page);

              echo "<div class='pagination'>";
              for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='?page=$i'>$i</a>";
              }
              echo "</div>";
            } else {
              echo "0 results";
            }

            $conn->close();
        ?>



</div>

</body>
</html>