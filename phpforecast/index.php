<?php
$output = array();
exec("python easy.py data.txt datatest.txt", $output);
//var_dump( $output);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'line',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Forecast input parameters',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                categories: ['December', 'November', 'October', 'September', 'August']
            },
            yAxis: {
                title: {
                    text: 'Values'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +' units';
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series: [{
                name: 'Previous month actual data',
                data: [800, 1000, 1500, 1200, 1000]
            }, {
                name: 'Market demand',
                data: [1750, 1750, 0, 1750, 0]
            }, {
                name: 'Previous Year same month data',
                data: [800,800,800,1400,900]
            }]
        });
    });
    
});
		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
By running our support vector machine against this data we were expecting 1200 and 1600 units and we got
<?php
$myFile = "datatest.txt.predict";
$fh = fopen($myFile, 'r');
$theData = fread($fh, filesize($myFile));
fclose($fh);
echo $theData;
?>
respectively which matches our expectations.
	</body>
</html>
