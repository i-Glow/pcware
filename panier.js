const itemList = document.getElementById("item-list");
const count = document.querySelectorAll(".item-count");
const product = document.querySelectorAll(".item");
const deleteAll = document.querySelector(".delete-all");
const totalPrice = document.getElementById("total-price");
const price = document.querySelectorAll(".item-price");

totalPriceHandler();

// product count
count.forEach((item, i) => {
  item.children[0].addEventListener("click", () => {
    let value = item.children[1].innerText;
    let singlePrice = price[i].children[1].innerText.split(" ")[0] / value;
    value++;
    item.children[1].innerText = value;
    price[i].children[1].innerText = singlePrice * value + " DA";

    cookieQuantity(i, value);
    totalPriceHandler();
  });

  item.children[2].addEventListener("click", () => {
    let value = item.children[1].innerText;
    let singlePrice = price[i].children[1].innerText.split(" ")[0] / value;
    if (value > 1) {
      value--;
      price[i].children[1].innerText = singlePrice * value + " DA";
    }
    item.children[1].innerText = value;

    cookieQuantity(i, value);
    totalPriceHandler();
  });
});

//update quantity in cookies
function cookieQuantity(idx, value) {
  let list = getCookies();
  list[idx].quantity = value;
  const res = JSON.stringify(list);
  document.cookie = "product=" + res + "; path=/";
}

//delete one product from cart
product.forEach((product, i) => {
  const deleteButton = document.querySelectorAll(".delete-item")[i];
  deleteButton.addEventListener("click", () => {
    product.remove();
    //remove from cookies
    let list = getCookies();
    list.splice(i, 1);
    const res = JSON.stringify(list);
    document.cookie = "product=" + res + "; path=/";

    totalPriceHandler();
  });
});

//delete all from cart
deleteAll.addEventListener("click", () => {
  product.forEach((product) => {
    product.remove();
    //remove from cookies
    document.cookie = "product=;";

    totalPrice.innerText = "0 DA";
  });
});

// total price
function totalPriceHandler() {
  const newPrice = document.querySelectorAll(".item-price");
  let totalAmount = 0;

  newPrice.forEach((el) => {
    let money = Number(el.children[1].innerText.split(" ")[0]);
    totalAmount += money;
  });

  totalPrice.innerText = totalAmount + " DA";
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
