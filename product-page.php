<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
    * {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* NAV-BAR */
        .nav-bar {
            border: 1px solid black;
            background-color: rgb(7, 7, 63);
            margin-top: 0;
            padding: 20px;
            display: flex;
            justify-content: space-between;

        }

        a {
            margin-left: 10px;
            color: white;
            text-decoration: none;
        }

        .logo {
            font-size: large;
            text-decoration: bold;
        }

        .right {
            justify-content: flex-end;
            align-content:flex-end;
        }

    /*PRODUCT SECTION*/
  
    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        width: 100%;
        padding: 20px;
    }

    .product-card {
        width: 100%;
        margin: auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-img-holder {
        width: 100%;
        height: 100%;
        border: 2px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .product-img-holder {
        height: 250px;
    }

    .product-img-holder img {
        object-fit: cover;
        height:100%;
        width:100%;
    }

    @media(max-width: 500px) {
        .product-img-holder {
            height: 160px;
        }
    }

    .button {
        border: 2px solid gray;
        width: 50%;
        display: flex;

    }

    /* FOOTER */
    footer {
        background-color: rgb(7, 7, 63);
        padding: 10px;
        color: white;
        position: fixed;
        overflow: hidden;
        bottom: 0;
        width: 100%;
    }
    
    /* MODAL */

    .active{
      display: block;
    }

    label {
      margin-top: 10px;
      text-align: justify;
      color: black;
    }

    input[type=number] {
      border: 1px solid gray;
      background-color: transparent;
      padding: 5px;
      border-radius: 5px;
      text-align: left;
      margin-top: 5px;
      width: 90%;
    }

    input[type=text] {
      border: 1px solid gray;
      background-color: transparent;
      padding: 5px;
      border-radius: 5px;
      text-align: left;
      margin-top: 5px;
      width: 90%;
    }
    
    #place {
      border: 1px solid rgb(21, 58, 21);
      border-radius: 7px;
      background-color: rgb(21, 58, 21);
      color: white;
      padding: 10px 30px;
      margin-top: 20px;
    }

    #cancel {
      border: 1px solid gray;
      border-radius: 7px;
      background-color: transparent;
      color: black;
      padding: 10px 30px;
      margin-top: 10px;
    }

    .modal-bg {
     background-color: rgba(0, 0, 0, 0.5);
    height: 100%;
    padding-top: 100px;
    }

    .product-form {
      display: flex;
      justify-content: space-around;
      background-color: white;
      width: 50%;
      position: relative;
      left: 25%;
      border-radius: 10px;
      padding: 20px 20px 20px 0px;
    }

    .img-box {
      margin: 20px;
    }

    .img-box img {
      width: 200px;
      height: 200px;
      border: 2px solid gray;
      border-radius: 10px;
    }

    .buttons {
      padding-top: 10px;
      padding-right: 30px;
    }
  </style>
</head>

    <header>
        <div class="nav-bar">
            <b><a href="" id="logo"> E-Commerce ni Dom </a></b>
            <div class="nav-texts">
            <a href="home-page.php" class="right"> Home </a>
            <a href="about-page.php" class="right"> About </a>
            <a href="product-page.php" class="right"> Products </a>
            <a href="contact-page.php" class="right"> Contact us </a>
            </div>
        </div>

        <center> 
        <h1> All Products </h1>
        </center>
    </header>

    <section>
      <?php
      include 'db.php';

      $sql = "SELECT * FROM db1";
      $result = $conn->query($sql);
      ?>
      <div class="product-grid">
        <?php
        if ($result->num_rows > 0) {
          while ($product = $result->fetch_assoc()) {
        ?>

            <div class="product-card">

              <!--IMAGE HOLDER-->
              <div class="product-img-holder">
                <img src="showimage.php?id=<?php echo ($product['product_id']); ?>" alt="Product Image" >
              </div>

              <!--IMAGE-->
              <div class="label-box">
                <strong> Product Name: </strong> <?php echo ($product['product_name']); ?>
              </div>

              <!--PRICE LABEL-->
              <div class="label-box">
                <strong> Price: </strong> ₱ <?php echo number_format($product['price'], 2); ?>
              </div>

              <!--STOCK LABEL-->
              <div class="label-box">
                <strong> Stocks Available: </strong> <?php echo $product['stock']; ?>
              </div>

              <!--BUTTONS-->
              <div class="btn-group">
                <button class="add-cart" onclick="addToCard(<?php echo $product['product_id']; ?>)">
                  Add to Cart
                </button> <br>

                <button class="buy-now" onclick="openModal(
                        <?php echo $product['product_id']; ?>,
                        '<?php echo addslashes($product['product_name']); ?>',
                        <?php echo $product['price']; ?>)">
                  Buy Now
                </button>
              </div>
            </div>
              <?php
        
        } } else {
          echo "<p> No products available. </p>";
        }
        $conn->close();
      ?>

              <div id="modal" class="modal">
              <div class="modal-bg" id="modal-bg">
                <form action="product.php" method="POST" class="product-form">
                  
                  <div class="img-box">
                    <img src="" alt="" id="p_img">
                  </div>

                  <div class="product">
                    <label>Product ID: </label><br>
                    <input type="number" name="product_id" id="product_id" readonly><br>

                    <label>Product name:</label><br>
                    <input type="text" name="product_name" id="product_name" readonly><br>
                    
                    <label>Price:</label><br>
                    <input type="number" name="price" id="price" readonly><br>
                    
                    <label>Quantity:</label><br>
                    <input type="number" name="quantity" id="quantity" oninput="computeTotal()"> <br>
                     <div class="buttons">

                     <label>Total:</label><br>
                    <input type="number" id="total_price" name="total_price" value=""><br>

                    <input type="submit" value="Place Order" id="place">

               </div>   
                    
                  </div>

                  <!-- CUSTOMER DETAILS -->

                  <div class="customer">
                  <label>Customer's Name:</label><br>
                  <input type="text" name="customer_name" id="customer_name" class="buyer"> <br>

                  <label>Email:</label><br>
                  <input type="text" name="email" id="email" class="buyer"> <br>

                  <label>Address:</label><br>
                  <input type="text" name="customer_address" id="customer_address" class="buyer"> <br>
                  
                  <label>Contact Number:</label><br>
                  <input type="number" name="contact_no" id="contact_no" class="buyer"> <br><br><br><br><br>

                  <input type="button" onclick="closeModal()" value="Cancel" id="cancel" class="buyer">
                  </div>
                </form>
              </div>
              

    
            </div>
    </section>
  </main>

    <footer>
      <center> 
      <h6><b> Copyright 2025. All rights reserved. </b></h6>
      <a href="" id="foot"> Privacy </a>
      <a href="" id="foot"> Terms & Agreement </a>
      </center>
</footer>
</body>

<script>
  

  function openModal(id, name, price) {
    document.getElementById("modal").classList.add("active");
    document.getElementById("product_id").value = id;
    document.getElementById("product_name").value = name;
    document.getElementById("price").value = price;
    document.getElementById("total_price").value = price;
    document.getElementById("p_img").src = "showimage.php?id=" + id;
    document.getElementById("quantity").value = 1;

   }

  function closeModal() {
    document.getElementById("modal").classList.remove("active");

  }

  function computeTotal() {
    let price = document.getElementById("price").value;
    let quantity = document.getElementById("quantity").value;
    document.getElementById("total_price").value = price * quantity;
  }
</script>

</html>