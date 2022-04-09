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
  if (!list.some((el) => el.id === product.id)) {
    list.push(product);
  }

  const res = JSON.stringify(list);
  document.cookie =
    "product=" + res + "; expires= Fri, 31 Dec 9999 23:59:59 GMT; path=/";
});
