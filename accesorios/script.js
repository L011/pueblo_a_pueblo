$(document).ready(function () {
  $("#formEscuela").submit(function (event) {
    event.preventDefault(); // Prevent the default form submission
    var datos = new FormData();
    console.log($("#accion").val());
    console.log($("#nombre").val());
    console.log($("#direccion").val());
    console.log($("#circuito").val());
    console.log($("#contacto").val());
    console.log($("#telefono").val());

    // Agregar los datos del formulario al FormData
    datos.append('accion', 'incluir');
    datos.append('nombre', $("#nombre").val());
    datos.append('direccion', $("#direccion").val());
    datos.append('circuito', $("#circuito").val());
    datos.append('contacto', $("#contacto").val());
    datos.append('telefono', $("#telefono").val());

    console.log("Accion: " + datos.get('accion'));
    console.log("Nombre: " + datos.get('nombre'));
    console.log("Direccion: " + datos.get('direccion'));
    console.log("Circuito: " + datos.get('circuito'));
    console.log("Contacto: " + datos.get('contacto'));
    console.log("Telefono: " + datos.get('telefono'));

    $.ajax({
      async: true,
      url: 'controlador/escuela.php',
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
