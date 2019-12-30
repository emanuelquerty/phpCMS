"use strict";

function validate(e) {
  e.preventDefault();

  const form = e.target;
  const email = form["email"].value;
  let errors = [];

  console.log(email);

  if (!email) {
    errors.push({ msg: "Please fill in the email." });
    errors.forEach(error => {
      let xmlString = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
         ${error.msg}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>`;

      let div = document.createElement("div");
      div.innerHTML = xmlString;
      form.prepend(div);
    });
  } else {
    let url = "../controllers/resetPassword.php";

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ email: email })
    })
      .then(res => res.text())
      .then(res => {
        if (res.msg === "The email entered does not exist") {
          errors = [];
          errors.push({ msg: res.msg });

          errors.forEach(error => {
            let xmlString = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                   ${error.msg}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>`;

            let div = document.createElement("div");
            div.innerHTML = xmlString;
            form.prepend(div);
          });
        } else {
          // Email Exists and a link was sent to your email
          console.log(res);
        }
      });
  }
}
