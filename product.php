<?php
include "db.php";

// HANDLE FORM SUBMISSION
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total_price = $_POST['total_price'];
    
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $customer_address = $_POST['customer_address'];
    $contact_no = $_POST['contact_no'];

//CHECK CURRENT STOCK
    $sql_stock = "SELECT stock FROM db1 WHERE product_id='$product_id'"; // COMMAND TO GET STOCK
    $result_stock = mysqli_query(mysql: $conn, query: $sql_stock); // EXECUTE SQL COMMAND 
    $row_stock = mysqli_fetch_assoc(result: $result_stock); //FETCH THE STOCK VALUE
    $current_stock = $row_stock['stock']; //DECLARE CURRENT STOCK VARIABLE

    if ($quantity > $current_stock ) {
        $message = "Order exceeds available stock! Only {$current_stock} left.";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='product-page.php';
            </script>";
     } else {
        $sql_insert = "INSERT INTO db2 (ID, product_name, price, quantity, total_price, customer_name, email, customer_address,
                        contact_no)
                       VALUES ('$product_id', '$product_name', '$price', '$quantity', '$total_price', '$customer_name', 
                       '$email', '$customer_address', '$contact_no')";
        if (mysqli_query($conn, $sql_insert)) {

            $new_stock = $current_stock - $quantity;
            $sql_update = "UPDATE db1 SET stock='$new_stock' WHERE product_id='$product_id'";
            mysqli_query($conn, $sql_update);

            $message = "Order placed successfully!";
            echo "<script type='text/javascript'>alert('$message');
            window.location.href='product-page.php';
            </script>";
        } else {
            $message = "Error: " . mysqli_error($conn);
        }
     }
}
?>