<?php
  $data = json_decode(file_get_contents('php://input'), true); // decode the JSON data

  $latitude = $data['latitude'];
  $longitude = $data['longitude'];

  // append the data to location.txt file
  $file = fopen('location.txt', 'a');
  fwrite($file, $latitude . ',' . $longitude . "\n");
  fclose($file);

  echo 'Location data saved successfully.';
?>
