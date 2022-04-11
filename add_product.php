<?php 

  include("config/db.php");
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
      $sql = "INSERT INTO product (name, category, price, quantity, image) VALUES('$name', '$category', '$price', '$quantity', $imgContent')";
      if(mysqli_query($conn, $sql)){
        header('Location: index.php');
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
    <title>Document</title>
    <!-- <link rel="stylesheet" href="add_product.css" /> -->
    <style><?php include('styles/add_product.css'); ?></style>
  </head>
  <body><?php include("templates/navbar.php") ?>
    <div class="main">
      <form action="add_product.php" method="POST" enctype="multipart/form-data" >
        <label for="name"> name </label>
        <input type="text" name="name" />
        <label for="category"> category </label>
        <input type="text" name="category" />
        <label for="price"> price </label>
        <input type="number" name="price" />
        <label for="price"> quantity </label>
        <input type="number" name="quantity" />
        <label for="image"> + </label>
        <input type="file" name="image" />
        <button type="submit" name="submit">submit</button>
      </form>
    </div>
    <?php include('templates/footer.php'); ?>
  </body>
</html>
