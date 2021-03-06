<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a type="button" class="navbar-toggler" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button">
            <span class="navbar-toggler-icon"></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">ABC EXPORT</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Opciones
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="modules/auth/logoutController.php">Log Out</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<!--- fin barra de navegacion-->
<!--- inicio barra de navegacion offcanvas-->
<div class="offcanvas offcanvas-start bg-dark" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">MENU</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="sidebar" class="sidebaritems bg-dark">
            <div id="profileuser">
                <div id="userpic">
                    <img src="<?php 
                            if( $_SESSION['imagen'] == null){ echo 'img/usersprofiles/nouser.png';} 
                            else {echo $_SESSION['imagen'];}?>" alt="profileuser" width="150" heigth="150">
                </div>
                <div id="username">
                    <span id="idsaludo"><?php echo $_SESSION['nombre_usuario'];?></span>
                </div>
            </div>
            <ul class="sidebarlist">
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" aria-current="page" href="#" data-bs-dismiss="offcanvas" aria-label="Close"
                        onclick="ShowContent('modules/usuarios/listadoUsuarios.php');">
                        <span class="icon-sibar material-icons-outlined">
                            people
                        </span>Usuarios
                    </a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" data-bs-dismiss="offcanvas" aria-label="Close"
                        onclick="ShowContent('modules/egresos/listadeSalidas.php');">
                        <span class="icon-sibar material-icons-outlined">
                            file_upload
                        </span>Salidas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" data-bs-dismiss="offcanvas" aria-label="Close"
                        onclick="ShowContent('modules/ingresos/detallesIngreso.php');">
                        <span class="icon-sibar material-icons-outlined">
                            file_download
                        </span>Entradas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" data-bs-dismiss="offcanvas" aria-label="Close"
                        onclick="ShowContent('modules/egresos/detallesSalida.php');">
                        <span class="material-icons-outlined icon-sibar">
                            receipt
                        </span>Detalles de salidas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="ShowContent('modules/articulos/listadoArticulos.php');"
                        href="#" data-bs-dismiss="offcanvas" aria-label="Close">
                        <span class="material-icons-outlined icon-sibar">
                            inventory_2
                        </span>Articulos</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="ShowContent('modules/proveedores/listadoProveedores.php');"
                        href="#" data-bs-dismiss="offcanvas" aria-label="Close">
                        <span class="icon-sibar material-icons-outlined">
                            inventory
                        </span>Proveedores</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--- fin barra de navegacion offcanvas-->