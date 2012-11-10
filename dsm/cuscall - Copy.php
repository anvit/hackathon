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

<html>
	<head>
	
		<script type="text/javascript" src="WCGapi.js"></script>
		<script type="text/javascript">
			window.onload = function() {
				
				
				var url = "http://10.97.33.50:38080/HaikuServlet/rest/v2/";
				var turn = "STUN 10.97.33.50:4242";
				var login = "sip:16509992360@vims1.com";
				var password = "EECpa$$w0rd";
				var register = document.getElementById("register");
				var unregister = document.getElementById("unregister");


				var recipient = "sip:16509992361@vims1.com";
				var createCall = document.getElementById("createCall");
				var ring = document.getElementById("ring");
				var endCall = document.getElementById("endCall");
				var acceptCall = document.getElementById("acceptCall");
		
				var localvideo = document.getElementById("selfView");
				var remotevideo = document.getElementById("remoteView");
				var localvideo2 = document.getElementById("selfView2");
				var remotevideo2 = document.getElementById("remoteView2");
				var videoBox = document.getElementById("videoBox");
				var localStream = null;
				var remoteStream = null;
	
				<!-- Events Confirmation Box -->
				var boxRegister = document.getElementById("boxRegister");
				
				var boxCallSent = document.getElementById("boxCallSent");
				var boxCallReceived = document.getElementById("boxCallReceived");
				var boxUnregister = document.getElementById("boxUnregister");
				
				
				var service = null;
				var call = null;
				var usernamechat;
				var usernamechat2;
				
				
				// User login
				register.onclick = function() {
					// Media service
					service = new MediaServices(url.value, login, password, "audio");
					service.turnConfig = turn.value;
					service.onclose = serviceOnClose;
					service.onerror = serviceOnError;
					service.oninvite = serviceOnInvite;
					service.onready = serviceOnReady;
					service.onstatechange = serviceOnStateChange;
					usernamechat = login;
					usernamechat2 = login;
					
					
				};
				
			
				unregister.onclick = function() {
					service.unregister();
					boxRegister.style.visibility = "hidden";
				};
				
				/************************************************************************
				 * Call																	*
				 ***********************************************************************/
				
				// Create a call and ring the other person
				ring.onclick = function() {
					call = service.createCall(recipient, {video:true,audio:true});
					call.onaddstream = callOnAddStream;
					call.onbegin = callOnBegin;
					call.onend = callOnEnd;
					call.onerror = callOnError;
					call.onremovestream = callOnRemoveStream;
					call.onstatechange = callOnStateChange;
					call.ring();
					videoBox.style.display = "block";
					videoBox.style.visibility = "visible";
					boxCallSent.style.visibility = 'visible';
					boxCallSent.style.backgroundColor = '#99FF33';
				};
				
				// End call
				endCall.onclick = function() {
					localStream.stop();
					remoteStream.stop();
					call.end();					
					boxCallSent.style.visibility = 'hidden';
				
				};

				
				/************************************************************************
				 * Service handlers below												*
				 ***********************************************************************/
				
				function serviceOnClose(event) {
					console.log("[MediaServices] Closed");
					boxCallReceived.style.visibility = 'hidden';
					boxCallSent.style.visibility = 'hidden';
					videoBox.style.display = "none";
					boxUnregister.style.visibility = 'visible';
					boxUnregister.style.backgroundColor = '#99FF33';
					boxRegister.style.visibility = 'hidden';
					boxRegister.style.backgroundColor = '#E9FA7A';
					boxCallReceived.style.visibility = 'hidden';
					boxCallReceived.style.backgroundColor = '#FC8E7F';
					boxCallSent.style.visibility = 'hidden';
					boxCallSent.style.backgroundColor = '#FC8E7F';
				};
				
				function serviceOnClose2(event) {
					console.log("[MediaServices] Closed");
					boxCallReceived.style.visibility = 'hidden';
					boxCallSent.style.visibility = 'hidden';
					videoBox.style.display = "none";
					boxUnregister.style.visibility = 'visible';
					boxUnregister.style.backgroundColor = '#99FF33';
					boxCallReceived.style.visibility = 'hidden';
					boxCallReceived.style.backgroundColor = '#FC8E7F';
					boxCallSent.style.visibility = 'hidden';
					boxCallSent.style.backgroundColor = '#FC8E7F';
				};
				
				
				function serviceOnError(event) {
					console.log("[MediaServices] Error: " + event.type + " " + event.reason + " " + event.target);
				};
				
				function serviceOnInvite(event) {
					if (event.call) {
						console.log("[MediaServices] Received call invite");
						boxCallReceived.style.visibility = 'visible';
						boxCallReceived.style.backgroundColor = '#99FF33';
						
						acceptCall.onclick = function() {
							videoBox.style.display = "block";
							call = event.call;
							call.answer();
							call.onaddstream = callOnAddStream;
							call.onbegin = callOnBegin;
							call.onend = callOnEnd;
							call.onerror = callOnError;
							call.onremovestream = callOnRemoveStream;
							call.onstatechange = callOnStateChange;
						};
						
						endCall.onclick = function() {
							event.call.end();
							boxCallReceived.style.visibility = 'hidden';
							videoBox.style.display = "none";
						};
					}
			
				};
				
				function serviceOnReady(event) {
					console.log("[MediaServices] Ready");
					boxRegister.style.visibility = 'visible';
					boxRegister.style.backgroundColor = '#99FF33';
					boxUnregister.style.visibility = 'hidden';
				};
				
				function serviceOnReady2(event) {
					console.log("[MediaServices] Ready");
					boxUnregister.style.visibility = 'hidden';
				};
				
				
				function serviceOnStateChange(event) {
					console.log("[MediaServices] State changed: " + event.type + " " + event.state);
				};
				
				/************************************************************************
				 * Call handlers below													*
				 ***********************************************************************/
				
				function callOnAddStream(event) {
					if (event.call.localStreams) {
						console.log("[Call] Local stream added");
						var url = webkitURL.createObjectURL(event.call.localStreams[0]);
						localvideo.style.opacity = 1;
						localvideo.src = url;
						localStream = event.call.localStreams[0];
					}
					if (event.call.remoteStreams) {
						console.log("[Call] Remote stream added");
						var url = webkitURL.createObjectURL(event.call.remoteStreams[0]);
						remotevideo.style.opacity = 1;
						remotevideo.src = url;
						remoteStream = event.call.remoteStreams[0];
					}
				};
				
				function callOnBegin(event) {
					console.log("[Call] Call has started");
					videoBox.style.display = "block";
					videoBox.style.visibility = "visible";
				};
				
				function callOnEnd(event) {
					console.log("[Call] Call has ended");
					boxCallReceived.style.visibility = 'hidden';
					boxCallSent.style.visibility = 'hidden';
					videoBox.style.display = "none";
				};
				
				function callOnError(event) {
					console.log("[Call] Error: " + event.type + " " + event.reason + " " + event.target);
				};
				
				function callOnRemoveStream(event) {
					console.log("[Call] Stream removed");
					localStream.stop();
					remoteStream.stop(); 
					// Do stuff with event.call.remoteStreams
				};
				
				function callOnStateChange(event) {
					if (call.state == 2) {
						var audio = document.getElementById("directions");
						audio.play();
						setTimeout(closeWindow,audio.duration * 1000 + 1000);
						}
		
					
					console.log("[Call] State changed: " + call.state);
				};
				
				autoStart();
		
			};
		</script>
		<script type="text/javascript">
			function autoStart() {
				var login = document.getElementById("register");
				register.click();
				
				setTimeout(waitformic,5000);
			}
			function waitformic(){
				var ringclick = document.getElementById("ring");
				ringclick.click();
			}
			
			function closeWindow() {
		//	var logout = document.getElementById("unregister");
			//logout.click();	
			alert("hi");
			window.open("closer.htm", '_self');
			}
		//	function logout(){
		//		var logout = document.getElementById("unregister");
			//	logout.click();
		//	}
			
		</script>
	</head>
	
	<body style="background-color:#E0EDFC">
		
	
		<div id="MainContainer">
			<!-- Media services -->
			<div id="registering" style="background-color:#E9FA7A">
				<div>
					<H1>Register and Unregister</H1>
				</div>
				
				
				
				<button id="register" style="visibility: hidden;">"Login</button>
				<label id="boxRegister" style="visibility: hidden; background-color:#E9FA7A">Registered Success!</label>
			
			<div>
				<H1>Unregister</H1>
			</div>
				<button id="unregister"  >Logout</button><br /><br />
				<div id="boxUnregister" style="visibility: hidden; background-color:#E9FA7A">Unregistration Successful! All fields refreshed...</div>

			</div> 
			
			
			
			<!-- Call -->
			<div id="call" style="background-color:#FC8E7F">
				<div>
					<H1>Voice or Video Call</H1>
				</div>
				
				<button id="ring" style="visibility: hidden;">Create call & Ring</button><br /><br />
				<div id="boxCallReceived" style="visibility: hidden; background-color:#FC8E7F">Call Received!</div>
				<div id="boxCallSent" style="visibility: hidden; background-color:#FC8E7F">Calling! (Waiting for answer...)</div>
				<button id="acceptCall" style="visibility: hidden;">Accept call</button>
				<button id="endCall" style="visibility: hidden;" >End/Reject call</button><br />
				<audio id = "directions" controls="controls">
  					<source src="<?php echo $file; ?>" type="audio/mp3" />
  					<source src="<?php echo $file; ?>" type="audio/ogg" />
  	</audio>
				<div id="videoBox" style="background-color:none; display:none;">
				<H3>The video box is below</H3>
				<video id="selfView"
					width="320" height="240" style="opacity: 0;
					-webkit-transition-property: opacity;
					-webkit-transition-duration: 2s;" muted autoplay controls></video>
				<video id="remoteView"
					width="320" height="240" style="opacity: 0;
					-webkit-transition-property: opacity;
					-webkit-transition-duration: 2s;" muted autoplay controls></video>
				</div><br />
			</div>	

		</div>	
	</body>
</html>
