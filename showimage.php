<?php
include 'db.php';

if (!isset($_GET['id'])) die ("No ID Specified.");

$id = intval($_GET['id']); //sanitize input

$sql = "SELECT product_image FROM db1 WHERE product_id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) die ("No image found.");

$row = $result->fetch_assoc();

//Detext MIME type dynamically
$finfo = finfo_open();
$type = finfo_buffer($finfo, $row['product_image'], FILEINFO_MIME_TYPE);
finfo_close($finfo);

header("Content-Type: $type");
echo $row['product_image'];
?>