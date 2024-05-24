<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user profile.css">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->



    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="bootstrap.min.css">
   <!----css3---->
    <link rel="stylesheet" href="custom.css">
  
  
  <!--google fonts -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


<!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">


    <title>User Profile</title>
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

                <li><a href="./post id.php">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Post</span>
                </a></li>
                <li><a href="./user profile.php">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">User Profile</span>
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


            <div class="menu1">
            </div>
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
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                                <h2 class="ml-lg-2">Manage User</h2>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
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
    
                            // SQL query to fetch username and email from the database
                            $sql = "SELECT Username, Email FROM users";
    
                            $result = $conn->query($sql);
    
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["Username"] . "</td>";
                                echo "<td>" . $row["Email"] . "</td>";
                                echo "</tr>";
                            }
    
                            // Close connection
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


       
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
   
   
   <script type="text/javascript">
         
     $(document).ready(function(){
       $(".xp-menubar").on('click',function(){
         $('#sidebar').toggleClass('active');
       $('#content').toggleClass('active');
       });
       
        $(".xp-menubar,.body-overlay").on('click',function(){
          $('#sidebar,.body-overlay').toggleClass('show-nav');
        });
       
     });
     
 </script>
   
   
		
</script>
</body>
</html>