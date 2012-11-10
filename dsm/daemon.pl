#!/usr/bin/perl


$processingLock = "false";


sub modify_file($) {
	$linevar = shift;
	($location,$destination,$sip_id) = split('\|', $linevar);
	
	print $location . "\n";
	print $destination . "\n";
	print $sip_id . "\n";
	
	
	$wh = open (webpage,"<cuscall.php");
	@webContents = <webpage>;
	close($wh);
	#print @webContents;
	$webContents[8] = '$location = ' . "\"$location\";\n";
	$webContents[9] = '$destination = ' . "\"$destination\";\n";
	$webContents[54] = "var recipient = \"$sip_id\";\n";
	
	$wh = open (webpage,">cuscall.php");
	print webpage @webContents;
	close($wh);
	system ('C:\Leif2_Win32_Release_2012-10-02_2\Leif2_Win32_Release_2012-10-02_2\chrome.exe "http://172.22.4.214:8081/dsm/cuscall.php"');
	sleep 10;
	$processingLock = "false";
}



while(1) {

		$fh = open(file, "<queue.txt");
		@contents = <file>;
		print @contents;
		if  ( $processingLock == "false" ) {
			
			$request = pop(@contents);
			chomp($request);
			if ( $request ne "") {
				$processingLock = "true";
				#execute_browser($request);
				modify_file($request);
			}
		}
		close($fh);
		$fh = open(file, ">queue.txt");
		print file @contents;
		close($fh);
		print "deamon is alive \n";
		sleep 4;
	
}



