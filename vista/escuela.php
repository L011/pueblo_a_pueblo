<?php require_once "./comunes/cabezera.php"; ?>

<body>

<?php require_once "./comunes/nav.php"; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Registro de Nueva Escuela</h3>
                    </div>
                    <div class="card-body">
                        <form id="formEscuela" method="POST" name="formEscuela">
                             <input type="hidden" name="accion" value="incluir" id="accion">
                             <input type="hidden" name="escuela_id" id="escuela_id" value="">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre de la Escuela</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>

                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" required>
                            </div>

                            <div class="mb-3">
                                <label for="circuito" class="form-label">Circuito</label>
                                <input type="text" class="form-control" id="circuito" name="circuito" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="director" class="form-label">Contacto</label>
                                    <input type="text" class="form-control" id="contacto" name="contacto" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class=" mb-3">
                                    <label for="matricula" class="form-label">Matrícula Total</label>
                                    <input type="number" class="form-control" id="matricula" min="1" name="matricula" required>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button id="guardar" class="btn btn-primary">Guardar Escuela</button>
                                <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="table-responsive table-dsg">
                         <table id="tabla-activas" class="table table-striped table-bordered" style="width:100%">
                        <thead>
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
</body>

<?php require_once "./accesorios/piesera.php"; ?>

</html>