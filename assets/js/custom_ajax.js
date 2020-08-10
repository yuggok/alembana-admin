 $(document).ready(function () {

 	//Untuk Form Input Tanpa Upload gambar
 	$('#submit').on('click', function () {
 		e.preventDefault();
 		let param = {
 			name: $('[name="nama"]').val(),
 			price: $('[name="price"]').val(),
 			type: $('[name="type"]').val()
 		};

 		var settings = {
 			"url": "https://us-central1-reservation-1b2b0.cloudfunctions.net/api/food/add",
 			"method": "post",
 			"data": param
 		};

 		$.ajax(settings).done(function (response) {
 			console.log(response);
 		});
 	});

 	//Untuk Upload Gambar
 	$('#submit').on('click', function () {
 		e.preventDefault();
 		let data = new FormData();
 		let file = $('[name="image"]')[0].files; //Nama field upload gamabr
 		console.log(file[0]);
 		data.append("file", file[0]);

 		var settings = {
 			"url": "https://us-central1-reservation-1b2b0.cloudfunctions.net/api/food/uploadfile",
 			"method": "post",
 			"processData": false,
 			"mimeType": "multipart/form-data",
 			"contentType": false,
 			"data": data
 		};

 		$.ajax(settings).done(function (response) {
 			console.log(response);
 		});
 	});
 });
