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



  console.log('hola');
  
        

        $.ajax({
            url: "",
            type: "POST",
            data: { "accion": "consultar" },
            dataSrc: "data",
            success: function(response) {
             
                $('#tabla-activas').DataTable({
                    "data": response.data,
                      "dataSrc": "data",
                    "dataType": "json",
                    "columns": [
                        { "data": "escuela_id" },
                        { "data": "nombre" },
                        { "data": "circuito" },
                        { "data": "contacto" },
                        { "data": "telefono" },
                        { "data": "matricula" },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return `
                                    <button class="btn btn-sm btn-warning editar" data-id="${row.escuela_id}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger eliminar" data-id="${row.escuela_id}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                `;
                            }
                        }
                    ],
                    
                    "responsive": true
                });
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);  
                alert("Error al cargar la tabla: " + error);
            
        }
        });

           // 3. Evento para editar
    $('#tabla-activas').on('click', '.editar', function() {
        var escuelaId = $(this).data('id');
        $.ajax({
            url: "",
            type: "POST",
            data: {
                accion: 'obtener',
                escuela_id: escuelaId
            },
            dataType: "json",
            success: function(response) {
                // Llenar formulario con datos
                $("#accion").val('modificar');
                $("#escuela_id").val(response.escuela_id);
                $("#nombre").val(response.nombre);
                $("#direccion").val(response.direccion);
                $("#circuito").val(response.circuito);
                $("#contacto").val(response.contacto);
                $("#telefono").val(response.telefono);
                // Scroll al formulario
                $('html, body').animate({
                    scrollTop: $("#formEscuela").offset().top
                }, 500);
            }
        });
    });

    // 4. Evento para eliminar
    $('#tabla-activas').on('click', '.eliminar', function() {
        var escuelaId = $(this).data('id');
        if (confirm('¿Estás seguro de eliminar esta escuela?')) {
            $.ajax({
                url: "",
                type: "POST",
                data: {
                    accion: 'eliminar',
                    escuela_id: escuelaId
                },
                success: function(response) {
                    alert(response);
                    tabla.ajax.reload();
                }
            });
        }
    });
        
});
