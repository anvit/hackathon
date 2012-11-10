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
 $data = mysql_query("SELECT * FROM `type-nutrition` tn, `type-storage` ts, transaction tt, boxwh bw where ts.type=tt.type and tn.type=tt.type and bw.boxid=tt.boxid") 
 or die(mysql_error()); 
 
 Print "<center><table border='0' cellpadding='2' background='images/metal-texture.jpg' id='z'>"; 
 Print "<tr><th>Source</th><th>Quantity</th><th>Type</th><th>Box ID</th><th>Expiry</th><th>Deposit Date</th><th>Calories</th><th>Fat</th><th>Protein</th><th>Carbohydrates</th><th>Warehouse</th><th>Storage</th></tr>";
 while($info = mysql_fetch_array( $data )) 
 { 

 Print "<tr>"; 
 Print "<td id='x'>".$info['source'] . "</td> "; 
 Print "<td id='x'>".$info['qty'] . "</td> "; 
 Print "<td id='x'>".$info['type'] . "</td> ";  
 Print "<td id='x'>".$info['boxid'] . "</td> "; 
 Print "<td id='x'>".$info['expiry'] . "</td> "; 
 Print "<td id='x'>".$info['depositdate'] . "</td> ";  
 Print "<td id='x'>".$info['calorie'] . "</td> "; 
 Print "<td id='x'>".$info['fat'] . "</td> "; 
 Print "<td id='x'>".$info['protein'] . "</td> "; 
 Print "<td id='x'>".$info['carb'] . " </td>";
 Print "<td id='x'>".$info['warehouse'] . " </td>";
 Print "<td id='x'>".$info['storage'] . " </td></tr>"; 
 } 
 Print "</table></center>"; 

?> 
