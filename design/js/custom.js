$(document).ready(function(){
	$('.download-button').click(function(){

		var d = $(this).attr("data-id");

		$.ajax({
			url: "/functions/download.php",
            type: "POST",
            data: {d:d},
            dataType: "html",
            success: function(data){
        		
            }
		});
	});
});



var getFile = document.getElementById('upload_file');


document.getElementById('upload_file').onchange = function(){
	try{
		var file = document.getElementById('upload_file').files[0]; 

		var fileSize = 0; 					
				
		if (file.size > 1024 * 1024) {
			fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
		}else {
			fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';
		}

		document.getElementById('file_name').innerHTML = '<br><b>Имя файла:</b> ' + file.name + '<br><b>Размер:</b> ' + fileSize;

	}
	catch(e){
		var file1 = getFile.value;
		file1 = file1.replace(/\\/g, "/").split('/').pop();
		document.getElementById ('file_name').innerHTML = '<b>Имя файла:</b> ' + file1;
	}

	
	document.getElementById('recaptcha').style.display = 'block';
	document.getElementById('send_button').style.display = 'inline-block';
	
}



