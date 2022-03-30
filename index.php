<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Good game</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="navbar.css" />
    <script src="script.js" defer></script>
  </head>
  <body>
    <!-- <div class="menu"></div> -->
    <div class="body">
      <?php include("./templates/navbar.php") ?>
      <!-- HERO SECTION -->
      <div class="hero-section">
        <img src="" alt="bg" class="hero-bg" />
        <h1 class="hero-title">Headphones</h1>
        <h2><q>W103 magic tour</q></h2>
        <div class="gaming-headset">
          <h2>gaming</h2>
          <h2>headset</h2>
        </div>
        <div class="seperator"></div>
        <div class="hero-desc">
          Wireless joystick from Microsoft. Ideal for those who are fed up with
          wires. Forget about the risk of shaking the console to the floor, too
          carried away by the game.
        </div>
        <div class="hero-btn-container">
          <button class="big-btn btn-active">
            ORDER NOW
            <svg
              width="18"
              height="20"
              viewBox="0 0 18 20"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M13 9V5C13 2.79086 11.2091 1 9 1C6.79086 1 5 2.79086 5 5V9M2 7H16L17 19H1L2 7Z"
                stroke="#fff"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
          <button class="big-btn">
            FAVORITE
            <svg
              width="18"
              height="18"
              viewBox="0 0 18 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M7.85874 1.71245C8.21796 0.606877 9.78205 0.606877 10.1413 1.71245L11.4248 5.66261C11.5854 6.15703 12.0462 6.49179 12.566 6.49179H16.7195C17.8819 6.49179 18.3653 7.97932 17.4248 8.66261L14.0646 11.1039C13.644 11.4095 13.468 11.9512 13.6287 12.4456L14.9122 16.3957C15.2714 17.5013 14.006 18.4207 13.0656 17.7374L9.70535 15.296C9.28476 14.9905 8.71525 14.9905 8.29466 15.296L4.93446 17.7374C3.994 18.4207 2.72863 17.5013 3.08785 16.3957L4.37133 12.4456C4.53198 11.9512 4.35599 11.4095 3.93541 11.1039L0.575205 8.66261C-0.365251 7.97932 0.118079 6.49179 1.28055 6.49179H5.43399C5.95386 6.49179 6.41461 6.15703 6.57525 5.66261L7.85874 1.71245Z"
                fill="#777"
              />
            </svg>
          </button>
        </div>
      </div>
      <!-- PRODUCT SECTION -->
      <section class="products">
        <div class="filters">
          <h2 class="section-title">Our Products</h2>
          <div class="filter-btn">
            <button class="small-btn btn-active">Available</button>
            <button class="small-btn">Price</button>
          </div>
        </div>
        <div class="product-grid">
          <div class="product-card">
            <img class="product-image" src="./assets/g203-prodigy-black.png" />
            <div class="product-name">Logitech G203</div>
            <div class="product-type">Mouse</div>
            <div class="product-price">6000 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
          <div class="product-card">
            <img class="product-image" src="./assets/g915.png" />
            <div class="product-name">Logitech G915</div>
            <div class="product-type">Keyboard</div>
            <div class="product-price">49000 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
          <div class="product-card">
            <img class="product-image" src="./assets/hyperx.png" />
            <div class="product-name">HyperX</div>
            <div class="product-type">Headset</div>
            <div class="product-price">21000 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
          <div class="product-card">
            <img class="product-image" src="./assets/rival310.png" />
            <div class="product-name">Rival 310</div>
            <div class="product-type">Mouse</div>
            <div class="product-price">12500 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
          <div class="product-card">
            <img class="product-image" src="./assets/Oculus-quest.png" />
            <div class="product-name">Oculus Quest</div>
            <div class="product-type">VR Glasses</div>
            <div class="product-price">57000 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
          <div class="product-card">
            <img class="product-image" src="./assets/g203-prodigy-white.png" />
            <div class="product-name">Logitech G203</div>
            <div class="product-type">Mouse</div>
            <div class="product-price">6000 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
          <div class="product-card">
            <img class="product-image" src="./assets/Corsair-MM350.png" />
            <div class="product-name">Corsair MM350</div>
            <div class="product-type">Mousepad</div>
            <div class="product-price">5000 DA</div>
            <button class="add">ADD TO CART</button>
          </div>
        </div>
      </section>
    </div>
    <!-- FOOTER -->
    <footer></footer>
  </body>
</html>
