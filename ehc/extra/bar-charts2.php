<?php 

$warehouse1 = "[";
$warehouse2 = "[";
 // Connects to your Database 
 mysql_connect("us01-user01.crtks9njytxu.us-east-1.rds.amazonaws.com", "uv1f3ldE1Hs3a", "pGUEpO579qllF") or die(mysql_error()); 
 mysql_select_db("d8fa082c41a004a98804199d41495603f") or die(mysql_error()); 
 $data = mysql_query("SELECT tt.`type` typ, SUM(  `qty` ) quantity
FROM  `transaction` tt, boxwh bw
WHERE tt.boxid = bw.boxid
GROUP BY tt.type, warehouse
having warehouse =1
") 
 or die(mysql_error()); 

 while($row = mysql_fetch_array( $data )) 
 { 
  $warehouse1 = $warehouse1 . $row['quantity']  . "," ;
 }
 
 $data2 = mysql_query("SELECT tt.`type` typ, SUM(  `qty` ) quantity
FROM  `transaction` tt, boxwh bw
WHERE tt.boxid = bw.boxid
GROUP BY tt.type, warehouse
having warehouse =2
") 
 or die(mysql_error()); 

 while($row2 = mysql_fetch_array( $data2 )) 
 { 
  //array_push($warehouse1,$row2['quantity']);
    $warehouse2 = $warehouse2  . $row2['quantity'] .  ",";
 } 
 $warehouse1 = substr($warehouse1, 0, -1);
  $warehouse2 = substr($warehouse2, 0, -1);
$warehouse1 .= "]";
$warehouse2 .= "]";
//print_r($warehouse1);
?> 


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
   var s1 = [19,153,127,196,133,483,162,307,14,188,248,253,120,59,182,137] ;

    var s2 = [19,153,127,196,133,483,162,307,14,188,248,253,120,59,182,137] ;

    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = ['Bread', 'Cake', 'Canned', 'Cookie', 'Dairy', 'Deli', 'Dough', 'Eggs', 'Fruit', 'Meat', 'Pantry', 'Pie', 'Pizza', 'Poultry', 'Soup', 'Vegetables'];

    
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