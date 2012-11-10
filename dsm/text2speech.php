<?php

// Convert Words (text) to Speech (MP3)
// ------------------------------------

// Google Translate API cannot handle strings > 100 characters
  # $words = substr($_GET['words'], 0, 100);

 $location = "rack1";
 $destination = "rack10";
 mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("app") or die(mysql_error()); 
 $data = mysql_query("SELECT instruction from navigate where location = '$location' and destination = '$destination' ");
 while ($row = mysql_fetch_array( $data )) {
 $words = $row['instruction'];
 echo $words; 
 }
  
// Replace the non-alphanumeric characters 
// The spaces in the sentence are replaced with the Plus symbol
   $words = urlencode($words);

// Name of the MP3 file generated using the MD5 hash
   $file  = md5($words);
  
// Save the MP3 file in this folder with the .mp3 extension 
   $file = "audio" . $file . ".ogg";

// If the MP3 file exists, do not create a new request
   if (!file_exists($file)) {
     $mp3 = file_get_contents(
        'http://speechutil.com/convert/ogg?text=' . $words );
     file_put_contents($file, $mp3);
	 
	 
   }
?>

// Embed the MP3 file using the AUDIO tag of HTML5
<audio controls="controls" autoplay="autoplay">
  <source src="<?php echo $file; ?>" type="audio/mp3" />
  <source src="<?php echo $file; ?>" type="audio/ogg" />
</audio>