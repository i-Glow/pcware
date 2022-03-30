const itemList = document.getElementById("item-list");

// getting data from cookies

let mycookie = document.cookie.split("=")[1];
let productList = JSON.parse(mycookie);

productList.forEach((el) => {
  createElements(el);
});

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

    totalPriceHandler();
  });
});

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

function createElements(data) {
  let content = `<div class="item-details">
  <h3 class="detail-name">${data.name}</h3>
</div>
<div class="seperator"></div>
<div class="item-color">${data.category}</div>
<div class="seperator"></div>
<div class="item-count">
  <button class="quantity plus">+</button>
  <span class="count">1</span>
  <button class="quantity minus">-</button>
</div>
<div class="seperator"></div>
<div class="item-price">
  <p>Pricing:</p>
  <b>${data.price}</b>
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
</button>`;

  let productNode = document.createElement("div");
  productNode.className = "item";
  productNode.innerHTML = content;
  itemList.appendChild(productNode);
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
