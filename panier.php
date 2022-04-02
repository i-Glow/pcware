<?php 

  include('config/db.php');
  if(isset($_COOKIE["product"]))
    $products = json_decode($_COOKIE["product"]);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panier</title>
    <!-- <link rel="stylesheet" href="panier.css" /> -->
    <style><?php include('styles/panier.css') ?></style>
  </head>
  <body>
    <?php include("templates/navbar.php") ?>
    <div class="wrapper">
      <div class="product-list">
        <h2 class="title">Product</h2>
        <div id="item-list" class="item-list">
          <?php if(isset($products))foreach($products as $product){ ?>
            <?php   
              $id = $product->{"id"};
              $sql = "SELECT name, category, price, image FROM product WHERE prodid = '$id'";
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_assoc($result);
            ?>
          <div class="item">
            <div class="item-details">
              <img class="image" src="data:image/png;charset=utf8;base64,<?php echo base64_encode($data["image"]); ?>" />
              <h3 class="detail-name"><?php echo $data["name"] ?></h3>
            </div>
            <div class="seperator"></div>
            <div class="item-color"><?php echo $data["category"] ?></div>
            <div class="seperator"></div>
            <div class="item-count">
              <button class="quantity plus">+</button>
              <span class="count"><?php echo $product->{"quantity"}; ?></span>
              <button class="quantity minus">-</button>
            </div>
            <div class="seperator"></div>
            <div class="item-price">
              <p>Pricing:</p>
              <b><?php echo $data["price"] * $product->{"quantity"} ?> DA</b>
            </div>
            <button class="delete-item">
              <svg
                width="18"
                height="20"
                viewBox="0 0 18 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  class="icon"
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M7.8 0.400024C7.34547 0.400024 6.92996 0.656827 6.72669 1.06337L5.85836 2.80002H1.8C1.13726 2.80002 0.599998 3.33728 0.599998 4.00002C0.599998 4.66277 1.13726 5.20002 1.8 5.20002L1.8 17.2C1.8 18.5255 2.87452 19.6 4.2 19.6H13.8C15.1255 19.6 16.2 18.5255 16.2 17.2V5.20002C16.8627 5.20002 17.4 4.66277 17.4 4.00002C17.4 3.33728 16.8627 2.80002 16.2 2.80002H12.1416L11.2733 1.06337C11.07 0.656827 10.6545 0.400024 10.2 0.400024H7.8ZM5.4 7.60002C5.4 6.93728 5.93726 6.40002 6.6 6.40002C7.26274 6.40002 7.8 6.93728 7.8 7.60002V14.8C7.8 15.4628 7.26274 16 6.6 16C5.93726 16 5.4 15.4628 5.4 14.8V7.60002ZM11.4 6.40002C10.7373 6.40002 10.2 6.93728 10.2 7.60002V14.8C10.2 15.4628 10.7373 16 11.4 16C12.0627 16 12.6 15.4628 12.6 14.8V7.60002C12.6 6.93728 12.0627 6.40002 11.4 6.40002Z"
                  fill="#111826"
                />
              </svg>
            </button>
          </div>
          <?php } ?>
        </div>
        <div class="menu">
          <div class="button-area">
            <a class="link" href="index.php"
              ><svg
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 13L6 10M6 10L9 7M6 10L14 10M1 10C1 5.02944 5.02944 1 10 1C14.9706 1 19 5.02944 19 10C19 14.9706 14.9706 19 10 19C5.02944 19 1 14.9706 1 10Z"
                  stroke="#111826"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              back to home</a
            >
          </div>
          <div class="button-area">
            <button class="delete-all">
              empty list
              <svg
                width="14"
                height="14"
                viewBox="0 0 14 14"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M1 13L13 1M1 1L13 13"
                  stroke="#111826"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
            </button>
          </div>
          <div class="button-area">
            total:
            <h2 id="total-price">0 DA</h2>
          </div>
        </div>
      </div>
      <div class="checkout">
        <div class="checkout-body"></div>
        <div class="checkout-bottom">Note that!</div>
      </div>
    </div>
    <script><?php include('scripts/panier.js'); ?></script>
  </body>
</html>
