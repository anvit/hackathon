<style>
#z {
    border-collapse: separate;
    border-spacing: 0;
	-moz-box-shadow:0 1px 0 rgba(0,0,0,0.3),0 -1px 0 rgba(255,255,255,0.8),0 4px 10px rgba(0,0,0,0.6);-webkit-box-shadow:0 1px 0 rgba(0,0,0,0.3),0 -1px 0 rgba(255,255,255,0.8),0 4px 10px rgba(0,0,0,0.6);box-shadow:0 1px 0 rgba(0,0,0,0.3),0 -1px 0 rgba(255,255,255,0.8),0 4px 10px rgba(0,0,0,0.6);
}
#z, #x{
    border: 5px ;
    border-radius: 6px;
    -moz-border-radius: 5px;
    padding: 3px;
}​
</style>
<?php 
 // Connects to your Database 
 mysql_connect("us01-user01.crtks9njytxu.us-east-1.rds.amazonaws.com", "uv1f3ldE1Hs3a", "pGUEpO579qllF") or die(mysql_error()); 
 mysql_select_db("d8fa082c41a004a98804199d41495603f") or die(mysql_error()); 
 $data = mysql_query("SELECT * FROM  `type-storage` ") 
 or die(mysql_error()); 
 
 Print "<center><table border='0' cellpadding='2' background='images/metal-texture.jpg' id='z'>"; 
  Print "<tr><th>Type</th><th>Storage</th></tr>";
 while($info = mysql_fetch_array( $data )) 
 { 

 Print "<tr>"; 
 Print "<td id='x'>".$info['type'] . "</td> "; 
 Print "<td id='x'>".$info['storage'] . " </td></tr>"; 
 } 
 Print "</table>"; 

?> 