const cart = document.querySelector(".cart-count");

let itemCount = getCookies().length;
//if the cart has items do
if (itemCount) {
  cart.style.display = "flex";
  cart.innerText = itemCount;
}

function getCookies() {
  let mycookie = document.cookie || undefined;
  mycookie = mycookie?.split("=")[1];
  let list = new Array();
  if (mycookie) {
    mycookie = JSON.parse(mycookie);

    list = mycookie;
  }
  return list;
}
