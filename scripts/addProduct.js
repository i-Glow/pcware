const fileInput = document.querySelector("#file-input");

fileInput.addEventListener("change", (e) => {
  let file = e.target.files[0];
  document.querySelector(".styled-file-input").innerText = `${file.name}: ${(
    file.size / 1024
  ).toFixed(2)}KB`;
});
