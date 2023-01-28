<?php

include "database.php";

$conn = OpenCon();
$wall_paper = "only_plants.jpg";

$current_temp = "SELECT temp, time_stamp FROM temp ORDER BY time_stamp DESC LIMIT 1";
$previous_temps = "SELECT temp, time_stamp FROM temp WHERE id NOT IN (SELECT MAX(id) FROM temp) ORDER BY id DESC LIMIT 10";
$result1 = $conn->query($current_temp);
$result2 = $conn->query($previous_temps);

CloseCon($conn);



?>

<html>
<head>
<style type="text/css">
h1 {text-align: center;}
h2 {text-align: center;}
h3 {text-align: center;}
p {text-align: center;}
div {text-align: center;}
body {background-image: url('<?php echo $wall_paper;?>');}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OnlyPlants</title>
</head>
<body>
<h1 style='color:green;'>Only Plants</h1>
<p>Where the only thing that's wet is the soil!</p>
<p>
<?php
if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    echo "<h2>Current temp: ".$row['temp']."&#8451"." at ". $row['time_stamp']."</h2>";
}

echo "<h3>Previous Temps:</h3>";

if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        echo "<h3>".$row['temp']."&#8451"." at ". $row['time_stamp']."</h3>";
    }
}?>
</body>
</html>