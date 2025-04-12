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
    <video 
  src="./assets/video/running.mp4" 
  autoplay 
  loop 
  muted 
  style="width: 100%; max-width: 1366px; height: 150vh; display: block; margin: 0 auto; object-fit: cover;">
</video>
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
                        <option value="7">CANTV</option>
                        <option value="8">GNB</option>
                        <option value="9">RPG (Regimiento Guardia del Pueblo)</option>
                        <option value="10">REDI</option>
                        <option value="11">ZODI</option>
                        <option value="12">DSU (Destacamento Seguridad Urbana)</option>
                        <option value="13">ASC (Alcaldia)</option>
                        <option value="14">CL (Consejo Legislativo)</option>
                        <option value="15">BOMB</option>
                        <option value="16">PC (Proteccion Civil)</option>
                        <option value="17">PT (Politachira)</option>
                        <option value="18">PNB</option>
                        <option value="19">LT (Loteria del Tachira)</option>
                        <option value="20">VNET</option>
                        <option value="21">DLP (Distribuidor las Palmeras)</option>
                        <option value="22">MA (Min. Aguas)</option>
                        <option value="23">CS (Ciro Sanchez)</option>
                        <option value="24">MM (Multi Max)</option>
                        <option value="25">DAKA</option>
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
                                <option value="2">Personal</option>
                                <option value="3">Invitado Especial</option>
                                <option value="4">Particular</option>
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
                            <label for="categoria1" class="form-label">Categoria:</label>
                        </div>
                        <div class="col-sm-12 col-lg-10">
                            <select id="type" class="form-select" name="cargo2">
                                <option value="1">Estudiante</option>
                                <option value="2">Personal</option>
                                <option value="3">Invitado Especial</option>
                                <option value="4">Particular</option>
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