const products = document.querySelectorAll(".product-card");
const add = document.querySelectorAll(".add");

// Add product to cart

let productList = new Array();

products.forEach((el) => {
  productList.push({
    id: el.id,
    quantity: 1,
  });
});

add.forEach((el, i) => {
  el.addEventListener("click", () => {
    let mycookie = document.cookie || undefined;
    mycookie = mycookie?.split("=")[1];
    let list = new Array();
    if (mycookie) {
      mycookie = JSON.parse(mycookie);

      list = mycookie;
    }
    if (!list.some((el) => el.id === productList[i].id)) {
      list.push(productList[i]);
    }

    const res = JSON.stringify(list);
    document.cookie =
      "product=" + res + "; expires= Fri, 31 Dec 9999 23:59:59 GMT; path=/";
  });
});

// Availabilty filter
const available = document.querySelector("#available");
let availableFilter = false;

available.addEventListener("click", () => {
  availableFilter ? availabileHandler() : availabileHandler("none");
  availableFilter = !availableFilter;
});

function availabileHandler(display = "") {
  products.forEach((el) => {
    if (el.children[5]) {
      if (checked.includes(el.children[2].innerText) || !checked.length)
        el.style.display = display;
      display !== "" ? updateClassLists(available) : updateClassLists();
    }
  });
}

// // Price filter
// const price = document.querySelector("#price");

// price.addEventListener("click", () => {
//   dropFilters();
//   priceHandler();
// });

// function priceHandler() {
//   updateClassLists(price);
// }

// Drop filters
const drop = document.querySelector("#drop");
drop.addEventListener("click", () => {
  dropFilters();
});

function dropFilters() {
  availabileHandler();
  availableFilter = false;
  // priceHandler();
}

function updateClassLists(button = null) {
  document.querySelectorAll(".small-btn").forEach((btn) => {
    btn.classList.remove("btn-active");
    button?.classList.add("btn-active");
  });
}

// Categories
const category = document.querySelectorAll(".checkbox");
const catName = document.querySelectorAll(".category");

let checked = new Array();

category.forEach((cat) => {
  cat.addEventListener("change", () => {
    if (cat.checked) {
      checked.push(cat.id);
      products.forEach((product) => {
        if (!checked.includes(product.children[2].innerText)) {
          product.style.display = "none";
        } else if (availableFilter && product.children[5]) {
          product.style.display = "none";
        } else {
          product.style.display = "";
        }
      });
    } else if (!cat.checked && checked.length) {
      const index = checked.indexOf(cat.id);
      if (index > -1) {
        checked.splice(index, 1);
      }
      products.forEach((product) => {
        if (product.children[2].innerText === cat.id) {
          product.style.display = "none";
        }
      });
    }
    if (!checked.length) {
      products.forEach((product) => {
        if (availableFilter && product.children[5])
          product.style.display = "none";
        else {
          product.style.display = "";
        }
      });
    }
  });
});
