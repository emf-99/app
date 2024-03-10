<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'dbconnect.php'; 

// Do logic to check if user session exist. 
// If it doesn't redirect user to login page. Make sure this doesn't run on login page by checking url with php