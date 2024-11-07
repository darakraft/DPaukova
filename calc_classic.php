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
	
	</head>
	<body>
		<h1>Калькулятор</h1>
		<?php 
			if (isset($_REQUEST["txtX"])) {
				$x = $_REQUEST["txtX"];
				$y = $_REQUEST["txtY"];
				if (isset($_REQUEST["plus"])) {
					$z = $x + $y;
					$operation = "plus";
				}
				elseif (isset($_REQUEST["minus"])) {
					$z = $x - $y;
					$operation = "minus";
				}
				elseif ((isset($_REQUEST["multiply"]))) {
					$z = $x*$y;
					$operation = "multiply";
				}

				$user = $_SESSION["user"];

				//так писать не стоит: уязвимость SQL Injection
				$sql = "
				INSERT INTO calcs(UserName, Operation, Number1, Number2, Result)
				VALUE('$user','$operation', $x, $y, $z)
				";
				
				// Нарушение приципа наименьших привилегий (root)
				// Слабый пароль
				// Секрет в коде
				$conn = mysqli_connect("localhost", "root", "", "calc");
				$result = mysqli_query($conn, $sql);
				mysqli_close($conn);

			} else {
				$x = ""; $y = ""; $z = "";
			}
		?>
		<div class="calculator">
			<form>
				<input name="txtX" value="<?=$x?>" /> <br />
				<input name="txtY" value="<?=$y?>"/> <br />
				<div class="buttons">
					<button name="plus">+</button>
					<button name="minus">-</button>
					<button name="multiply">x</button>
				</div>
				<input name="txtZ" value="<?=$z?>" />
			</form>
		</div>
	</body>
</html>