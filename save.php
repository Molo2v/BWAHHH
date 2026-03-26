<?php 
include 'db.php';

if($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if(!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== 0) {
        die("Image upload failed.");
    }

    //Read image binary.
    $imageData = file_get_contents($_FILES['product_image']['tmp_name']);

    $sql = "INSERT INTO db1
            (product_id, product_image, product_name, price, stock)
            VALUES (?, ?, ?, ?, ?)";;

    $stmt = $conn->prepare($sql);
    
    $stmt->bind_param(
        "issdi",
        $product_id,
        $imageData,
        $product_name,
        $price,
        $stock
    );

    if ($stmt->execute()) {
        echo "<script>
                alert('Product saved successfully!');
                window.location.href='admin.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>