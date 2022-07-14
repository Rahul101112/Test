
$("#register_form").on("submit", function (e) {
  e.preventDefault();
  let name = $("#nameid").val();
  let email = $("#emailid").val();
  let password = $("#passwordid").val();
  let c_password = $("#c_passwordid").val();
//   let country = $("#country").val();
  var error = false;

  if (isEmpty(name)) {
    error = true;
    $("#name_error").text("Name shoud not be blank!");
  } else {
    $("#name_error").text("");
  }
  if (isEmpty(email)) {
    error = true;
    $("#email_error").text("Email shoud not be blank!");
  } else {
    $("#email_error").text("");
  }
  if (isEmpty(password)) {
    error = true;
    $("#password_error").text("password shoud not be blank!");
  }
  else{
    $("#password_error").text("");
  }
  if (isEmpty(c_password)) {
    error = true;
    $("#c_password_error").text("Confirm password shoud not be blank!");
  }
  else{
    $("#c_password_error").text("");
  }

  if (error) {
    return true;
  }

  $.ajax({
    type: "POST",
    url: "PHP/register.php",
    data: $(this).serialize() + "&register_submit=true",
    cache: false,
    success: function (response) {
      response = JSON.parse(response);
      console.log(response);
      if (response.success === true) {
        swal({
          icon: "success",
          title: "Thankyou for contact",
          text: response.message,
        });
        window.location.href = "login.php";
        $("#register_form")[0].reset()
      } else {
        console.log(response.data)


        for (const error in response.data) {
          console.log(response.data[error]);
          $("#" + error + "_error").text(response.data[error]);
        }

      }
    },
  });
});


function getcountry(id) {
    $('#state').html('')
    $.ajax({
        type: "POST",
        url: "PHP/register.php",
        data: {
            country: id
        },
        cache: false,
        success: function(data) {
            $('#state').html(data);
        }
    });

}