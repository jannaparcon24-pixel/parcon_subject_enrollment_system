<?php
$host = "sql101.infinityfree.com";
$user = "if0_43405576";
$pass = "cLycXjqglT";
$db = "if0_43405576_enrollment";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>