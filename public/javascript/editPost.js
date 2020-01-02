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
      $(".preview-text").html(input.files[0].name);

      // Create an image
      var image = document.createElement("img");
      image.className = "image-preview-img";
      image.src = window.URL.createObjectURL(input.files[0]);
      document.querySelector(".image-preview").appendChild(image);
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

  // Get the image from the input file
  var formData = new FormData();
  if (document.querySelector("#image").files.length == 0) {
    formData.append("image", "None");
  } else {
    var blobFile = document.querySelector("#image").files[0];
    formData.append("image", blobFile);
    console.log(formData.get("image"));
  }

  // Append the title and body to the form object
  formData.append("title", title);
  formData.append("body", editorText);
  formData.append("postId", postId);

  async function updatePost() {
    const url = "../controllers/editPost.php";

    let response = await fetch(url, {
      method: "POST",
      headers: {
        // "Content-Type": "application/json"
      },
      body: formData
    }).then(res => res.json());

    return response;
  }

  updatePost().then(res => {
    console.log(res);
    window.location.href = "./myposts.php";
  });
}
