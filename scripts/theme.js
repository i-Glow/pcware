const toggle = document.getElementById("switch-btn");
const toggleBtn = document.querySelector(".switch-btn");
const root = document.querySelector(":root");

const rs = getComputedStyle(root);

const darkBlack = rs.getPropertyValue("--dark-black");
const lightBlack = rs.getPropertyValue("--light-black");
const black = rs.getPropertyValue("--black");
const whiteText = rs.getPropertyValue("--white-text");

let theme = window.localStorage.getItem("theme") || "dark";

if (theme === "light") {
  light();
  toggleBtn.style.left = 77 - 26 + "px";
}

const toggleTheme = () => {
  if (theme === "dark") {
    light();
    theme = "light";
    window.localStorage.setItem("theme", "light");
    toggleBtn.style.left = 77 - 26 + "px";
  } else {
    dark();
    theme = "dark";
    window.localStorage.setItem("theme", "dark");
    toggleBtn.style.left = "3px";
  }
};

toggle.addEventListener("click", toggleTheme);

function dark() {
  root.style.setProperty("--dark-black", darkBlack);
  root.style.setProperty("--light-black", lightBlack);
  root.style.setProperty("--black", black);
  root.style.setProperty("--white-text", whiteText);
}

function light() {
  root.style.setProperty("--dark-black", "#fafafa");
  root.style.setProperty("--light-black", "#ffffff");
  root.style.setProperty("--black", "#eeeeee");
  root.style.setProperty("--white-text", "#000000");
}
