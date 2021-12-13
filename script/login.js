$(function () {
   $(".btn").click(function () {
      $(".form-signin").toggleClass("form-signin-left");
      $(".form-signup").toggleClass("form-signup-left");
      $(".frame").toggleClass("frame-long");
      $(".signup-inactive").toggleClass("signup-active");
      $(".signin-active").toggleClass("signin-inactive");
      $(".forgot").toggleClass("forgot-left");
      $(this).removeClass("idle").addClass("active");
   });
});

$('.alert-autocloseable-danger').hide();

function errorLogin() {
   $('#autoclosable-btn-danger').prop("disabled", true);
   $('.alert-autocloseable-danger').show();

   $('.alert-autocloseable-danger').delay(5000).fadeOut("slow", function () {
      // Animation complete.
      $('#autoclosable-btn-danger').prop("disabled", false);
   });
};