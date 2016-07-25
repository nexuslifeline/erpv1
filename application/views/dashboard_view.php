<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


   <?php echo $_def_css_files; ?>

</head>

<body class="animated-content" style="font-family: tahoma;">

<?php echo $_top_navigation; ?>

<div id="wrapper">
        <div id="layout-static">


        <?php echo $_side_bar_navigation;

        ?>


        <div class="static-content-wrapper">
            <div class="static-content"  >
                    <div class="page-content"><!-- #page-content -->


                        <div class="container-fluid" style="margin-top: 10px;">
                            <div data-widget-group="group1">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel panel-default">
                                            <div class="panel-body table-responsive">

                                                <div class="row">


                                                    <div class="col-sm-4">
                                                        <br />
                                                        <small>
                                                            Income (Current Month)
                                                        </small>
                                                        <h2 class="m-b-xs">
                                                            26,900
                                                        </h2>
                                                        <div id="sparkline1" class="m-b-sm"></div>
                                                        <div class="row">
                                                            <div class="col-xs-4">
                                                                <small class="stats-label">This Day</small>
                                                                <h4>236 321.80</h4>
                                                            </div>

                                                            <div class="col-xs-4">
                                                                <small class="stats-label">Yesterday</small>
                                                                <h4>46.11%</h4>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <small class="stats-label">Last week</small>
                                                                <h4>432.021</h4>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-sm-4">
                                                        <br />
                                                        <small>
                                                            Income (last month)
                                                        </small>
                                                        <h2 class="m-b-xs">
                                                            98,100
                                                        </h2>

                                                        <div id="sparkline2" class="m-b-sm"></div>
                                                        <div class="row">
                                                            <div class="col-xs-4">
                                                                <small class="stats-label">This Day</small>
                                                                <h4>166 781.80</h4>
                                                            </div>

                                                            <div class="col-xs-4">
                                                                <small class="stats-label">Yesterday</small>
                                                                <h4>22.45%</h4>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <small class="stats-label">Last week</small>
                                                                <h4>862.044</h4>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-sm-4">
<br />
                                                        <div class="row m-t-xs">
                                                            <div class="col-xs-6">
                                                                <small>Income (last year)</small>
                                                                <h2 class="no-margins">160,000</h2>
                                                                <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                                                            </div>
                                                            <div class="col-xs-6">
                                                                <small>Income (current year)</small>
                                                                <h2 class="no-margins">42,120</h2>
                                                                <div class="font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                                                            </div>
                                                        </div>


                                                        <table class="table small m-t-sm">
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    <strong>142</strong> Clients

                                                                </td>
                                                                <td>
                                                                    <strong>150</strong> Clients
                                                                </td>

                                                            </tr>


                                                            </tbody>
                                                        </table>



                                                    </div>

                                                </div>

                                                <br /><br />

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <center><small>Income (current year) vs Income (previous year)</small></center><br />

                                                        <div>
                                                            <canvas id="lineChart" height="140"></canvas>
                                                        </div>
                                                    </div>




                                                    <div class="col-lg-6">
                                                        <center><small class="text-navy">Income vs Expense (current year)</small></center><br />
                                                        <div>
                                                            <canvas id="barChart" height="140"></canvas>
                                                        </div>
                                                    </div>


                                                </div>








                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>









                    </div> <!-- #page-content -->
            </div>


            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2016 - Paul Christian Rueda</h6></li>
                    </ul>
                    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                </div>
            </footer>




        </div>
        </div>


</div>


<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<!-- Flot -->
<script src="assets/plugins/flot/jquery.flot.js"></script>
<script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="assets/plugins/flot/jquery.flot.spline.js"></script>
<script src="assets/plugins/flot/jquery.flot.resize.js"></script>
<script src="assets/plugins/flot/jquery.flot.pie.js"></script>
<script src="assets/plugins/flot/jquery.flot.symbol.js"></script>
<script src="assets/plugins/flot/jquery.flot.time.js"></script>

<!-- Sparkline -->
<script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>



<script src="assets/plugins/charts/amcharts.js" type="text/javascript"></script>
<script src="assets/plugins/charts/serial.js" type="text/javascript"></script>


<script src="assets/plugins/chartJs/Chart.min.js"></script>


<script>
    $(document).ready(function() {

        var sparklineCharts = function(){
            $("#sparkline1").sparkline([124, 43, 43, 35, 44, 32, 44, 52,134, 43, 43, 35, 44, 32, 44, 52,124, 43, 43, 35, 44, 32, 44, 52,134, 43, 43, 35, 44, 32, 44, 52], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1ab394',
                fillColor: "transparent"
            });

            $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                type: 'line',
                width: '100%',
                height: '50',
                lineColor: '#1C84C6',
                fillColor: "transparent"
            });
        };

        var sparkResize;

        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });

        sparklineCharts();




        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
        ];
        var data2 = [
            [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
        ];
        $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                data1,  data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,

                    borderWidth: 2,
                    color: 'transparent'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis:{
                },
                yaxis: {
                },
                tooltip: false
            }
        );



        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [248, 148, 160, 39, 56, 37, 30,65, 59, 40, 51, 36, 25, 40]
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [165, 59, 40, 51, 36, 25, 40,65, 59, 40, 51, 36, 25, 40]
                }
            ]
        };

        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true,
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);



    });
</script>

<script>
    var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.5)",
                strokeColor: "rgba(220,220,220,0.8)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: [28, 48, 40, 19, 86, 27, 90]
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);
</script>

<script type="text/javascript">

    var chart;

    var chartData = [
        {
            "color": "rgba(26,179,148,1)",
            "month": "January",
            "netincome": 1200      },
        {
            "color": "rgba(26,179,148,1)",
            "month": "February",
            "netincome": 900               },
        {
            "color": "rgba(26,179,148,1)",
            "month": "March",
            "netincome":1890             },
        {
            "color": "rgba(26,179,148,1)",
            "month": "April",
            "netincome": 0             },
        {
            "color": "rgba(26,179,148,1)",
            "month": "May",
            "netincome": 0                 },
        {
            "color": "rgba(26,179,148,1)",
            "month": "June",
            "netincome": 0                },
        {
            "color": "rgba(26,179,148,1)",
            "month": "July",
            "netincome": 0             },
        {
            "color": "rgba(26,179,148,1)",
            "month": "August",
            "netincome": 0              },
        {
            "month": "September",
            "netincome": 0           },
        {
            "month": "October",
            "netincome": 0                },
        {
            "color": "rgba(26,179,148,1)",
            "month": "November",
            "netincome": 0              },
        {
            "color": "rgba(26,179,148,1)",
            "month": "December",
            "netincome": 0       }
    ];


    AmCharts.ready(function () {
        // SERIAL CHART
        chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
        chart.categoryField = "month";
        chart.startDuration = 1;

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.labelRotation = 90;
        categoryAxis.gridPosition = "start";

        // value
        // in case you don't want to change default settings of value axis,
        // you don't need to create it, as one value axis is created automatically.

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.valueField = "netincome";
        graph.colorField = "color";
        graph.balloonText = "[[category]]: <b>[[value]]</b>";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 0.8;
        chart.addGraph(graph);

        // CURSOR
        var chartCursor = new AmCharts.ChartCursor();
        chartCursor.cursorAlpha = 0;
        chartCursor.zoomable = false;
        chartCursor.categoryBalloonEnabled = false;
        chart.addChartCursor(chartCursor);

        //chart.creditsPosition = "top-left";

        chart.write("chartdiv");
    });/*
     end of chart
     **/


</script>



</body>


</html>