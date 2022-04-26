<?php 
  $id = $_GET["id"];
  include("../config/db.php");
  $sql = "SELECT * FROM product WHERE prodid = '$id'";
  $result = mysqli_query($conn, $sql);
  $product = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
  <title><?php echo $product['name'] . ' - Details page'; ?></title>
  <link rel="stylesheet" href="../styles/variables.css">
  <link rel="stylesheet" href="../styles/typography.css">
  <link rel="stylesheet" href="../styles/details.css">
</head>
<body>
  <?php include("../templates/navbar.php"); ?>
  <div class="wrapper">
    <div class="product" id=<?php echo $product["prodid"]; ?>>
      <div class="image"><img width="80%" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($product["image"]); ?>" alt="a"></div>
      <div class="description">
        <h2 class="name"><?php echo $product["name"]; ?></h2>
        <h4 class="category"><?php echo $product["category"]; ?></h4>
        <div class="seperator"></div>
        <p class="price">Unit Price: <?php echo $product["price"]; ?> DA</p>
        <div class="quantity">
          <span class="qty">QTY</span>
          <select id="qty-value">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <button class="buy">ADD TO CART</button>
        <p><span>In Stock: <span><?php echo $product["quantity"]; ?></p>
      </div>
    </div>
    <div class="details"></div>
  </div>
  <?php include("../templates/footer.php"); ?>
  <script src="../scripts/details.js" ></script>
  <script src="../scripts/theme.js" ></script>
</body>
</html>