"use strict";

function validate(e) {
  e.preventDefault();

  let form = e.target;
  let email = form["email"].value;
  let password = form["password"].value;
  let errors = [];

  // Check required fields
  if (!email || !password) {
    errors.push({ msg: "Please fill in all fields" });
  }

  if (errors.length > 0) {
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
    //There are no errors
    let user_credentials = {
      email: email,
      password: password
    };
    const url = "../controllers/login.php";

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(user_credentials) // body data type must match "Content-Type" header
    })
      .then(res => res.json()) // parses JSON response into native Javascript objects)
      .then(res => {
        console.log(res);
        if (res.message === "You Exist!") {
          window.location.href = "./home.php";
        } else {
          errors.push({ msg: "Email or Password is Incorrect." });
          let xmlString = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
          ${errors[0].msg}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>`;

          let div = document.createElement("div");
          div.innerHTML = xmlString;
          form.prepend(div);
        }
      });
  }
}
