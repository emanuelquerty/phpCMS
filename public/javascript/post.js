// Log the user out when logout button is pressed
let logout_btn = document.querySelectorAll(".logout-btn");
for (let i = 0; i < logout_btn.length; i++) {
  logout_btn[i].addEventListener("click", () => {
    const url = "../controllers/logout.php"; // Send request to the server to unset the session and destroy all session variables

    fetch(url)
      .then(res => res.json)
      .then(res => {
        window.location.href = "../"; // Redirect the user to the index page once session is destroyed and unset
      });
  });
}
