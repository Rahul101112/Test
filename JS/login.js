$("#login_form").on("submit", function (e) {
  e.preventDefault();

  let email = $("#email").val();
  let password = $("#password").val();
  var error = false;

  if (isEmpty(email)) {
    error = true;
    $("#email_error").text("Email shoud not be blank!");
  } else {
    $("#email_error").text("");
  }
  if (isEmpty(password)) {
    error = true;
    $("#password_error").text("Password shoud not be blank!");
  } else {
    $("#password_error").text("");
  }
  if (error) {
    return true;
  }

  $.ajax({
    type: "POST",
    url: "PHP/login.php",
    data: $(this).serialize() + "&login_submit=true",
    cache: false,
    success: function (response) {
      response = JSON.parse(response);
      if (response.success === true) {
        window.location.href = "dashboard.php";
      } else {
        for (const error in response.data) {
          $("#" + error + "_error").text(response.data[error]);
        }
      }
    },
    error: function (error) {
      swal({
        icon: "error",
        title: "Somthing went wrong!",
        text: response.message,
      });
    },
  });
});
