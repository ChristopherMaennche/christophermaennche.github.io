<?php
$host = "localhost";
$username = "activecampaign";
$password = "garfield";
$dbname = "ActiveCampaign";

// Create connection
$conn = mysqli_connect($host, $username, $password);
$db = mysqli_select_db($conn, $dbname);