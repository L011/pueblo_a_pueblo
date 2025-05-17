<?php require_once "./comunes/cabezera.php"; ?>

<body>
    <?php require_once "./comunes/nav.php"; ?>
    
    <div class="main-content">
        <!-- Título y botón -->
        <div class="page-header">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1><i class="fas fa-truck-loading me-2"></i>Distribución de Alimentos</h1>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDistribucion">
                            <i class="fas fa-calculator me-1"></i> Nueva Distribución
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contenido -->
        <div class="container-fluid mt-4">
            <!-- Card para distribuciones pendientes -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-clock me-2"></i>Entregas Pendientes de Distribuir</h5>
                </div>
                <div class="card-body">
                    <table id="tabla-pendientes" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Proveedor</th>
                                <th>Categoría</th>
                                <th>Peso (kg)</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Datos cargados via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card para historial -->
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="card-title mb-0"><i class="fas fa-history me-2"></i>Historial de Distribuciones</h5>
                </div>
                <div class="card-body">
                    <table id="tabla-historial" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>Categoría</th>
                                <th>Total (kg)</th>
                                <th>Escuelas</th>
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

    <!-- Modal para distribución -->
    <div class="modal fade" id="modalDistribucion" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-calculator me-2"></i>Distribuir Alimentos</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formDistribucion">
                        <input type="hidden" name="accion" value="calcular">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Entrega a Distribuir</label>
                                <select class="form-select" name="entrega_id" id="entrega_id" required>
                                    <option value="">Seleccionar...</option>
                                    <!-- Opciones cargadas via AJAX -->
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Matrícula Total Activa</label>
                                <input type="text" class="form-control" id="matricula_total" readonly>
                            </div>
                        </div>

                        <!-- Sección de distribución automática -->
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0"><i class="fas fa-robot me-2"></i>Distribución Automática</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Escuela</th>
                                                <th>Matrícula</th>
                                                <th>% Asignado</th>
                                                <th>Cantidad (kg)</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="distribucion-auto">
                                            <!-- Datos calculados -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Cancelar
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-check-circle me-1"></i> Confirmar Distribución
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php require_once "./accesorios/piesera.php"; ?>
    <!-- JS específico -->
    <script src="assets/js/distribucion.js"></script>
</body>
</html>