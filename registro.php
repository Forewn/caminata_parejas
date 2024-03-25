<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/registro.css">
    <link rel="icon" href="./assets/img/finish-line.png">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Formulario de Inscripcion</title>
</head>
<body>
    <div class="video">
        <video src="./assets/video/running.mp4" autoplay loop muted></video>
    </div>
    <header>
        <?php include "./modulos/navbar.php"; ?>
        <div class="img1">
            <img src="./assets/img/finish-line.png" alt="Maraton">
        </div>
        <section>
            <h1>Caminata de la Confraternidad Universitaria</h1>
            <h2>Formulario de Inscripcion</h2>
        </section>
    </header>
        <form action="./php/nueva_pareja.php" class="container" method="post">
            <div class="row">
                <div class="col-sm-12 col-lg-1">
                    <label for="institucion" class="form-label">Institucion:</label>
                </div>
                <div class="col-sm-12 col-lg-11">
                    <select id="uni" class="form-select" name="institucion">
                        <option value="1">UNEFA</option>
                        <option value="2">ULA</option>
                        <option value="3">UNES</option>
                        <option value="4">UNET</option>
                        <option value="5">UPTAI</option>
                        <option value="6">UBA</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-sm-12 col-lg-6">
                    <div>
                        <h1 class="text-center">Caballero</h1>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="cedula1" class="form-label">Cedula:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="tel" id="id" maxlength="8" class="form-control" name="cedula1">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="nombre1" class="form-label">Nombre:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name" maxlength="50" class="form-control" name="nombre1">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="2donombre1" class="form-label">Segundo Nombre:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name" maxlength="50" class="form-control" name="2donombre1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="apellido1" class="form-label">Apellido:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name2" maxlength="50" class="form-control" name="apellido1">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="2doapellido1" class="form-label">Segundo Apellido:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name" maxlength="50" class="form-control" name="2doapellido1">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="categoria1" class="form-label">Categoria:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <select id="type" class="form-select" name="cargo1">
                                <option value="1">Estudiante</option>
                                <option value="2">Profesor</option>
                                <option value="3">Personal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div>
                        <h1 class="text-center">Dama</h1>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="cedula2" class="form-label">Cedula:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="tel" id="id" maxlength="8" class="form-control" name="cedula2">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="nombre2" class="form-label">Nombre:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name" maxlength="50" class="form-control" name="nombre2">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="2donombre2" class="form-label">Segundo Nombre:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name" maxlength="50" class="form-control" name="2donombre2">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="apellidos2" class="form-label">Apellido:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name2" maxlength="50" class="form-control" name="apellido2">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="2doapellido2" class="form-label">Segundo Apellido:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <input type="text" id="name" maxlength="50" class="form-control" name="2doapellido2">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-lg-2 text-center">
                            <label for="categoria2" class="form-label">Categoria:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <select id="type" class="form-select" name="cargo2">
                                <option value="1">Estudiante</option>
                                <option value="2">Profesor</option>
                                <option value="3">Personal</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <center><button type="submit" class="btn btn-outline-success" id="btn">Inscribir</button></center>
        </form>
    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>