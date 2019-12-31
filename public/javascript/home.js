"use strict";

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

// get all posts of the user that is signed in
async function getPosts() {
  let response = await fetch("../controllers/myposts.php");
  return await response.json();
}

getPosts().then(res => {
  let data = res.data;
  let docFrag = document.createDocumentFragment();

  // Set the number of posts founds
  $("#num-posts").html(`(${data.length})`);

  let htmlTableHeaderRow = `<tr id="None">
  <th id="title-header" class="bg-secondary">Title</th>
  <th id="author-header" class="bg-secondary">Author</th>
  <th id="created_at-header" class="bg-secondary">Date Created</th>
  <th id="action-header" class="bg-secondary">Action</th>
  </tr>`;

  // Populate the table
  let htmlTableBodyRow = "";

  // If no post, just show one row with no posts as entries
  if (data.length == 0) {
    htmlTableBodyRow = `<tr id="None">
    <td> None </td>
    <td> None </td>
    <td> None </td>
    <td class="action-picker">
      <select name="action" class="action" id="action">
        <option value="None">None</option>
        <option value="None">None</option>
      </select>
      <button type="submit" class="btn btn-primary action-btn" id="action-btn">None</button>
    </td>
  </tr>`;
  } else {
    for (let i = 0; i < data.length; i++) {
      htmlTableBodyRow += `<tr id="${data[i].id}">
        <td> ${data[i].title} </td>
        <td> ${data[i].author} </td>
        <td> ${data[i].created_at} </td>
        <td class="action-picker">
          <select name="action" class="action" id="action${data[i].id}">
            <option value="Edit">Edit</option>
            <option value="Delete">Delete</option>
          </select>
          <button type="submit" class="btn btn-primary action-btn ${data[i].id}" id="action-btn${data[i].id}">Edit</button>
        </td>
      </tr>`;
    }
  }
  $("#my-posts-table").append(htmlTableHeaderRow + htmlTableBodyRow);

  // Change the action-btn value for a post according to the select value
  for (let i = 0; i < data.length; i++) {
    $(`#action${data[i].id}`).change(function(event) {
      $(`#action-btn${data[i].id}`).html($(`#action${data[i].id}`).val());
    });
  }

  // Edit or delete a post based on the value of the button that was clicked for that post
  $(".action-btn").click(function(event) {
    let classNameArray = event.target.className.split(" ");
    let postId = classNameArray[classNameArray.length - 1];

    // Delete post if action is delete
    if (event.target.innerHTML === "Delete") {
      // Remove post from posts table
      let table = document.getElementById("my-posts-table");
      let count = table.childElementCount;
      for (let i = 0; i < count; i++) {
        if (table.childNodes[i].id == postId) {
          table.removeChild(table.childNodes[i]);
          break;
        }
      }

      // Finally remove the post from the database
      async function deletePost() {
        let response = await fetch("../controllers/deletePost.php", {
          method: "POST",
          headers: {
            "Content-Type": "aplication/json"
          },
          body: JSON.stringify({ postId })
        });
        return await response.json();
      }

      deletePost().then(res => {
        if (res.success) {
          window.location.reload(true);
        }
      });
      /**** event === "Delete" block ends here ********/
    } else {
      // Get the post to edit from its postID and go to editPost.php page
      async function getPost() {
        let response = await fetch("../controllers/getPost.php", {
          method: "POST",
          headers: {
            "Content-Type": "aplication/json"
          },
          body: JSON.stringify({ postId })
        });
        return await response.json();
      }

      getPost().then(res => {
        window.location.href = "./editPost.php";
      });
    }
  }); /************* action-btn click event function ends Here *****************/

  console.log(res);
}); /**************************** Get Posts function ends Here *****************************************/
