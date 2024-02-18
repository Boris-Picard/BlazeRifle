document.addEventListener("DOMContentLoaded", function () {
  // Initialisation de TinyMCE pour la première section
  tinymce.init({
    selector: "#firstSection",
    plugins: "advlist autolink lists link image charmap print preview anchor",
    toolbar:
      "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    menubar: false,
    setup: function (editor) {
      editor.on("change", function () {
        tinymce.triggerSave();
      });
    },
  });

  // Initialisation de TinyMCE pour la deuxième section
  tinymce.init({
    selector: "#secondSection",
    plugins: "advlist autolink lists link image charmap print preview anchor",
    toolbar:
      "undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    menubar: false,
    setup: function (editor) {
      editor.on("change", function () {
        tinymce.triggerSave();
      });
    },
  });
});
