<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		echo "<meta http-equiv='refresh' content='1; URL=login.html'/>";
		die("Требуется логин ! Вы будете перенаправлены на страницу авторизации.");
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Калькулятор</title>
		<style>
			input {
				width: 160px;
				margin: 2px;
			}

			button {
				width: 75px;
				margin: 2px;
				color:#dbdada;

			}
			body {
				text-align: center;
				align-items: center;
				margin-left: auto;
				margin-right: auto;
			}
			.calculator {
				border: solid black;
				border-radius: 3%;
				width: 210px;
				padding: 10px;
				text-align: center;
				align-items: center;
				background-color: rgb(211, 255, 255);
				margin-left: auto;
				margin-right: auto;
			}
		</style>
		<script>
			function plus() {
				var x, y, z;
				x = parseInt(document.getElementById("txtX").value);
				y = parseInt(document.getElementById("txtY").value);
				z = x + y;
				document.getElementById("txtZ").value = z;
				document.getElementById("btn1").style.backgroundColor = 'yellow';
			}

			function minus() {
				var x, y, z;
				x = parseInt(document.getElementById("txtX").value);
				y = parseInt(document.getElementById("txtY").value);
				z = x - y;
				document.getElementById("txtZ").value = z;
				document.getElementById("btn2").style.backgroundColor = 'yellow';
			}
		</script>
	</head>
	<body>
			<!-- It is comment -->
			<h1>Кулькульятор</h1>
		<div class="calculator">
			<input id="txtX"/> <br />
			<input id="txtY"/> <br />
			<button id = "btn1" style="color: green;" onclick="plus();">+</button>
			<button id = "btn2" style="color: red;" onclick="minus();">-</button>
			<input id="txtZ" />
		</div>
	</body>
</html>
