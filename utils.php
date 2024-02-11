<?php
  // simple function to read .env files
  function env() {
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/.env';
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $envVariables = [];

    foreach ($lines as $line) {
      if (strpos(trim($line), '#') === 0 || empty($line)) {
        continue;
      }

      list($key, $value) = explode('=', $line, 2);

      $value = trim($value, "'");
      $value = trim($value, '"');

      $envVariables[$key] = $value;
      putenv("$key=$value");
    }

    // Return the array of environment variables
    return $envVariables;
  }
  env();
  //print_r(env());