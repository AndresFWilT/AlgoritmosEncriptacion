<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0">
    <title>Codificaci&oacute;n Huffman</title>
    <!--css-->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,300" rel='stylesheet' type='text/css'">
    <link rel=" stylesheet" href="../css/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap-4.0.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <!--Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
</head>

<body> 
    <div class="contenedor-Titulo">
        <h1 class="titulo">Codificaci&oacute;n Huffman</h1>
    </div>
    </br>
    <div id="pagina">
        <a href="../views/shannonFano.view.php">Codificac&iacute;on Shannon-Fano</a>
    </div>
    <div id="info">
        <a href="../views/huffmanInfo.view.php">Informaci&oacute;n acerca de la </br>codificaci&oacute;n Huffman</a>
    </div>
    <div id="mensaje">
        <form action="../logica/index.php" method="POST">
            <input type="text" id="entrada" placeholder="Palabra a codificar" name="mensaje">
            <input type="submit" value="Enviar" id="boton" name="boton">
        </form>
    </div>
    <?php if (isset($tablaFinal)) { ?>
        <h3><big>ARBOL DE HUFFMAN</big></h3>
        </br></br></br>
        <?= $saltos ?>
    <?php } ?>
    <div id="huffman">
        <?php if (isset($_POST['boton']) && empty($_POST['mensaje'])) {
            echo $mensaje;
        } else { ?>
            <div id="arbol">
                <?php if (isset($arbol)) { ?>
                    <div class="tree">
                        <ul><?= $arbol ?></ul>
                    </div>
                <?php } ?>
            </div>
            <?php if (isset($saltos)) {
                echo $saltos;
            } ?>
            </br></br></br>
            <div id="tabla">
                <?php if (isset($tablaFinal) && isset($tamaño)) { ?>
                    <table width="275" height="250" border="1">
                        <caption><big>Tabla de Huffman</big></caption>
                        <?= $tablaFinal; ?>
                    </table>
                <?php } ?>
            </div>
            <?php if (isset($tablaFinal)) { ?>
            </br><h3 id="subtitulo"><big>Informaci&oacute;n del mensaje</big></h3></br></br>
            <?php } ?>
            <div id="bits_info">
                <?php if (isset($bitsDatos)) { ?>
                    
                    <fieldset>
                        <legend>
                            <h3 id="subtitulo"><big>Datos</big></h3>
                        </legend>
                        <p><?= $bitsDatos; ?></p>
                        </br>
                        <div class="progress" style="height: 30px;">
                            <div id="progressBar" class="progress-bar" role="progressbar" style="width:<?= $codificado; ?>%" aria-valuemin="0" aria-valuemax="100"><?= $codificado; ?>%</div>
                            <div id="freeBar" class="progress-bar bg-success" role="progressbar" style="width:<?= $ahorrado; ?>%" aria-valuemin="0" aria-valuemax="100"><?= $ahorrado; ?>%</div>
                        </div></br>
                    </fieldset>
                    <div class="column">
                        <?= $graficoBarra; ?>
                    </div>
                    <div style ="width:30%">
                        <canvas id="myChart"></canvas>
                    </div>
                <?php } ?>
            </div>
            </br></br></br></br>
            <div id="codificacion">
                <?php if (isset($mensajeCodificado)) { ?>
                    <fieldset>
                        <legend>
                            <h3 id="subtitulo"><big>Mensaje codificado</big></h3>
                        </legend>
                        <p><?= $mensajeCodificado; ?></p>
                    </fieldset>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</body>
<script>
    var oilCanvas = document.getElementById("myChart").getContext("2d");

    Chart.defaults.global.defaultFontFamily = "Oswald";
    Chart.defaults.global.defaultFontSize = 12;

    var oilData = {
        labels: [
            "Codificado",
            "Ahorrado"
        ],
        datasets: [{
            data: [<?=$codificado; ?>,<?=$ahorrado; ?>],
            backgroundColor: [
                "#007bff",
                "#04da36"
            ],
            borderColor: "darkorange",
            borderWidth: 1
        }]
    };

    var chartOptions = {
        rotation: -Math.PI,
        cutoutPercentage: 30,
        circumference: Math.PI,
        legend: {
            position: 'left'
        },
        animation: {
            animateRotate: false,
            animateScale: true
        },
        responsive: false,
    };

    var pieChart = new Chart(oilCanvas, {
        type: 'doughnut',
        data: oilData,
        options: chartOptions
    });
</script>

</html>