// Load CK EDITOR
CKEDITOR.replace("ckeditor");
CKEDITOR.config.resize_enabled = false;

function previewArticle(event) {
  let title = $("#title").val();
  let editorText = CKEDITOR.instances.ckeditor.getData();

  if (title != "") {
    $(".article-title").html(title);
  }

  if (editorText != "") {
    $(".article-body").html(editorText);
  }
}

// This functions sets the preview post image to be the one the user has just uploaded
function showImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $("#article-image").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#preview-btn").click(function(event) {
  previewArticle(event);
  document.querySelector(".preview-article").style.visibility = "visible";
});

$(".publish-btn").click(function(event) {
  validate(event);
});

$("#keep-writing-btn").click(function() {
  document.querySelector(".preview-article").style.visibility = "hidden";
});

$("#image").change(function() {
  showImage(this);
});

// This function validates and saves the article to the database if data is valid
function validate(event) {
  let title = $("#title").val();
  var editorText = CKEDITOR.instances.ckeditor.getData();

  // Get the post id to update in the database
  let form = document.querySelector(".edit-post-form");
  let formClassArray = form.className.split(" ");
  let postId = formClassArray[formClassArray.length - 1];

  async function updatePost() {
    const url = "../controllers/editPost.php";

    let response = await fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({ title, body: editorText, postId })
    }).then(res => res.json());

    return response;
  }

  updatePost().then(res => {
    console.log(res);
    window.location.href = "./home.php";
  });
}
