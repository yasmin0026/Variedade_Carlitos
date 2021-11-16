<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js"  ></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>

<section class="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12"><h4 align="center">Abonos y Deudas De Proveedores</h4></div>
            <div class="chart-container" style="position: relative; ">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <br><br>

        <div class="row">
            <div class="col-md-12"><h4 align="center">Totales de Abonos y Deudas</h4></div>
            <div class="chart-container" style="width: 50%; margin: 0px 25%;">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
</section>

<?php if ($alerta == true): ?>
    <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Pocas Existencias',
          text: 'Tiene productos que tienen existencias minimas a 20 piezas',
          footer: '<a href="#">Ver Inventario</a>'
        })
    </script>
<?php endif ?>


<script type="text/javascript">

    var paraMeses  = [];
    var paraAbonos = [];
    var paraDeudas = [];

    var paraTotalAbonos = [];
    var paraTotalDeudas = [];

    var paraTotal = [];

    $.post("<?php echo base_url();?>LoginController/graficaDatos",
        function(data){
            //Codigo adentro

            var obj = JSON.parse(data);

            paraMeses = [];
            paraAbonos = [];
            paraDeudas= [];


            $.each(obj, function(i,item){
                paraMeses.push(item.Meses);
                paraAbonos.push(item.AbonoProveedor);
                paraDeudas.push(item.DeudaProveedor);
            });

            var ctx = document.getElementById('myChart');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: paraMeses,
                    datasets: [
                    {
                        label: '# Abonos',
                        data: paraAbonos,
                        backgroundColor: ['rgba(75, 192, 192, 0.2)'],
                        borderColor: ['rgba(75, 192, 192, 1)'],
                        borderWidth: 1
                    }
                    ,{
                        label: '# Deudas',
                        data: paraDeudas,
                        backgroundColor: ['rgba(255, 99, 132, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 1)'],
                        borderWidth: 1
                    }
                    
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            


        });


    //Grafica de PIE

    $.post("<?php echo base_url();?>LoginController/graficaTotales",
        function(data){

            var obj = JSON.parse(data);

            paraTotalAbonos = [];
            paraTotalDeudas = [];

            paraTotal = [];

            $.each(obj, function(i,item){

                paraTotalAbonos.push(item.AbonoTotalProveedor);
                paraTotalDeudas.push(item.DeudaTotalProveedor);
                paraTotal.push(item.AbonoTotalProveedor);
                paraTotal.push(item.DeudaTotalProveedor);
            });

            var ctx2 = document.getElementById('myChart2');

                var myChart2 = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: ['Abonos $', 'Deudas $'],
                        datasets: [{
                            label: 'My First Dataset',
                            data: paraTotal,
                            backgroundColor: ['rgba(75, 192, 192, 0.7)', 'rgba(255, 99, 132, 0.7)'],
                        }]
                    },

                });

        });

</script>

