const link1 = document.getElementById("link1");


const dialog1 = document.getElementById("dialog1");


const closeButton1 = document.getElementById("closeButton1");


link1.addEventListener("click", function(event) {
  event.preventDefault();
  dialog1.showModal();
});

closeButton1.addEventListener("click", function() {
  dialog1.close();
});
$(document).ready(function() {
    // Smooth scrolling when clicking the "About" link
    $(".nav-link").click(function(event) {
      event.preventDefault();
      var target = $(this).attr("href");
      $("html, body").animate({
        scrollTop: $(target).offset().top
      }, 1000); // Adjust the duration (in milliseconds) as needed
    });
  });
  