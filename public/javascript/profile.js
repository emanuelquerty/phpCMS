"use strict";

function validate(e) {
  e.preventDefault();
  const form = e.target;
  const { name, email, password } = form;
  console.log(form.name);

  // Validate Input
  let errors = [];

  // Check required fields
  if (!name.value || !email.value || !password.value) {
    errors.push({ msg: "Please fill in all fields" });
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
      form.appendChild(div);
    });
  } else {
    // No errors
    let user_credentials = {
      name: name.value,
      email: email.value,
      password: password.value
    };
    const url = "../controllers/profile.php";

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
          errors.push({
            msg: "The Email Already Exists"
          });

          let xmlString = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
          ${errors[0].msg}
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>`;

          let div = document.createElement("div");
          div.innerHTML = xmlString;
          form.appendChild(div);
        } else if (!res.emailAlreadyExists && res.OK) {
          window.location.href = "./profile.php";
        }
      });
  }
}
