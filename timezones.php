<?php
	session_start();
	if (!isset($_SESSION["user"])) {
		echo "<meta http-equiv='refresh' content='1; URL=login.html'/>";
		die("Требуется логин ! Вы будете перенаправлены на страницу авторизации.");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timezones</title>
    <style>
        body {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        h2 {
            width: 100%;
            text-align: center;
            color: gray;   
            font-family: "Gill Sans", sans-serif;
        }

        
        img {
            height: 400px;
            width: 400px;
            align-items: center;
        }

    </style>
</head>
<body>
    <?php
        date_default_timezone_set("Europe/Kazan");

        $hour = date("H");

        if ($hour < 6) {
            echo("<img src='images/night.png'>");
            echo("<h2>Доброй ночи!</h2>");
        }
        elseif ($hour >= 6 and $hour < 11) {
            echo("<img src='images/morning.png'>");
            echo("<h2>Доброе утро!</h2>");
        }
        elseif ($hour >= 12 and $hour < 19) {
            echo("<img src='images/afternoon.png'>");
            echo("<h2>Добрый день!</h2>");
        }
        elseif ($hour >= 19 and $hour < 24) {
            echo("<img src='images/evening.png'>");
            echo("<h2>Добрый вечер!</h2>");
        }
    ?>
</body>
</html>
