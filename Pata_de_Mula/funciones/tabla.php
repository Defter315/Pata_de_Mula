<?php

$con = new mysqli("localhost","root","","restaurante");             // Conectar a la BD
$sql = "SELECT*FROM personas WHERE fk_estado=1";   // Consulta SQL
$query = $con->query($sql);                              // Ejecutar la consulta SQL
$data = array();                                        // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){                    // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r;                                       // Guardar los resultados en la variable $data
}


?>

<script src="../../assets/js/chart.min.js"></script>

<canvas id="chart1" style="width: 10%;" height="84" ></canvas>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php echo $d->nombres,' ',$d->apellidoPaterno?>",         /*  Nombre de la columna de la base de datos  */
        <?php endforeach; ?>
        ],
        datasets: [{
            label: 'Salario',
            data: [
        <?php foreach($data as $d):?>
        <?php echo $d->salario;?>,         /*  Nombre de la columna de la base de datos  */
        <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 1
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar',                            /*  valores: line, bar  */
    data: data,
    options: options
});
</script>