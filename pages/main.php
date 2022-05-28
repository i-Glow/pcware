<?php 
  include("../config/db.php");
  $result = mysqli_query($conn, "SELECT * FROM product ORDER BY RAND() LIMIT 12");
  $product = mysqli_fetch_all($result);

  $category = mysqli_query($conn, "SELECT DISTINCT(category) FROM product");
  $category = mysqli_fetch_all($category);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico">
    <title>PCWARE - Find your product</title>
    <link rel="stylesheet" href="../styles/variables.css">
    <link rel="stylesheet" href="../styles/typography.css">
    <link rel="stylesheet" href="../styles/style.css">
  </head>
  <body>
    <?php include("../templates/navbar.php") ?>
    <div class="body">
      <section class="hero">
        <div class="description">
          <h2>Best prices across the country</h2>
          <div>
            <p>It's about time you upgraded your computer, but where do you start?</p>
            <p>Here's the first step: build your own computer from the ground up.</p>
          </div>
          <div>
            <p>Buy a total of 15000DA and get a steam gift card</p>
            <p>and also get a 5% discount coupon for next purchases.</p>
          </div>
          <a href="#product-section">
            <button class="hero-btn">
              Start shoping → 
            </button>
          </a>
        </div>
        <img height="300px" src="../assets/images/steamcards.png"/>
      </section>
      <!-- PRODUCT SECTION -->
      <section id="product-section" class="products">
        <div class="filters">
          <h2 class="section-title">Our Products</h2>
          <div class="filter-btn">
            <button id="available" class="small-btn">Available</button>
            <button id="drop" class="small-btn">x</button>
          </div>
        </div>
        <div class="filters">
          <?php foreach($category as $cat){ ?>
          <label class="category">
            <input type="checkbox" class="checkbox" id="<?php echo $cat[0]; ?>">
            <span class="styled-checkbox"></span>
            <?php echo $cat[0]; ?>
          </label>
          <?php } ?>
        </div>
        <div class="product-grid">
          <?php foreach($product as $el){ ?>
          <div class="product-card" id="<?php echo $el[0]; ?>">
            <a href="<?php echo 'details.php?id=' . $el[0] ?>">
              <img height="150px" class="product-image" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($el[5]); ?>" />
            </a>
            <div class="product-name"><?php echo $el[1]; ?></div>
            <div class="product-type"><?php echo $el[2]; ?></div>
            <div class="product-price"><?php echo $el[3]; ?> DA</div>
            <button class="add" <?php if($el[4] == 0) echo 'style="display: none"';?>>ADD TO CART</button>
            <?php if($el[4] == 0){echo '<p class="stock">Out of stock</p>';}?> 
          </div>
          <?php } ?>
        </div>
      </section>
    </div>
    <!-- FOOTER -->
    <?php include('../templates/footer.php'); ?>
    <script src="../scripts/script.js"></script>
  </body>
</html>
