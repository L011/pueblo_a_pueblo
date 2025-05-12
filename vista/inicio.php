<?php require_once "./accesorios/cabezera.php"; ?>

<body>
    
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Registro de Nueva Escuela</h3>
                    </div>
                    <div class="card-body">
                        <form id="formEscuela">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Escuela</label>
                                <input type="text" class="form-control" id="nombre" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="zona" class="form-label">Zona</label>
                                    <input type="text" class="form-control" id="zona" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="matricula" class="form-label">Matrícula Total</label>
                                    <input type="number" class="form-control" id="matricula" min="1" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="director" class="form-label">Contacto</label>
                                <input type="text" class="form-control" id="director" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono">
                                </div>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar Escuela</button>
                                <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>



