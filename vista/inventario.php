<?php require_once "./comunes/cabezera.php"; ?>

<body>
    <?php require_once "./comunes/nav.php"; ?>
    
    <div class="main-content">
        <!-- Título y botón -->
        <div class="page-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1><i class="fas fa-boxes me-2"></i>Registro de Inventario</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInventario">
                            <i class="fas fa-plus-circle me-1"></i> Nueva Entrada
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="container-fluid mt-4">
            <!-- Card para el listado -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Entradas Registradas</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tabla-inventario" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Categoría</th>
                                    <th>Peso (kg)</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Datos cargados via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para registro -->
    <div class="modal fade" id="modalInventario" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-box-open me-2"></i>Registrar Entrada</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formInventario">
                        <input type="hidden" name="accion" value="registrar">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Fecha de Entrada</label>
                                <input type="date" class="form-control" name="fecha" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Categoría</label>
                                <select class="form-select" name="categoria" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="Frutas">Frutas</option>
                                    <option value="Verduras">Verduras</option>
                                    <option value="Lácteos">Lácteos</option>
                                    <option value="Proteínas">Proteínas</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Peso Total (kg)</label>
                                <input type="number" class="form-control" name="peso" step="0.01" min="0.1" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Notas/Observaciones</label>
                            <textarea class="form-control" name="notas" rows="2"></textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-eraser me-1"></i> Limpiar
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "./accesorios/piesera.php"; ?>
    <!-- JS específico -->
    <script src="accesorios/inventario.js"></script>
</body>
</html>