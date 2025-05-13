$(document).ready(function () {
  $("#formEscuela").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission
   $.ajax({
  async: true,
  url: "",
  type: "POST",
  data: $("#formEscuela").serialize(),
  success: function (response) {
    console.log(response);
  }
});
  });
});
