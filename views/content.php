<div class="container-fluid contenedortotal">
    <div class="row">
        <div id="sidebar"
            class="sidebaritems active col-md-3 col-lg-2 d-md-block position-sticky pt-3 collapse bg-dark">
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
                    <a class="nav-link-sidebar" aria-current="page" href="#" id="ListadoUsuarios"
                        onclick="ShowContent('modules/usuarios/listadoUsuarios.php');">
                        <span class="icon-sibar material-icons-outlined">
                            people
                        </span>Usuarios
                    </a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="Ventas"
                        onclick="ShowContent('modules/egresos/listadoEgresos.php');">
                        <span class="icon-sibar material-icons-outlined">
                            file_upload
                        </span>Salidas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="RealizarIngreso"
                        onclick="ShowContent('modules/ingresos/realizarIngreso.php');">
                        <span class="icon-sibar material-icons-outlined">
                            file_download
                        </span>Entradas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" href="#" id="DetalleIngreso"
                        onclick="ShowContent('modules/ingresos/listadoDetalleIngreso.php');">
                        <span class="material-icons-outlined icon-sibar">
                            receipt
                        </span>Detalles de salidas</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="ShowContent('modules/articulos/listadoArticulos.php');"
                        href="#" id="ListadoProductos">
                        <span class="material-icons-outlined icon-sibar">
                            inventory_2
                        </span>Articulos</a>
                </li>
                <li class="nav-item-sidebar">
                    <a class="nav-link-sidebar" onclick="ShowContent('modules/proveedores/listadoProveedores.php');"
                        href="#" id="ListadoProveedores">
                        <span class="icon-sibar material-icons-outlined">
                            inventory
                        </span>Proveedores</a>
                </li>
            </ul>
        </div>
        <main id="screenContent" class="col-md-9 col-lg-10 px-md-0">
            <div id="mainContent">
                <div
                    style="height:700px; width: 100%; text-align: center; flex-direction: column; display: flex; justify-content: center; align-items: center; min-width: 400px;overflow-x: auto;">
                    <img src="https://export.com.gt/attach/cbm/empresas/2225.jpg" alt="brand" width="300" height="300">
                    <a href="http://localhost/soporte/informacion/sobre-nosotros.php" target="_blank"
                        rel="noopener noreferrer" style="color: red;">Contáctanos</a>
                </div>
            </div>
        </main>