<?php
// get latitude and longitude from GET request
$lat = $_GET['lat'];
$long = $_GET['long'];

// open location.txt file in append mode
$file = fopen("location.txt", "a");

// write latitude and longitude to the file
fwrite($file, $lat . "," . $long . "\n");

// close the file
fclose($file);
?>
