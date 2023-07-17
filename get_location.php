<?php

// Retrieve the IP address of the visitor
$ip = $_SERVER['REMOTE_ADDR'];

// Use an IP geolocation service to obtain location information
$url = "http://ip-api.com/json/{$ip}";
$response = file_get_contents($url);
$data = json_decode($response);

// Extract relevant location details
$country = $data->country ?? '';
$region = $data->regionName ?? '';
$city = $data->city ?? '';
$zip = $data->zip ?? '';

// Create a string with the location information
$location = "{$city}, {$region}, {$country}, {$zip}";

// Write the location data to a text file
$file = fopen("location.txt", "w") or die("Unable to create file!");
fwrite($file, $location);
fclose($file);

?>
