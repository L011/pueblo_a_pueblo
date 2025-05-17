$(document).ready(function() {
    // Cargar tabla al inicio
    cargarInventario();

    // Registrar nueva entrada
    $('#formInventario').submit(function(e) {
        e.preventDefault();
        $.post('?pagina=inventario', $(this).serialize(), function(res) {
            if (res === "1") {
                alert('¡Entrada registrada!');
                $('#modalInventario').modal('hide');
                cargarInventario();
            } else {
                alert(res); // Mostrar error
            }
        });
    });
});

function cargarInventario() {
    $.post('?pagina=inventario', { accion: 'consultar' }, function(res) {
        let html = '';
        res.forEach(item => {
            html += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.fecha}</td>
                    <td>${item.proveedor}</td>
                    <td>${item.categoria}</td>
                    <td>${item.peso} kg</td>
                    <td><span class="badge ${item.estado === 'Pendiente' ? 'bg-warning' : 'bg-success'}">${item.estado}</span></td>
                    <td>
                        <button class="btn btn-sm btn-danger" onclick="eliminarEntrada(${item.id})" ${item.estado !== 'Pendiente' ? 'disabled' : ''}>
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        $('#tabla-inventario tbody').html(html);
    }, 'json');
}

function eliminarEntrada(id) {
    if (confirm('¿Eliminar esta entrada?')) {
        $.post('?pagina=inventario', { accion: 'eliminar', id: id }, function(res) {
            if (res === "1") {
                cargarInventario();
            } else {
                alert(res);
            }
        });
    }
}