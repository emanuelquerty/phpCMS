"use strict";

function validate(e) {
  e.preventDefault();
  const form = e.target;
  const { name, email, password, password2 } = form;

  // Validate Input
  let errors = [];

  // Check required fields
  if (!name.value || !email.value || !password.value || !password2.value) {
    errors.push({ msg: "Please fill in all fields" });
  }

  // Check passwords match
  if (password.value !== password2.value) {
    errors.push({ msg: "Passwords do not match" });
  }

  // Check passwords length
  if (password.value.length < 6) {
    errors.push({ msg: "Password should be at least six characters" });
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
    // No errors
    let user_credentials = {
      name: name.value,
      email: email.value,
      password: password.value
    };
    const url = "../controllers/register.php";

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(user_credentials) // body data type must match "Content-Type" header
    })
      .then(res => res.json()) // parses JSON response into native Javascript objects)
      .then(res => {
        errors = [];
        console.log(res);

        if (res.emailAlreadyExists && !res.OK) {
          errors.push({ msg: "The Email Already Exists" });

          let xmlString = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
          ${errors[0].msg}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>`;

          let div = document.createElement("div");
          div.innerHTML = xmlString;
          form.prepend(div);
        } else if (!res.emailAlreadyExists && res.OK) {
          let message = [];
          message.push("You are registered. Please, login now!");

          let xmlString = `<div class="alert alert-success alert-dismissible fade show" role="alert">
          ${message[0]}
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
