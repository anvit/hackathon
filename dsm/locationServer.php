<?php
	$location = $_POST['location'];
	$destination = $_POST['destination'];
	$file = "queue.txt";
	echo "<br>";
	$sip_id = $_POST['sip_id'];
	$fh = fopen($file, 'a') or die(" cannot open file ");
	fwrite($fh, $location . "|" . $destination . "|" . $sip_id . PHP_EOL) or die("could not process request");
	echo "Your request has been processed.. You will receive a call shortly";
	
?>