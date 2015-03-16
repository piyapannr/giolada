
var handleUpload = function(event){
	event.preventDefault();
	event.stopPropagation();

	var fileInput=document.getElementById('files');

	var data = new FormData();

	data.append('ajax', true);

	for(var i=0; i<fileInput.files.length; i++){
		data.append('files[]', fileInput.files[i]);
	}

	var request = new XMLHttpRequest();

	request.upload.addEventListener('progress', function(event){
		if(event.lengthComputable){
			var percent = event.loaded / event.total;
			var progress = document.getElementById('upload_progress');
			while(progress.hasChildNodes()){
				progress.removeChild(progress.firstChild);
			}

			progress.appendChild(document.createTextNode(Math.round(percent*100)+'%'));

		}
	});

	request.upload.addEventListener('load', function(event){
		document.getElementById('upload_progress').style.display='none';
	});

	request.upload.addEventListener('error', function(event){
		alert('Upload failed.');
	});

	request.addEventListener('readystatechange', function(event) {
		if(this.readyState == 4){
			if(this.status == 200){
				var links = document.getElementById('uploaded');

				console.log(this.response);
			}else{
				console.log('Server replied with HTTP status '+this.status);
			}
		}
	});

	request.open('POST', 'upload.php');
	request.setRequestHeader('Cache-Control', 'no-cache');

	document.getElementById('upload_progress').style.display='block';

	request.send(data);
}

window.addEventListener('load', function(event){
	var submit = document.getElementById('submit');
	submit.addEventListener('click', handleUpload);
});