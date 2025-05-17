<?php require_once "./comunes/cabezera.php"; ?>

<body>
    <?php require_once "./comunes/nav.php"; ?>
    
    <!-- Contenido principal -->
    <div class="main-content">
        <!-- Franja superior con título y botón -->
        <div class="page-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1><i class="fas fa-school me-2"></i>Gestión de Escuelas</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEscuela">
                            <i class="fas fa-plus-circle me-1"></i> Registrar Escuela
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido principal en container -->
        <div class="container-fluid mt-4">
            <!-- Card para la tabla de escuelas -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Listado de Escuelas Registradas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabla-activas" class="table table-hover table-bordered" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Circuito</th>
                                    <th>Contacto</th>
                                    <th>Teléfono</th>
                                    <th>Matrícula</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Los datos se cargarán via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para registrar escuela -->
    <div class="modal fade" id="modalEscuela" tabindex="-1" aria-labelledby="modalEscuelaLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="modalEscuelaLabel">
                        <i class="fas fa-school me-2"></i>Registro de Nueva Escuela
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEscuela" method="POST" name="formEscuela">
                        <input type="hidden" name="accion" value="incluir" id="accion">
                        <input type="hidden" name="escuela_id" id="escuela_id" value="">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre de la Escuela</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="circuito" class="form-label">Circuito</label>
                                <input type="text" class="form-control" id="circuito" name="circuito" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contacto" class="form-label">Contacto</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="matricula" class="form-label">Matrícula Total</label>
                            <input type="number" class="form-control" id="matricula" min="1" name="matricula" required>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-eraser me-1"></i> Limpiar
                            </button>
                            <button id="guardar" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Guardar Escuela
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "./accesorios/piesera.php"; ?>
</body>
</html>