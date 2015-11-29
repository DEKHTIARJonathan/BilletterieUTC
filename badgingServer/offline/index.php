<html>
<head>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <script src="scripts/jquery-1.9.1.min.js"  ></script>
	<style>
	.result{
		height:300px;
		font-size: 300%;
	}
	
	</style>
</head>
<body>
<div class="container">
	<center><h1>Offline Server</h1></center>
<div class="row" style="margin-top:100px;" id="row" >
		<div class="span5 result" style="background-color:grey;" id="square"></div>
		<div class="span7 result"><center style="margin-top:130px" id="comment" >Attend un badge</center></div>
	</div>
</div>

<script src="bootstrap/js/bootstrap-modal.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

<script>
// Connect to the server
var websocket = new WebSocket('ws://127.0.0.1:8889/badge');

delay = 1500;

setTimeout(function(){
	if (websocket.readyState != 1){
		console.log(websocket.readyState)
		$('#row').html('<center><h2>Serveur Python Non Connecté</h2></center>');
	}
}, delay);


// Implement a response to the server
websocket.onmessage = function (event) {
	if (event.data == "048E0C828D3684"){
		$('#square').css('background-color', 'green');
		$('#comment').html('Accès Autorisé');
	}
	else{
		$('#square').css('background-color', 'red');
		$('#comment').html('Accès Refusé');
	}
	
	setTimeout(function(){
		$('#square').css('background-color', 'grey');
		$('#comment').html('Attend un badge');
	}, delay); 
};
</script>

</body>

</html>
