<?php

# We include database.php to connect to the database
include "database.php";

$conn = OpenCon();
$wall_paper = "only_plants.jpg";

#SQL query to return the most recent temp and time stamp
$current_temp = "SELECT temp, time_stamp FROM temp ORDER BY time_stamp DESC LIMIT 1";
$result1 = $conn->query($current_temp);
#SQL query to return the remaining temps
$previous_temps = "SELECT temp, time_stamp FROM temp WHERE id NOT IN (SELECT MAX(id) FROM temp) ORDER BY id DESC LIMIT 10";
$result2 = $conn->query($previous_temps);

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
        
      /* Styling for background */
      body, html {
        height: 100%;
        background-image: url('<?php echo $wall_paper;?>');
      }

      /* Style the header */
      header {
        background-color: #0CBE58;
        color: #fff;
        padding: 5px;
        text-align: center;
        height: 100px;
      }
      
      /* Style the footer */
      footer {
        background-color: #0CBE58;
        color: #fff;
        padding: 0px;
        text-align: center;
        position: absolute;
        bottom: 0;
        width: 100%;
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
        float: left;
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
        <li><a href="#">Home</a></li>
        <li><a href="#">Past Temps</a></li>
        <li><a href="#">Humidity</a></li>
        <li><a href="#">Soil Moisture</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
    </nav>

    <!-- Main content -->
    <div class="main">
      <!-- Title with border -->
      <h1>Welcome to OnlyPlants</h1>
      <h2>Where the only thing that's wet is the soil!</h2>
      <p>
        <?php
          # PHP if statement to echo the current temp in nice format
          if ($result1->num_rows > 0) {
            $row = $result1->fetch_assoc();
            echo "<h3>Current temp: ".$row['temp']."&#8451"." at ". $row['time_stamp']."</h3>";
          }

          echo "<h3>Previous Temps:</h3>";
          # PHP if statement to echo the previous temps in nice format
          if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {
              echo "<h3>".$row['temp']."&#8451"." at ". $row['time_stamp']."</h3>";
            }
          }?>
      </p>
    </div>
    <!-- Clear the float -->
    <div class="clearfix"></div>

    <!-- Footer -->
    <footer>
      <p>Designed and Developed by JamsBond</p>
    </footer>
  </body>
</html>
