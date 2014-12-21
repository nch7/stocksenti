@extends('layouts.user_layout')

@section('contents')
<?php 

$scores = str_replace('"','',json_encode(array_fetch($scores,'score')));
 ?>
<script type="text/javascript">//<![CDATA[ 
        $(function () {
            var chart;
            $(document).ready(function () {
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'container',
                        type: 'line',
                        marginRight: 130,
                        marginBottom: 25
                    },
                    title: {
                        text: 'Foo Over Time',
                        x: -20 //center
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -10,
                        y: 100,
                        borderWidth: 0
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                            this.x + ': ' + this.y;
                        }
                    },
                 series: [{
                        name: 'Foo',
                        data: <?php echo $scores;?>
                    }]
                });
            });

        });
        //]]>  
    </script>
 <script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>

@stop