<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
  
}
if($_GET["total"] != null){
    
    $total = $_GET["total"];
    
    $_SESSION['receptiva'] = $total;
}


?>
<script src="../vista/inicio/js/preguntas_expresiva.js"></script>
<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->

<body>
   
    <div class="page-content">
        <section id="preguntas">
            <h3>Subdominio</h3>
            <h2 id="subdominio">Expresiva</h2>
            <!-- Escritura.php  -->
            <form id="preguntas-contenedor">
                <?php
                include("../modelo/conexion.php");
                include("../modelo/modelo_crear_preguntas_expresiva.php");
                ?>
                
				<div id="resultados">
                <label>Regla basal</label>
				<input type="text" name="" id="mregla">
                Numero de DK<input type="text" name="" id="mdk">
                Suma de 2+1<input type="text" name="" id="m1">
                Numero de 0<input type="text" name="" id="m0">
                Puntaje en Subdominio Receptiva<input type="text" name="" id="expresiva">
				</div>
                <button id="btnexpresiva" value="presionado" type="submit" class="btn btn-primary btn-rounded">Siguiente</button>
                <button id="btncargar" class="btn btn-primary btn-rounded" onclick="ReglaBasal()">Evaluar</button>
            </form>
        </section>

    </div>

    <!-- fin del contenido principal -->

</body>



<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>