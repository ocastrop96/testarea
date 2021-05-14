<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" />
    <title>GRÁFICO CON CHART JS</title>
</head>

<body>
    <div class="col-lg-12 pt-5">
        <div class="card">
            <div class="card-header">
                GRÁFICO CON CHARTJS
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <!-- <button class="btn btn-primary" onclick="CargarDatosGraficoBar()">Gráfico Bar</button> -->
                        <canvas id="myChartBar" width="400" height="400"></canvas>
                    </div>
                    <div class="col-lg-3">
                        <!-- <button class="btn btn-primary" onclick="CargarDatosGraficoBarHorizontal()">Gráfico Bar Horizontal</button> -->
                        <canvas id="myChartBarHorizontal" width="400" height="400"></canvas>
                    </div>
                    <div class="col-lg-3">
                        <!-- <button class="btn btn-primary" onclick="CargarDatosGraficoBarHorizontal()">Gráfico Bar Horizontal</button> -->
                        <canvas id="myChartPie" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                GRÁFICO CON CHARTJS CON PARAMETROS
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-5">
                        <label for="">Fecha Inicio</label>
                        <select name="" id="select_finicio" class="form-control"></select>
                    </div>
                    <div class="col-lg-5">
                        <label for="">Fecha Fin</label>
                        <select name="" id="select_ffin" class="form-control"></select>
                    </div>
                    <div class="col-lg-2">
                        <label for="">&nbsp;</label><br>
                        <button class="btn btn-danger" onclick="CargarDatosGraficoDona()">BUSCAR</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <!-- <button class="btn btn-primary" onclick="CargarDatosGraficoBar()">Gráfico Bar</button> -->
                        <canvas id="myChartDonnut_parametro" width="400" height="400"></canvas>
                    </div>
                    <div class="col-lg-3">
                        <!-- <button class="btn btn-primary" onclick="CargarDatosGraficoBarHorizontal()">Gráfico Bar Horizontal</button> -->
                        <canvas id="myChartBarHorizontal_parametro" width="400" height="400"></canvas>
                    </div>
                    <div class="col-lg-3">
                        <!-- <button class="btn btn-primary" onclick="CargarDatosGraficoBarHorizontal()">Gráfico Bar Horizontal</button> -->
                        <canvas id="myChartPie_parametro" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<script>
    CargarDatosGraficoBar();
    CargarDatosGraficoBarHorizontal();
    CargarDatosGraficoPie();

    function CargarDatosGraficoBar() {
        $.ajax({
            url: 'controlador-grafico.php',
            type: 'POST'
        }).done(function(resp) {
            if (resp.length > 0) {
                var data = JSON.parse(resp);
                var titulo = [];
                var cantidad = [];
                var colores = [];
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i][1]);
                    cantidad.push(data[i][2]);
                    colores.push(colorRGB());
                }
                CrearGrafico(titulo, cantidad, colores, 'bar', 'GRÁFICO EN BARRAS DE PRODUCTOS', 'myChartBar')
                // OcultarDesocultar('myChartBarHorizontal', 'myChartBar');
            }
        });
    }

    function CargarDatosGraficoBarHorizontal() {
        $.ajax({
            url: 'controlador-grafico.php',
            type: 'POST'
        }).done(function(resp) {
            if (resp.length > 0) {
                var data = JSON.parse(resp);
                var titulo = [];
                var cantidad = [];
                var colores = [];
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i][1]);
                    cantidad.push(data[i][2]);
                    colores.push(colorRGB());
                }
                CrearGrafico(titulo, cantidad, colores, 'horizontalBar', 'GRÁFICO EN BARRAS HORIZONTALES DE PRODUCTOS', 'myChartBarHorizontal')
                // OcultarDesocultar('myChartBar', 'myChartBarHorizontal');
            }
        });
    }
    // Permutaciones
    /**
     * pie
     * doughnut
     */
    function CargarDatosGraficoPie() {
        $.ajax({
            url: 'controlador-grafico.php',
            type: 'POST'
        }).done(function(resp) {
            if (resp.length > 0) {
                var data = JSON.parse(resp);
                var titulo = [];
                var cantidad = [];
                var colores = [];
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i][1]);
                    cantidad.push(data[i][2]);
                    colores.push(colorRGB());
                }
                CrearGrafico(titulo, cantidad, colores, 'pie', 'GRÁFICO EN BARRAS HORIZONTALES DE PRODUCTOS', 'myChartPie')
                // OcultarDesocultar('myChartBar', 'myChartBarHorizontal');
            }
        });
    }
    /**
     * funciones para crear gráficos con parámetros
     */
    TraerAnio();

    function TraerAnio() {
        var mifecha = new Date();
        var anio = mifecha.getFullYear();
        var cadena = "";
        // alert(anio);
        for (var i = 2015; i < anio + 1; i++) {
            cadena += "<option value=" + i + ">" + i + "</option>"
        }
        $("#select_finicio").html(cadena);
        $("#select_ffin").html(cadena);

    }
    // CargarDatosGraficoDona();

    function CargarDatosGraficoDona() {
        var fechainicio = $("#select_finicio").val();
        var fechafin = $("#select_ffin").val();

        $.ajax({
            url: 'controlador-grafico-parametro.php',
            type: 'POST',
            data: {
                inicio: fechainicio,
                fin: fechafin
            }
        }).done(function(resp) {
            if (resp.length > 0) {
                var data = JSON.parse(resp);
                var titulo = [];
                var cantidad = [];
                var colores = [];
                for (var i = 0; i < data.length; i++) {
                    titulo.push(data[i][0]);
                    cantidad.push(data[i][1]);
                    colores.push(colorRGB());
                }
                CrearGrafico(titulo, cantidad, colores, 'doughnut', 'GRÁFICO EN DONA DE PRODUCTOS', 'myChartDonnut_parametro')
            }
        });
    }

    function CrearGrafico(titulo, cantidad, colores, tipo, encabezado, idchart) {
        var ctx = document.getElementById(idchart);
        var myChart = new Chart(ctx, {
            type: tipo,
            data: {
                labels: titulo,
                datasets: [{
                    label: '# Stock de Productos',
                    data: cantidad,
                    backgroundColor: colores,
                    borderColor: colores,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    function generarNumero(numero) {
        return (Math.random() * numero).toFixed(0);
    }

    function colorRGB() {
        var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
        return "rgb" + coolor;
    }
</script>