<?php 

  include("../config/db.php");
  if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
      $image = $_FILES['image']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
    }
    
    if($uploadOk == 1){
      $sql = "INSERT INTO product (name, category, price, quantity, image) VALUES('$name', '$category', '$price', '$quantity', '$imgContent')";
      if(mysqli_query($conn, $sql)){
        header('Location: main.php');
      }else {
        echo "error " . mysqli_error($conn);
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
    <title>New Product</title>
    <link rel="stylesheet" href="../styles/variables.css">
    <link rel="stylesheet" href="../styles/typography.css">
    <link rel="stylesheet" href="../styles/add_product.css">
  </head>
  <body>
    <?php include("../templates/navbar.php") ?>
    <div class="main">
      <form action="add_product.php" autocomplete="off" method="POST" enctype="multipart/form-data" >
        <h3>Product Details</h3>
        <input placeholder="Product name" type="text" name="name" required/>
        <input placeholder="Category" type="text" name="category" required/>
        <input placeholder="Price" type="number" name="price" min="0" max="999999" required/>
        <input placeholder="Quantity" type="number" name="quantity" required/>
        <label class="file-input">
          <div class="styled-file-input">
            Select image
          </div>
          <input type="file" id="file-input" name="image" accept="image/png" required/>
        </label>
        <button class="submit" type="submit" name="submit">SUBMIT</button>
      </form>
    </div>
    <?php include('../templates/footer.php'); ?>
    <script><?php include("../scripts/addProduct.js") ?></script>
  </body>
</html>
