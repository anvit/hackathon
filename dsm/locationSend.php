<?php
 mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("app") or die(mysql_error()); 
 $data = mysql_query("SELECT location from navigate ");
 $data2 = mysql_query("SELECT destination from navigate "); 


?>

<html>
	<head>
	
		<script type="text/javascript" src="WCGapi.js"></script>
		<script type="text/javascript">
			window.onload = function() {
				
				
				var url = "http://10.97.33.50:38080/HaikuServlet/rest/v2/";
				var turn = "STUN 10.97.33.50:4242";
				var login = document.getElementById("login");
				var password = document.getElementById("password");
				var register = document.getElementById("register");
				var unregister = document.getElementById("unregister");


				var recipient = "sip:16509992360@vims1.com";
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
					service = new MediaServices(url.value, login.value, password.value, "audio");
					service.turnConfig = turn.value;
					service.onclose = serviceOnClose;
					service.onerror = serviceOnError;
					service.oninvite = serviceOnInvite;
					service.onready = serviceOnReady;
					service.onstatechange = serviceOnStateChange;
					usernamechat = login.value;
					usernamechat2 = login.value;
					
					
				};
				
			
				unregister.onclick = function() {
					service.unregister();
					boxRegister.style.visibility = "hidden";
				};
				
				/************************************************************************
				 * Call																	*
				 ***********************************************************************/
				
				// Create a call and ring the other person
				ring.onclick = function() 
				{
					
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
					console.log("[Call] State changed: " + call.state);
				};
		
			};
		</script>
		<script type="text/javascript">
		function formSubmit() {
			var sip_id = document.getElementById("login");
			var hidden_sip = document.getElementById("sip_id");
			hidden_sip.value = sip_id.value;
			document.getElementById("frm1").submit();
		}
		</script>
	</head>
	
	<body style="background-color:#E0EDFC">
		
	
		<div id="MainContainer">
			<!-- Media services -->
			<div id="registering" style="background-color:#E9FA7A">
				<div>
					<H1>Register and Unregister</H1>
				</div>
				
				
				SIP login: <input id="login" type="text" value="sip:165099923xx@vims1.com" />
				SIP password: <input id="password" type="text" value="" />
				<button id="register">Login</button>
				<label id="boxRegister" style="visibility: hidden; background-color:#E9FA7A">Registered Success!</label>
			
			<div>
				<H1>Unregister</H1>
			</div>
				<button id="unregister">Logout</button><br /><br />
				<div id="boxUnregister" style="visibility: hidden; background-color:#E9FA7A">Unregistration Successful! All fields refreshed...</div>

			</div> 
			
			
			
			<!-- Call -->
			<div id="call" style="background-color:#FC8E7F">
				<div>
					<H1>Voice or Video Call</H1>
				</div>
				<head>
	                <title>Info</title>
                </head>
            <body>
	            <form id = "frm1" action="locationServer.php" method="POST" target="ifr">
		          Location: 
		         <select id="location" name="location">
		         	
		         	<?php
		         	while($row = mysql_fetch_array( $data ) ) 
 					{ 
  						echo "<option value=\"$row[location]\">$row[location]</option>";
  					}
 					?>
		 		
		         </select>
		         <br>
		          Destination: 
		         <select id="destination" name="destination">
		         	
		         	<?php
		         	while($row2 = mysql_fetch_array( $data2 ) ) 
 					{ 
  						echo "<option value=\"$row2[destination]\">$row2[destination]</option>";
  					}
 					?>
		         	
		         <input type="hidden" id = "sip_id" name="sip_id"   />
		         <input type="button" onclick="formSubmit()" value="Submit">
		         
		       
	           </form>
            	<iframe src="about:blank" name = "ifr" id= "ifr"></iframe>
            
                <button id="ring" style="visibility: hidden;">Create call & Ring</button><br /><br />
				<div id="boxCallReceived" style="visibility: hidden; background-color:#FC8E7F">Call Received!</div>
				<div id="boxCallSent" style="visibility: hidden; background-color:#FC8E7F">Submitted !</div>
				<button id="acceptCall">Accept call</button>
				<button id="endCall">End/Reject call</button><br />
				
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





