<?php 
  $id = $_GET["id"];
  include("../config/db.php");
  $sql = "SELECT * FROM product WHERE prodid = '$id'";
  $result = mysqli_query($conn, $sql);
  $product = mysqli_fetch_assoc($result);

  $cat = $product['category'];
  $id = $product['prodid'];
  $sql2 = "SELECT prodid, name, price, image FROM product WHERE category = '$cat' AND prodid <> '$id'";
  $result2 = mysqli_query($conn, $sql2);
  $suggestions = mysqli_fetch_all($result2);
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
      <div class="image"><img height="400px" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($product["image"]); ?>" alt="a"></div>
      <div class="description">
        <h2 class="name"><?php echo $product["name"]; ?></h2>
        <h4 class="category"><?php echo $product["category"]; ?></h4>
        <div class="seperator"></div>
        <p class="price">Unit Price: <?php echo $product["price"]; ?> DA</p>
        <div class="quantity">
          <span class="qty">QTY</span>
          <select id="qty-value">
            <?php 
            $i = 1;
            while($i <= $product["quantity"] && $i <= 5){
              echo "<option value='$i'>$i</option>";
              $i++;
            }
            ?>
          </select>
        </div>
        <button class="buy" <?php if($product["quantity"] == 0) echo "disabled"; ?>>ADD TO CART</button>
      </div>
    </div>
    <section class="suggestions-section">
      <h2>More products</h2>
      <div class="suggestions-grid">
        <?php if(isset($suggestions)) foreach($suggestions as $sugg) { ?>
          <div class="suggestion" id="<?php echo $sugg[0] ?>">
          <a href="details.php?id=<?php echo $sugg[0]; ?>"><img height="150px" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($sugg[3]); ?>" alt="a"></a>
          <div>
            <p><?php echo $sugg[1]; ?></p>
            <p><?php echo $sugg[2]; ?>DA</p>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>
  <?php include("../templates/footer.php"); ?>
  <script src="../scripts/details.js" ></script>
</body>
</html>