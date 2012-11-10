<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
$(function () {
    var chart;
	var d1 = document.getElementById('disp').value;
	var d2 = document.getElementById('disp2').value;
    $(document).ready(function() {
    
        // define the options
        var options = {
    
            chart: {
                renderTo: 'container',
				type: 'column'
            },
    
            title: {
                text: 'Units available in each warehouse'
            },
    
            xAxis: {
                categories: [
                    'Bread',
                    'Cake',
                    'Canned',
                    'Cookie',
                    'Dairy',
                    'Deli',
                    'Dough',
                    'Eggs',
                    'Fruit',
                    'Meat',
                    'Pantry',
							'Pie',
							'Pizza',
							'Soup',
                    'Vegetables'
                ]            },
    
           yAxis: {
                min: 0,
                title: {
                    text: 'Rainfall (mm)'
                }
            },
    
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 100,
                y: 70,
                floating: true,
                shadow: true
            },
    
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' mm';
                }
            },
    
           plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
    
            series: [{
                name: 'Warehouse1',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
    
            }, {
                name: 'Warehouse2',
                data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]
    
            }]
        };
    
    
       
       
           
    
            options.series[0].data = allVisits;
            options.series[1].data = newVisitors;
    
            chart = new Highcharts.Chart(options);
        
    });
    
});
		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script type="text/javascript" src="http://www.highcharts.com/highslide/highslide-full.min.js"></script>
<script type="text/javascript" src="http://www.highcharts.com/highslide/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="http://www.highcharts.com/highslide/highslide.css" />

<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
