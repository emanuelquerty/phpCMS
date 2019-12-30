// Load CK EDITOR
CKEDITOR.replace("ckeditor");
CKEDITOR.config.resize_enabled = false;

function validate(event) {
  event.preventDefault();

  const form = event.target;
  const { title } = form;
  var editorText = CKEDITOR.instances.ckeditor.getData();

  if (title.value != "") {
    $(".article-title").html(title.value);
  }

  if (editorText != "") {
    $(".article-body").html(editorText);
  }

  console.log(title);
  console.log(editorText);
}

function showImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $("#article-image").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$("#preview-btn").click(function() {
  document.querySelector(".preview-article").style.visibility = "visible";
});

$("#keep-writing-btn").click(function() {
  document.querySelector(".preview-article").style.visibility = "hidden";
});

$("#image").change(function() {
  showImage(this);
});
