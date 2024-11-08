<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счет</title>

    <style>
        td {
            border: thin solid black;
            padding: 3px;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
        if (!isset($_SESSION['username'])) {
            // Перенаправление на страницу логина, если пользователь не залогинен
            header("Location: login.php");
            exit();
        }

        // Получаем имя пользователя из сессии
        $username = $_SESSION['username'];

        // Подключение к базе данных
        $conn = mysqli_connect("localhost", "user", "secure_password", "calc");
        if (!$conn) {
            die("Ошибка подключения: " . mysqli_connect_error());
        }

        // Выполнение SQL-запроса для получения вычислений залогиненного пользователя
        $sql = "SELECT * FROM calcs WHERE UserName = ? ORDER BY Timestamp DESC";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Проверка успешности запроса и получение всех вычислений
        if ($result) {
            $calcs = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $calculationCount = count($calcs); // Подсчет количества выполненных вычислений
        } else {
            $calcs = [];
            $calculationCount = 0;
        }

        mysqli_close($conn);
    ?>

    <h1>Счет за ваши вычисления</h1>
    <p>Вы выполнили <?php echo $calculationCount; ?> вычислений.</p>
    <table>
        <tr>
            <th>Время</th>
            <th>x</th>
            <th>y</th>
            <th>Операция</th>
            <th>Результат</th>
        </tr>
        <?php foreach ($calcs as $calc): ?>
            <tr>
                <td><?php echo htmlspecialchars($calc['Timestamp']); ?></td>
                <td><?php echo htmlspecialchars($calc['x']); ?></td>
                <td><?php echo htmlspecialchars($calc['y']); ?></td>
                <td><?php echo htmlspecialchars($calc['Operation']); ?></td>
                <td><?php echo htmlspecialchars($calc['Result']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>