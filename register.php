<?php
session_start(); // Для будущих сессий, если нужно

// Получение данных из формы
$user = trim($_REQUEST["user"]);
$pwd = trim($_REQUEST["pwd"]);

// Проверка на пустые значения
if (empty($user) || empty($pwd)) {
    echo "<h1>Имя пользователя и пароль обязательны!</h1>";
    echo '<meta http-equiv="refresh" content="2; URL=register.html">';
    exit();
}

// Хэширование пароля
$hash = hash('sha256', $pwd); // Используем sha256, как указано

// Подключение к базе данных
$conn = mysqli_connect("localhost", "root", "", "calc");
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Проверка, существует ли пользователь с таким именем
$sql_check = "SELECT * FROM logins WHERE UserName = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "s", $user);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($result_check) > 0) {
    echo "<h1>Имя пользователя уже занято!</h1>";
    echo '<meta http-equiv="refresh" content="2; URL=register.html">';
    mysqli_close($conn);
    exit();
}

// Вставка нового пользователя
$sql_insert = "INSERT INTO logins (UserName, PwdHash) VALUES (?, ?)";
$stmt_insert = mysqli_prepare($conn, $sql_insert);
mysqli_stmt_bind_param($stmt_insert, "ss", $user, $hash);

if (mysqli_stmt_execute($stmt_insert)) {
    echo "<h1>Регистрация прошла успешно, $user!</h1>";
    echo '<meta http-equiv="refresh" content="2; URL=login.html">';
} else {
    echo "<h1>Ошибка при регистрации!</h1>";
    echo '<meta http-equiv="refresh" content="2; URL=register.html">';
}

// Закрытие соединения
mysqli_close($conn);
?>
