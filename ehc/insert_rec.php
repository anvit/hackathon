<?php
$con = mysql_connect("us01-user01.crtks9njytxu.us-east-1.rds.amazonaws.com", "uv1f3ldE1Hs3a", "pGUEpO579qllF") or die(mysql_error()); 
 mysql_select_db("d8fa082c41a004a98804199d41495603f", $con ) or die(mysql_error()); 
 $query = "INSERT INTO `transaction` (
`tid` ,
`source` ,
`qty` ,
`type` ,
`boxid` ,
`expiry` ,
`depositdate`
)
VALUES (
NULL ,  '$_POST[source]',  '$_POST[qty]',  '$_POST[type]',  '$_POST[box_id]',  '$_POST[expiry]',  '$_POST[deposit]'
)" ;
$query2= "INSERT INTO `boxwh` (
`boxid` ,
`warehouse` 
)
VALUES ( '$_POST[box_id]',  '$_POST[warehouse]' )" ;
 mysql_query($query);
 mysql_query($query2);

mysql_close($con);

header('Location:  index.php');
exit();

?>