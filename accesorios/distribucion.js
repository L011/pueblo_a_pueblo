$(document).ready(function() {
    // Cargar tablas al inicio
    cargarPendientes();
    cargarHistorial();

    // Cargar entregas pendientes en el modal
    $('#modalDistribucion').on('show.bs.modal', function() {
        $.post('?pagina=distribucion', { accion: 'consultarPendientes' }, function(res) {
            let options = '<option value="">Seleccionar...</option>';
            res.data.forEach(entrega => {
                options += `<option value="${entrega.id}">${entrega.fecha} - ${entrega.proveedor} (${entrega.peso}kg)</option>`;
            });
            $('#entrega_id').html(options);
        }, 'json');
    });

    // Calcular distribución al seleccionar entrega
    $('#entrega_id').change(function() {
        if ($(this).val()) {
            $.post('?pagina=distribucion', { 
                accion: 'calcular', 
                entrega_id: $(this).val() 
            }, function(res) {
                $('#matricula_total').val(res.matriculaTotal);
                let html = '';
                res.escuelas.forEach(escuela => {
                    html += `
                        <tr>
                            <td>${escuela.nombre}</td>
                            <td>${escuela.matricula}</td>
                            <td>${escuela.porcentaje}%</td>
                            <td><input type="number" class="form-control form-control-sm" value="${escuela.cantidad}" step="0.01"></td>
                            <td><button class="btn btn-sm btn-outline-danger"><i class="fas fa-times"></i></button></td>
                        </tr>
                    `;
                });
                $('#distribucion-auto').html(html);
            }, 'json');
        }
    });
});

function cargarPendientes() {
    // Implementar AJAX para tabla pendientes
}

function cargarHistorial() {
    // Implementar AJAX para tabla historial
}