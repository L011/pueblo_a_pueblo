<!-- CSS adicional -->
<style>
    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 2px 0 5px rgba(0,0,0,0.1);
    }
    
    .navbar-nav {
        flex-direction: column !important;
        width: 100%;
    }
    
    .nav-item {
        padding: 10px 15px;
    }
    
    .navbar-toggler {
        margin: 10px;
    }
    
    /* Para móviles */
    @media (max-width: 991.98px) {
        .sidebar {
            width: 0;
            transition: width 0.3s;
        }
        
        .sidebar.active {
            width: 250px;
        }
        
        .main-content {
            margin-left: 0 !important;
        }
    }
    
    /* Para desktop */
    @media (min-width: 992px) {
        .main-content {
            margin-left: 250px;
        }
    }
</style>

<!-- Navbar lateral -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sidebar">
    <div class="d-flex flex-column h-100 w-100">
        <!-- Cabecera -->
        <div class="d-flex justify-content-between align-items-center">
            <a class="navbar-brand p-3" href="?pagina=inicio">Pueblo a Pueblo</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarNavDropdown" 
                    aria-controls="navbarNavDropdown" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <!-- Contenido colapsable -->
        <div class="collapse navbar-collapse flex-grow-1" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="?pagina=escuela">Escuela</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pagina=distribucion">Distribución</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?pagina=inventario">Inventario</a>
                </li>
                
                <!-- Elementos al final -->
                <div class="mt-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="?pagina=cerrar_sesion">Cerrar Sesión</a>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenido principal -->
<div class="top-navbar">
 
</div>

<!-- JS para manejar el toggle en móviles -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const sidebar = document.querySelector('.sidebar');

    navbarToggler.addEventListener('click', function() {
        sidebar.classList.toggle('active');
    });
});
</script>