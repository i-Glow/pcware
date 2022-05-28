const add = document.querySelector(".buy");

add.addEventListener("click", () => {
  const quantity = document.querySelector("#qty-value").value;
  const prodid = document.querySelector(".product").id;

  const product = {
    id: prodid,
    quantity,
  };

  let mycookie = document.cookie || undefined;
  mycookie = mycookie?.split("=")[1];
  let list = new Array();
  if (mycookie) {
    mycookie = JSON.parse(mycookie);

    list = mycookie;
  }

  //check if product is already added to the cart
  if (!list.some((el) => el.id === product.id)) {
    //add product to list if not already there
    list.push(product);
  }

  const res = JSON.stringify(list);
  document.cookie =
    "product=" + res + "; expires= Fri, 31 Dec 9999 23:59:59 GMT; path=/";

  //update cart counter state
  productCount();
});

function productCount() {
  const cart = document.querySelector(".cart-count");

  let itemCount = getCookies().length;
  console.log(itemCount);
  if (itemCount > 0) {
    cart.style.display = "flex";
    cart.innerText = itemCount;
  } else {
    cart.style.display = "none";
  }
}
