<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>HTML5 image crop tool | Script Tutorials</title>
        <!-- <link href="css/main.css" rel="stylesheet" type="text/css" /> -->
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="./scripts/crop.js"></script>
    </head>
    <body>
        <header>
            <h2>HTML5 image crop tool</h2>
            <a href="http://www.script-tutorials.com/html5-image-crop-tool/" class="stuts">Back to original tutorial on <span>Script Tutorials</span></a>
        </header>
		<video id="video" width="640" height="480" autoplay style="display:block;"></video>
		<button id="snap" class="sexyButton">Snap Photo</button>
		<button id="close" onclick="closeWindow()">Close</button>
		<!-- <canvas id="canvas" width="640" height="480"></canvas> -->


        <div class="container">
            <div class="contr">
                <button onclick="getResults()">Crop</button>
            </div>
            <canvas id="panel" width="640" height="480"></canvas>
            <div id="results">
                <h2>Please make selection for cropping and click 'Crop' button.</h2>
                <img id="crop_result" />
            </div>
        </div>


		<script>

			// Put event listeners into place
			window.addEventListener("DOMContentLoaded", function() {
//				debugger;
				// Grab elements, create settings, etc.
				var canvas = document.getElementById("panel"),
					context = canvas.getContext("2d"),
					video = document.getElementById("video"),
					videoObj = { "video": true },
					errBack = function(error) {
						console.log("Video capture error: ", error.code); 
					};

				// Put video listeners into place
				if(navigator.getUserMedia) { // Standard
					navigator.getUserMedia(videoObj, function(stream) {
						video.src = stream;
						video.play();
					}, errBack);
				} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
					navigator.webkitGetUserMedia(videoObj, function(stream){
						video.src = window.webkitURL.createObjectURL(stream);
						video.play();
					}, errBack);
				} else if(navigator.mozGetUserMedia) { // WebKit-prefixed
					navigator.mozGetUserMedia(videoObj, function(stream){
						video.src = window.URL.createObjectURL(stream);
						video.play();
					}, errBack);
				}

				// Trigger photo take
				document.getElementById("snap").addEventListener("click", function() {
					context.drawImage(video, 0, 0, 640, 480);
					// video.stop();
					document.getElementById("video").style.display='none';
					// var canvas = document.getElementById("guestPhoto");
					// window.opener.myImage = canvas.toDataURL("image/png"); //.replace("image/png", "image/octet-stream");
					// var imageElement = window.opener.document.getElementById("guestPhotoImage");  
					// imageElement.src = window.opener.myImage; 						
				});
			}, false);

		</script>

    </body>
</html>