<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:login/login.php');
}
include_once("../modelo/conexion.php");
include_once("../modelo/modelo_panel_dashboard.php");
?>
<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    


    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Edades de Evaluados'],
                <?php
                $datagrap = $conexion->query("SELECT edad_cronologica, COUNT(*) AS TotalRegistros
                    FROM entrevistados
                    GROUP BY edad_cronologica;");
                while ($row = $datagrap->fetch_assoc()) {
                    echo "['" . $row['edad_cronologica'] . "'," . $row['TotalRegistros'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Edades Entrevistados',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

            google.visualization.events.addListener(chart, 'select', selectHandler);

            chart.draw(data, options);

            function selectHandler() {
                var selectedItem = chart.getSelection()[0];
                if (selectedItem) {
                    var option = data.getValue(selectedItem.row, 0);
                    // Redireccionar a otra página
                    window.location.href = '../vista/Lista_entrevistados.php?option=' + option;
                }
            }
        }
    </script>
</head>


<div class="page-content">

    <div class="w3-row-padding w3-margin-bottom">

        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php echo $totalEvaluaciones  ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Numero de Entrevistas</h4>
            </div>
        </div>
        <div class="w3-quarter">
            <div class="w3-container w3-green w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3><?php echo $totalEnt ?></h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Numero de Usuarios</h4>
            </div>
        </div>
    </div>

    <h2>Edad</h2>
    <h3 id="subdominio">Edad de Todos los Entrevistados</h3>
    <div id="donutchart" style="width: auto; height: 500px;">
    </div>
</div>

<!-- fin del contenido principal -->





<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>