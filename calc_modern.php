<?php
    session_start();
    if (!isset($_SESSION["user"])) {
		echo("<meta http-equiv='refresh' content='1; URL=login.html'>");
        die("Требуется логин ! Вы будете перенаправлены на страницу авторизации.");
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Калькулятор</title>
		<style>
			input {
				/* it is css comment */
				width: 160px;
				margin: 2px;
				text-align: center;
			}

			button {
				border: solid black thin;
				border-radius: 3%;
				width: 75px;
				margin: 2px;
				background: #dbdada;
				color: black;
			}

			body {
				text-align: center;
				align-items: center;
				margin-left: auto;
				margin-right: auto;
			}

			.calculator {
				border: solid black thin;
				border-radius: 3%;
				width: 210px;
				padding: 10px;
				text-align: center;
				align-items: center;
				background-color: rgb(211, 255, 255);
				margin-left: auto;
				margin-right: auto;
			}

			.pressed {
				background-color: #FFFF55;
			}

			img {
				height: 200px;
			}
		</style>
	<script>
		function plus() {
			var url = "api/calc_service.php?plus" + "&txtX="
						+ document.getElementById("txtX").value 
						+ "&txtY="
						+ document.getElementById("txtY").value;

			var xhr = new XMLHttpRequest();
			xhr.open("GET", url);
			xhr.onload = function() {
				var result = xhr.responseText;
				document.getElementById("txtZ").value = result;
			}
			document.getElementById("txtZ").value = "Подождите...";
			xhr.send();
			
		}

		function minus() {
			var url = "api/calc_service.php?minus" + "&txtX="
						+ document.getElementById("txtX").value 
						+ "&txtY= "
						+ document.getElementById("txtY").value;

			var xhr = new XMLHttpRequest();
			xhr.open("GET", url);
			xhr.onload = function() {
				var result = xhr.responseText;
				document.getElementById("txtZ").value = result;
			}
			document.getElementById("txtZ").value = "Подождите...";
			xhr.send();
			
		}

		function multiply() {
			var url = "api/calc_service.php?multiply" + "&txtX="
						+ document.getElementById("txtX").value 
						+ "&txtY= "
						+ document.getElementById("txtY").value;

			var xhr = new XMLHttpRequest();
			xhr.open("GET", url);
			xhr.onload = function() {
				var result = xhr.responseText;
				document.getElementById("txtZ").value = result;
			}
			document.getElementById("txtZ").value = "Подождите...";
			xhr.send();
			
		}

	</script>
	</head>
		<body>
			<h1>Калькулятор на AJAX</h1>
			<div class="calculator">
					<input id="txtX" autocomplete="off"/> <br />
					<input id="txtY" autocomplete="off"/> <br />
					<div class="buttons">
						<button id="plus" onclick="plus()">+</button>
						<button id="minus" onclick="minus()">-</button>
						<button id="multiply" onclick="multiply()">x</button>
					</div>
					<input id="txtZ"/>
			</div>
		</body>
</html>