document.addEventListener("DOMContentLoaded", function () {
  tinymce.init({
    selector: "#firstSection",
    plugins: "advlist autolink lists link image charmap print preview anchor",
    toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    menubar: false,
  });

  tinymce.init({
    selector: "#secondSection",
    plugins: "advlist autolink lists link image charmap print preview anchor",
    toolbar: "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    menubar: false,
  });
});
