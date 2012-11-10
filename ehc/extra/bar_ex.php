<!DOCTYPE html>

<html>
<head>
	
	<title>Vertical and Horizontal Bar Charts</title>

    <link class="include" rel="stylesheet" type="text/css" href="css/jquery.jqplot.min.css" />
   
  
  <!--[if lt IE 9]><script language="javascript" type="text/javascript" src="../excanvas.js"></script><![endif]-->
    <script class="include" type="text/javascript" src="js/jquery.min.js"></script>
    
   
</head>
<body>


      
<!-- Example scripts go here -->


        
    <div id="chart1" style="width:600px; height:250px;"></div>

    <pre class="code brush: js"></pre>

   

  <script type="text/javascript">
$(document).ready(function(){
	//var s1 = <?php print_r($warehouse1); ?> ;
    //var s2 = <?php print_r($warehouse2); ?> ;
  var s1 = [19,153,127,196,133,483,162,307,14,188,248,253,120,59,182,137] ;

    var s2 = [195,174,101,56,125,14,37,334,238,225,129,160,76,330,144,164] ;

    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
        var ticks = ['Bread','Cake','Canned','Cookie', 'Dairy','Deli','Dough', 'Eggs', 'Fruit', 'Meat', 'Pantry','Pie','Pizza','Poultry','Soup',  'Vegetables'];

    var plot1 = $.jqplot('chart1', [s1, s2], {
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults:{
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true}
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series:[
            {label:'Warehouse1'},
            {label:'Warehouse2'}
        ],
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.05,
                tickOptions: {formatString: '$%d'}
            }
        }
    });
});
  </script>
  



<!-- End example scripts -->

<!-- Don't touch this! -->


    <script class="include" type="text/javascript" src="js/jquery.jqplot.min.js"></script>
    <script type="text/javascript" src="js/shCore.min.js"></script>
    <script type="text/javascript" src="js/shBrushJScript.min.js"></script>
    <script type="text/javascript" src="js/shBrushXml.min.js"></script>
<!-- End Don't touch this! -->

<!-- Additional plugins go here -->

    <script class="include" language="javascript" type="text/javascript" src="js/jqplot.barRenderer.min.js"></script>
    <script class="include" language="javascript" type="text/javascript" src="js/jqplot.categoryAxisRenderer.min.js"></script>
    <script class="include" language="javascript" type="text/javascript" src="js/jqplot.pointLabels.min.js"></script>

<!-- End additional plugins -->


	</div>	
	

</body>


</html>