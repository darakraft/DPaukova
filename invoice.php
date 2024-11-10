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
		<title>Ваши вычисления</title>
		<style>
			body {
				text-align: center;
				align-items: center;
				margin-left: auto;
				margin-right: auto;
			}

            table {
                text-align: center;
                align-items: center;
                margin-left: auto;
				margin-right: auto;
            }

            td {
            border: thin solid gray;
            padding: 5px;
            text-align: center;
            align-items: center;
            }
		</style>
    </head>
		<body>
			<h1>Cчет за ваши вычисления</h1>
            <table>
                <tr>
                    <th>Время</th>
                    <th>Операция</th>
                    <th>X</th>
                    <th>Y</th>
                    <th>Результат</th>
                </tr>
            <?php
                $user = $_SESSION["user"];
                $sql1 = "SELECT count(CalcId) FROM calcs WHERE UserName = '$user'";

                $sql = "SELECT * FROM calcs WHERE UserName = '$user' ORDER BY Timestamp desc";
            	// Нарушение приципа наименьших привилегий (root)
				// Слабый пароль
				// Секрет в коде
                // И уязвимость SQL injection
				$conn = mysqli_connect("localhost", "root", "", "calc");
				$result1 = mysqli_query($conn, $sql1);
                $result = mysqli_query($conn, $sql);
                $sum_calcs = mysqli_fetch_row($result1);
                echo("Вы выполнили $sum_calcs[0] вычислений");
                $calcs = mysqli_fetch_all($result);
                for($i = 0; $i < count($calcs); $i++) { 
                    $calc = $calcs[$i];
                    echo("
                    <tr>
                        <td>$calc[2]</td> 
                        <td>$calc[3]</td>
                        <td>$calc[4]</td> 
                        <td>$calc[5]</td>  
                        <td>$calc[6]</td>  
                    </tr>");
                } 
				mysqli_close($conn);
            ?>
            </table>
		</body>
</html>