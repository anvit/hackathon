<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>jQuery MegaMenu Plugin - Version 2.0</title>
    <link rel="stylesheet" href="css/jquery.megamenu.css" type="text/css" media="screen" />
    	<script type='text/javascript' src='http://code.jquery.com/jquery-1.7.1.js'></script>
    </script>
    <script src="js/jquery.megamenu.js" type="text/javascript"></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js'></script>
    <script src="js/blur.js" type="text/javascript"></script>
  
<script type='text/javascript'>


$(document).ready(function(){
    
	$("#load_box").click(function(){
		$("#box11").load("blah.html");
	});
	
	$("#load_db").click(function(){
		$("#box11").load("fetch_db.php");
	});
	
	$("#load_graph").click(function(){
		$("#box11").load("fetch_graph.php");
	});
	
	$("#load_bar").click(function(){
		$("#box11").load("fetch_bar.php");
	});
	
	$("#load_pie").click(function(){
		$("#box11").load("fetch_pie.php");
	});
	
    $('.target').blurjs({
		source: 'body',
        radius: 5,
        overlay: 'rgba(255,255,255,0.4)',
        optClass: 'blurred',
        cache:false
    });
    
    
    // Demo Buttons
    $('button').live('click', function(e){e.preventDefault();if($(this).attr('rel') && !$(this).hasClass('dl')){window.location = "?bg="+$(this).attr('rel');} else if($(this).text()=="Demo") {demos($(this).parent().attr('id'));} else if($(this).hasClass('dl')){
    
    track($(this).attr('rel'), $(this).attr('rel'));
    
    }  
    });
    
});


function demos(object){if(object=="highblur"){$('#'+object).blurjs({source:'body',radius:10})}else if(object=="overlayblur"){$('#'+object).blurjs({source:'body',overlay:'rgba(255,255,255,0.4)'})}else if(object=="overlayblur2"){$('#'+object).blurjs({source:'body',overlay:'rgba(0,100,100,0.1)'})}else if(object=="offsetblur"){$('#'+object).blurjs({source:'body',offset:{x:15,y:-12}})}else if(object=="sourceblur"){$('#'+object).blurjs({source:'#wideContainer',overlay:'rgba(255,255,255,0.3)'});} else if(object=="draggable"){$('#'+object).blurjs({draggable:true,overlay:'rgba(255,255,255,0.4)'});} else if(object=="cacheblur"){$('#'+object).blurjs({cache:true,debug:true});} }



</script>
    <script type="text/javascript">
      jQuery(function(){
        var SelfLocation = window.location.href.split('?');
        switch (SelfLocation[1]) {
          case "justify_right":
            jQuery(".megamenu").megamenu({ 'justify':'right' });
            break;
          case "justify_left":
          default:
            jQuery(".megamenu").megamenu();
        }
      });
</script>

    <style>
			body
			{
				
				background:url(images/titanium-texture.jpg);
				height:100%;
				width:100%;
			}
			.target
			{
				
				 margin:0 auto; margin-bottom:50px;  padding:5px; -moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px;-moz-box-shadow:0 1px 0 rgba(0,0,0,0.3),0 -1px 0 rgba(255,255,255,0.8),0 4px 10px rgba(0,0,0,0.6);-webkit-box-shadow:0 1px 0 rgba(0,0,0,0.3),0 -1px 0 rgba(255,255,255,0.8),0 4px 10px rgba(0,0,0,0.6);box-shadow:0 1px 0 rgba(0,0,0,0.3),0 -1px 0 rgba(255,255,255,0.8),0 4px 10px rgba(0,0,0,0.6)
			}
	</style>
    <!--style>
	#bg {
	position:fixed; 
	top:-50%; 
	left:-50%; 
	width:200%; 
	height:200%;
}
#bg img {
	position:absolute; 
	top:0; 
	left:0; 
	right:0; 
	bottom:0; 
	margin:auto; 
	min-width:50%;
	min-height:50%;
}
	</style-->
    
    <LINK REL="SHORTCUT ICON" HREF="images/logo_hunger2.ico" />
  </head>
  <body>
 
<table width="100%" border="0">
  <tr>
    <td><div id='menu' class="target">
  <table id="Page" cellspacing="0" cellpadding="0">
  <tr><td valign="top">
  
<!--MegaMenu Starts-->
    <ul class="megamenu">
      <li>
        <a href="javascript:void(0)">Tabular Content</a>
        <div style="width: 500px;">
          <h3>Tabular Content Example</h3>
          <table border="1" cellpadding="0" cellspacing="0" id="tabular-content">
            <tr>
              <th style="width: 15px">ID</th>
              <th>Name</th>
              <th>Place</th>
              <th style="width: 60px">Number</th>
            </tr>
            <tr>
              <td>1</td><td>Shiva Shankara Sahoo</td><td>Parlakhemundi</td><td>6742266</td>
            </tr>
            <tr>
              <td>2</td><td>Ravi Nikam</td><td>Brussels</td><td>5669985</td>
            </tr>
            <tr>
              <td>3</td><td>John Doe</td><td>Olympus</td><td>8699552</td>
            </tr>
            <tr>
              <td>4</td><td>Don Joe</td><td>Sinki</td><td>8877556</td>
            </tr>
          </table>
        </div>
      </li>
      
      <li>
        <a href="javascript:void(0)">List Content</a>
        <div style="width: 300px;">
          <ul id="list-content">
            <li>Point 1 is the first point
              <ul>
                <li>Point 1.1 goes here</li>
                <li>Point 1.2 goes here</li>
                <li>Point 1.3 can go here also</li>
              </ul>
            </li>
            <li>Point 2 is the second point
              <ul>
                <li>Point 2.1 is a sub point</li>
                <li>Point 2.2 is a sub point</li>
              </ul>
            </li>
            <li>Point 3 is the third point
              <ul>
                <li>Point 3.1 is a sub point</li>
                <li>Point 3.2 is a sub point</li>
              </ul>
            </li>
            <li>Point 4 is the lone fourth point without any children</li>
          </ul>
        </div>
      </li>
     
      <li>
        <a href="javascript:void(0)">One Liner</a>
        <div style="width: 500px;">
          See how the position of the menu gets adjusted to stay within the outer bounds.
        </div>
      </li>
      <li><a href="#" id="load_box">Menu Less Menu</a>
      </li>
      <li>
      <a href="#" id="load_db">Fetch Database</a>
      </li>
      <li>
      <a href="#" id="load_graph">Fetch graph</a>
      </li>
      <li>
      <a href="#" id="load_bar">Fetch bar</a>
      </li>
      <li>
      <a href="#" id="load_pie">Fetch pie</a>
      </li>
     </ul>
  
<!--MegaMenu Ends-->

  </td></tr>
  </table>
 </div></td>
  </tr>
  <tr>
    <td><div id="box11">&nbsp;</div></td>
  </tr>
</table>


 </center>
  </body>
</html>
