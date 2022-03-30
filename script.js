const products = document.querySelectorAll(".product-card");
const add = document.querySelectorAll(".add");

let productList = new Array();

products.forEach((el) => {
  productList.push({
    name: el.children[1].innerText,
    category: el.children[2].innerText,
    price: el.children[3].innerText,
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
    if (!list.some((el) => el.name === productList[i].name))
      list.push(productList[i]);

    const res = JSON.stringify(list);
    document.cookie =
      "product=" + res + "; expires= Fri, 31 Dec 9999 23:59:59 GMT; path=/";
  });
});