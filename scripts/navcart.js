const cart = document.querySelector(".cart-count");
let itemCount = getCookies().length;

console.log(getCookies().length);

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
