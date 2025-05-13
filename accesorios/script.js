$(document).ready(function () {
  $("#formEscuela").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission
    var datos = new FormData();

    datos.append("accion", $("#accion").val());
    datos.append("nombre", $("#nombre").val());
    datos.append("direccion", $("#direccion").val());
    datos.append("circuito", $("#circuito").val());
    datos.append("contacto", $("#contacto").val());
    datos.append("telefono", $("#telefono").val());
    console.log(datos);

    $.ajax({
      async: true,
      url: "",
      type: "POST",
      data: datos,
      processData: false,
      cache: false,
      success: function (response) {
        console.log(response);
        console.log("Data: " + datos);
      },
    });
  });
});
