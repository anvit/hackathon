#!/usr/bin/perl

	$linevar = 'rack3|rack30|sip:16509992361@vims1.com';
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
system ('C:\Leif2_Win32_Release_2012-10-02_2\Leif2_Win32_Release_2012-10-02_2\chrome.exe "http://localhost/dsm/cuscall.php"');