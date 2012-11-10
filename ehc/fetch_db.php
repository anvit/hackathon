<?php 
 // Connects to your Database 
 mysql_connect("us01-user01.crtks9njytxu.us-east-1.rds.amazonaws.com", "uv1f3ldE1Hs3a", "pGUEpO579qllF") or die(mysql_error()); 
 mysql_select_db("d8fa082c41a004a98804199d41495603f") or die(mysql_error()); 
 $data = mysql_query("SELECT * FROM edata") 
 or die(mysql_error()); 
 $disp = "[ " ;
 Print "<table border cellpadding=3>"; 
 while($info = mysql_fetch_array( $data )) 
 { 
 $disp = $disp . "['" . $info['eval'] . "'," . $info['enum'] . "],";
 Print "<tr>"; 
 Print "<th>Key:</th> <td>".$info['ekey'] . "</td> "; 
 Print "<th>Value:</th> <td>".$info['eval'] . "</td> "; 
 Print "<th>Data:</th> <td>".$info['enum'] . " </td></tr>"; 
 } 
 Print "</table>"; 
 $disp = substr($disp,0,-1) . "]" ;
 echo $disp ;
?> 
