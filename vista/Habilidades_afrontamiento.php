<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}
if (empty($_SESSION['juego'])) {
    if ($_GET["total"] != null) {

        $total = $_GET["total"];
    
        $_SESSION['juego'] = $total;
    }
}

?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>
<script src="../vista/inicio/js/preguntas_habilidades_afrontamiento.js"></script>
<!-- inicio del contenido principal -->

<body>

    <div class="page-content">
    <section class="step-wizard">
            <ul class="step-wizard-list">
                <li class="step-wizard-item izquierda">
                    <span class="progress-count">1</span>
                    <span class="progress-label">Receptiva</span>
                </li>
                <li class="step-wizard-item centro" data-words="Comunicacion">
                    <span class="progress-count">2</span>
                    <span class="progress-label">Expresiva</span>
                </li>
                <li class="step-wizard-item derecha">
                    <span class="progress-count">3</span>
                    <span class="progress-label">Escritura</span>
                </li>
                <li class="step-wizard-item izquierda last-right" data-words="Habilidades"">
                    <span class="progress-count">4</span>
                    <span class="progress-label">Personal</span>
                </li>
                <li class="step-wizard-item centro" data-words="de la Vida">
                    <span class="progress-count">5</span>
                    <span class="progress-label">Domestico</span>
                </li>
                <li class="step-wizard-item derecha last-left" data-words="Diaria"">
                    <span class="progress-count">6</span>
                    <span class="progress-label">Comunitario</span>
                </li>
                <li class="step-wizard-item izquierda">
                    <span class="progress-count">7</span>
                    <span class="progress-label">Relaciones Interpersonales</span>
                </li>
                <li class="step-wizard-item centro" data-words="Socializacion">
                    <span class="progress-count">8</span>
                    <span class="progress-label">Juego y Tiempo Libre</span>
                </li>
                <li class="step-wizard-item current-item derecha">
                    <span class="progress-count">9</span>
                    <span class="progress-label">Habilidades de Afrontamiento </span>
                </li>
                <li class="step-wizard-item izquierda last-right" data-words="Habilidades">
                    <span class="progress-count">10</span>
                    <span class="progress-label">Gruesa</span>
                </li>
                <li class="step-wizard-item derecha last-left" data-words="Motoras">
                    <span class="progress-count">11</span>
                    <span class="progress-label">Fina</span>
                </li>
            </ul>
        </section>
        <section id="preguntas">
            <h2>Subdominio</h2>
            <h3 id="subdominio">Habilidades de Afrontamiento</h3>
            <div class="imagenes-contenedor">
                <div class="imagen">
                    <img src="../vista/inicio/img/Manners.png">
                    <span class="imagen-texto">Manners</span>
                </div>
                <div class="imagen">
                    <img src="../vista/inicio/img/Apologizing.png">
                    <span class="imagen-texto">Apologizing</span>
                </div>
                <div class="imagen">
                    <img src="../vista/inicio/img/Responsibility.png">
                    <span class="imagen-texto">Responsibility</span>
                </div>
                <div class="imagen">
                    <img src="../vista/inicio/img/Apropiate Social Caution.png">
                    <span class="imagen-texto">Apropiate Social Caution</span>
                </div>
                <div class="imagen">
                    <img src="../vista/inicio/img/Transitions.png">
                    <span class="imagen-texto">Transitions</span>
                </div>
                <div class="imagen">
                    <img src="../vista/inicio/img/Controlling impulses.png">
                    <span class="imagen-texto">Controlling impulses</span>
                </div>
                <div class="imagen">
                    <img src="../vista/inicio/img/Keeping Secrets.png">
                    <span class="imagen-texto">Keeping Secrets</span>
                </div>
            </div>
            <form id="preguntas-contenedor">
                <?php
                include("../modelo/conexion.php");
                require("../modelo/modelos_crear_preguntas_habilidades_afrontamiento.php");

                ?>
                <div id="resultados">
                    <label>Regla basal</label>
                    <input type="text" name="" id="mregla">
                    Numero de DK<input type="text" name="" id="mdk">
                    Suma de 2+1<input type="text" name="" id="m1">
                    Numero de 0<input type="text" name="" id="m0">
                    Puntaje en Subdominio Receptiva<input type="text" name="" id="total">
                </div>
                <button id="btnevaluar" value="presionado" type="submit" class="btn btn-primary btn-rounded">Siguiente</button>
                <button id="btncargar" class="btn btn-primary btn-rounded">Evaluar</button>
            </form>
        </section>


    </div>

    <!-- fin del contenido principal -->

</body>



<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>