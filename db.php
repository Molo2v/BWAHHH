<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "ecommerce_sj";

$conn = new mysqli ($host, $user, $password, $dbname);
if($conn->connect_error) {
    die ('Connection error: ' .$conn->connect_error);
}
?>