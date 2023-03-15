<?php
$servername = "localhost";
$dbname = "ace_server";
$username = "root";
$password = "";

// create connection
$db = mysqli_connect($servername, $username, $password, $dbname);

// check connection
if ($db->connect_error) {
    die("connnection failed: " . $db->connect_error);
}
echo "connnection successful";
?>