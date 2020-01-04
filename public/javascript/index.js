// Get all posts from database
async function getAllPosts() {
  let response = await fetch("./controllers/getAllPosts.php");
  return await response.json();
}

getAllPosts().then(res => {
  console.log(res);

  let posts = res;

  if (posts.length == 0) {
    let noPostsDiv =
      "<div class='noposts'><h3>No Posts Found</h3><p>All your posts will show here</p></div>";
    $(".myposts-body").html(noPostsDiv);
  } else {
    let docFrag = document.createDocumentFragment();
    for (let i = 0; i < posts.length; i++) {
      let id = posts[i].id;
      let title = posts[i].title;
      let author = posts[i].author;
      let body = posts[i].body.slice(0, 200);
      let created_at = posts[i].created_at;

      let post =
        `<div class='post' class='${id}'><h4 class='title'>${title}</h4>` +
        `<p class="post-author-description">Written By ${author} on ${created_at}</p>` +
        `<div class='body'><p> ${body} ...</p>` +
        `<button type='submit' ` +
        `class='btn read-more-btn ${id}'>Read more...</button></div></div>`;
      var doc = new DOMParser().parseFromString(post, "text/html");
      docFrag.appendChild(doc.documentElement);
    }
    $(".all-posts").html(docFrag);

    // Show full post when the user clicks read more
    $(".read-more-btn").click(function(event) {
      let btnClass = event.target.className;
      let btnClassArray = btnClass.split(" ");
      let postId = btnClassArray[btnClassArray.length - 1];

      // Show the corresponding post
      getPost("./controllers/getPost.php", postId).then(res => {
        window.location.href = "./views/post.php";
      });
    });
  }
});

async function getPost(url, postId) {
  let response = await fetch(url, {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({ postId })
  });
  return await response.json();
}
