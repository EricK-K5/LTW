document.addEventListener("DOMContentLoaded", function () {
  var confirmLinks = document.querySelectorAll("a[data-confirm]");

  confirmLinks.forEach(function (link) {
    link.addEventListener("click", function (event) {
      var message =
        link.getAttribute("data-confirm") || "Bạn có chắc chắn không?";
      if (!window.confirm(message)) {
        event.preventDefault();
      }
    });
  });
});
