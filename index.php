<?php

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inicio de Sesion</title>
    <link rel="shortcut icon" href="https://export.com.gt/attach/cbm/empresas/2225.jpg" />
    <link rel="stylesheet" href="css/footer.css">
    <style>
    * {
        margin: 0;
        padding: 0;
    }

    html,
    body {
        height: 100%;
    }
    </style>
</head>

<body>
    <div style="padding: 20px;">
        <div style="margin-top: 200px;">
            <div style="display:flex; justify-content:center;">
                <div
                    style="background-color:white;padding: 5px;border-radius: 15px;border-color: white; width:500px;box-shadow: 10px 6px 10px 5px #26262754;">
                    <h4>INISIAR SESIÓN</h4>
                    <div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Correo electrónico</label>
                            <input type="text" class="form-control" name="username" id="username"
                                aria-describedby="username">

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="button" id="btnLogin" class="btn btn-dark">INICIAR SESIÓN</button>
                    </div>
                    <div>
                        <div class="singUp">
                            <span>¿Aun no tienes cuenta? <a class="singUplink" href="#">Registrate aquí</a></span>
                        </div>
                    </div>
                    <div class="forgPass">
                        <a class="forgPasslink" href="#">¿Olvidaste tu contraseña?</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="bg-dark p-1 footer">
        <div>
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-facebook-f text-light" aria-hidden="true"></i></a>

            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-twitter text-light" aria-hidden="true"></i></a>

            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                    class="fab fa-google text-light" aria-hidden="true"></i></a>

            <a class="btn btn-outline-light btn-floating m-1 text-light" href="#!" role="button"><i
                    class="fab fa-instagram" aria-hidden="true"></i></a>
            <div class="p-1 text-light">
                <p>¡Visita nuestras redes sociales!</p>
            </div>
        </div>

        <div class="p-1 text-light">
            <p>ABC-EXPORT © Todos los derechos reservados.</p>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="js/loginManager.js"></script>

</html>