<?php
    session_start() // страница будет подключена к сессии
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counter</title>
</head>
<body>
    <?php
        if (isset($_SESSION["counter"])) {
        $counter = $_SESSION["counter"]; // Извлечь из сессии
        }
        else {
        $counter = 0;
        }
        $counter += 1;
        echo("вы щелкнули $counter раз(а)");
        $_SESSION["counter"] = $counter; // Запомнить в сессии
    ?>
    <h1>Считаем щелчки при помощи сессий</h1>
    <form> 
        <button>Click me</button>
    </form>
</body>
</html>