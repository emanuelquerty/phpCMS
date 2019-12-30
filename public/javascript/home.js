"use strict";

let logout_btn = document.getElementById("logout-btn");

logout_btn.addEventListener("click", () => {
  const url = "../controllers/logout.php";

  fetch(url)
    .then(res => res.json)
    .then(res => {
      window.location.href = "../";
    });
});
