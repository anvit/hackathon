<?php 
 // Connects to your Database 
 mysql_connect("us01-user01.crtks9njytxu.us-east-1.rds.amazonaws.com", "uv1f3ldE1Hs3a", "pGUEpO579qllF") or die(mysql_error()); 
 mysql_select_db("d8fa082c41a004a98804199d41495603f") or die(mysql_error()); 
 $data = mysql_query("SELECT tt.`type` typ, SUM(  `qty` ) quantity
FROM  `transaction` tt, boxwh bw
WHERE tt.boxid = bw.boxid
GROUP BY tt.type, warehouse") 
 or die(mysql_error()); 

 while($row = mysql_fetch_array( $data )) 
 { 
  echo $row['quantity']. "\n";
 } 

?> 