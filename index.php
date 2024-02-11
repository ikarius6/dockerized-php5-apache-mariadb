<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/utils.php');

  // Database connection parameters
  $servername = getenv('MYSQL_HOST');
  $username = getenv('MYSQL_USER');
  $password = getenv('MYSQL_PASSWORD');
  $database = getenv('MYSQL_DATABASE');

  // Connect to MySQL database
  $conn = mysql_connect($servername, $username, $password);

  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysql_error());
  }

  echo "Connected successfully";
