var canvas = document.getElementById('canvasPhotoBase');
var context = canvas.getContext('2d');
var video = document.getElementById('video');
var mediaConfig =  { video: true };
var inputBase = document.getElementById('inputBase');
var errBack = function(e) {
	console.log('Une erreur est survenue: ', e)
};

// Listeners
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	navigator.mediaDevices.getUserMedia(mediaConfig).then(function(stream) {
		video.src = window.URL.createObjectURL(stream);
		video.play();
	});
}

else if(navigator.getUserMedia) { // Standard
	navigator.getUserMedia(mediaConfig, function(stream) {
		video.src = stream;
		video.play();
	}, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla
	navigator.mozGetUserMedia(mediaConfig, function(stream){
		video.src = window.URL.createObjectURL(stream);
		video.play();
	}, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit
	navigator.webkitGetUserMedia(mediaConfig, function(stream){
		video.src = window.URL.createObjectURL(stream);
		video.play();
	}, errBack);
}

video.addEventListener('dblclick', function() {
	if (video.requestFullscreen) {
	  video.requestFullscreen();
	} else if (video.mozRequestFullScreen) {
	  video.mozRequestFullScreen();
	} else if (video.webkitRequestFullScreen) {
	  video.webkitRequestFullScreen();
	}
	console.log(video.style.width);
});

function take_pics() {
	context.drawImage(video, 0, 0, 640, 480);
	var URI = canvas.toDataURL();
	inputBase.value = URI;
}

document.addEventListener('keydown', function(e) {
	if (e.which == 13)
		take_pics();
});


document.getElementById('snap').addEventListener('click', take_pics);
document.getElementById('pause').addEventListener('click', function(){ video.pause(); });
document.getElementById('play').addEventListener('click',  function(){ video.play(); });