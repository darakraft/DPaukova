<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <style>
        h3 {
            width: 50%;
            text-align: center;
        }

        .morning {
            color: orange;
        }

        .afternoon {
            color: darkred;
        }

        .evening {
            background-color: blue;
            color: white;
        }

        .night {
            background-color: black;
            color: white;
        }

        .image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>
</head>
<body>
    <h1>Привет от PHP</h1>
    <?php
        $x = 2;
        $y = 2;
        $z = $x + $y;
        echo "$x + $y = $z";

        // Исправление часового пояса
        date_default_timezone_set('Europe/Moscow');

        $now = date("H:i:s");
        echo("<h2>Время открытия страницы: $now</h2>");

        $hour = date("H");

        if ($hour < 6) {
            echo("<h3 class='night'>Доброй ночи!</h3>");
            echo '<img src="images/night.jpg" alt="Ночь" class="image">';
        }

        if ($hour >= 6 and $hour < 12) {
            echo("<h3 class='morning'>Доброе утро!</h3>");
            echo '<img src="images/morning.jpg" alt="Утро" class="image">';
        }

        if ($hour >= 12 and $hour < 19) {
            echo("<h3 class='afternoon'>Добрый день!</h3>");
            echo '<img src="images/afternoon.jpg" alt="День" class="image">';
        }

        if ($hour >= 19) {
            echo("<h3 class='evening'>Добрый вечер!</h3>");
            echo '<img src="images/evening.jpg" alt="Вечер" class="image">';
        }
    ?>
</body>
</html>