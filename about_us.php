<?php

# We include database.php to connect to the database
include "database.php";

$conn = OpenCon();
$wall_paper = "only_plants.jpg";

CloseCon($conn);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>OnlyPlants</title>
    <style type="text/css">
      /* Font styling */
      h1 { font-family: 'Raleway Light', sans-serif; }
      h2 { font-family: 'Khula Regular', sans-serif; }
      h3 { font-family: 'Khula Regular', sans-serif; }
      p { font-family: 'Khula Regular', sans-serif; }
      li { 
        font-size: 18px;
        font-family: 'Khula Regular', sans-serif;
        list-style-type: none;
        }
        
      /* Styling for background */
      body, html {
        height: 100%;
        margin: 0;
        background-image: url('<?php echo $wall_paper;?>');
      }

      /* Style the header */
      header {
        background-color: #0CBE58;
        color: #fff;
        margin: 0;
        padding: 6px;
        height: 100px;
        display: flex;
        justify-content: flex-start;
        align-items: center;        
      }
      
      /* Style for h1 header */
      header h1 {
        font-size: 70px;
        margin: 0;
        text-align: center;
        width: 100%;
      }
      
      /* Style the footer */
      footer {
        background-color: #0CBE58;
        color: #fff;
        text-align: center;
        position: absolute;
        bottom: 0;
        width: 100%;
        margin: 0;
      }
      
      /* Style the navigation menu */
      nav {
        background-color: #07A149;
        float: left;
        width: 8%;
        padding: 20px;
        min-height: 80%;
        
      }
      
      /* Style the main content */
      .main {
        margin: 0px auto;
        padding: 20px;
        float: left;
        width: 70%;
      }
      
      header img {
        margin-right: 20px;
        width: 170px;
        height: 100px;
       }
      
      /* Clear the float */
      .clearfix::after {
        content: "";
        clear: both;
        display: table;
      }
      
    </style>
  </head>
  <body>
    <!-- Header -->
    <header>
      <img src="logo-white.png" alt="logo" />
      <h1>Only Plants</h1>
    </header>
    
    <!-- Navigation menu -->
    <nav>
      <h2>Navigation</h2>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Past Temps</a></li>
        <li><a href="#">Humidity</a></li>
        <li><a href="#">Soil Moisture</a></li>
        <li><a href="about_us.php">About Us</a></li>
      </ul>
    </nav>

    <!-- Main content -->
    <div class="main">
      <!-- Title with border -->
      <h1>Welcome to OnlyPlants</h1>
      <h2>About Us...</h2>
    </div>
    <!-- Clear the float -->
    <div class="clearfix"></div>

    <!-- Footer -->
    <footer>
      <p>Designed and Developed by JamsBond</p>
    </footer>
  </body>
</html>
