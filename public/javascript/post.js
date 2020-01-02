// Log the user out when logout button is pressed
let logout_btn = document.getElementById("logout-btn");
logout_btn.addEventListener("click", () => {
  const url = "../controllers/logout.php"; // Send request to the server to unset the session and destroy all session variables

  fetch(url)
    .then(res => res.json)
    .then(res => {
      window.location.href = "../"; // Redirect the user to the index page once session is destroyed and unset
    });
});
