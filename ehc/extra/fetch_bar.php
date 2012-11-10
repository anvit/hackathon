<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>      
        <script type="text/javascript">
	var chart;
			$(document).ready(function() {
				var options = {
					chart: {
						renderTo: 'container',
						defaultSeriesType: 'bar',
						
					},
					title: {
						text: 'Warehouse Stock',
						
					},
					subtitle: {
						text: '',
						
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
					'Poultry',
					'Soup',
                    'Vegetables' ]
					},
					yAxis: {
						title: {
							text: 'Units'
						}
					},
					 tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' units';
                }
            }
				}
				// Load data asynchronously using jQuery. On success, add the data
				// to the options and initiate the chart.
				// This data is obtained by exporting a GA custom report to TSV.
				// http://api.jquery.com/jQuery.get/
				jQuery.get('bar_data.php', null, function(tsv) {
					var lines = [];
					var s1 = [];
					var s2 = [];
					try {
						tsv = tsv.split(/\n/g);
						tsv.splice(32,1);
						jQuery.each(tsv, function(i, line) {
							if(i%2==0)
							{				
							s1.push([parseInt(tsv[i])]);
							}
							else
							{
							s2.push([parseInt(tsv[i])]);
							}
						});
					} catch (e) {  }
					options.series[0].name = 'Warehouse1';
					options.series[0].data = s1;
					options.series[1].name = 'Warehouse2';					
					options.series[1].data = s2;
					chart = new Highcharts.Chart(options);
				});
			});
</script>
		
	</head>
	<body>

<link rel="stylesheet" type="text/css" href="http://www.highcharts.com/highslide/highslide.css" />

<div id="container" style="width: 100%; height: 400px; margin: 0 auto"></div>

	</body>
</html>
