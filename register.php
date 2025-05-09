<?php
session_start();
$user = $_REQUEST["user"];
$pwd = $_REQUEST["pwd"];
$pwd_confirm = $_REQUEST["pwd_confirm"];


if ($pwd !== $pwd_confirm) {
    echo("Пароли не совпадают!");
    echo('<meta http-equiv="refresh" content="3; URL=login.html" >');
    exit();
}

$hash = hash('sha256', $pwd);
$sql = "INSERT INTO logins (UserName, PwdHash) VALUES ('$user', '$hash')";

$conn = mysqli_connect("localhost", "root", "", "calc");
if (mysqli_query($conn, $sql)) {
    echo("Регистрация успешна! Теперь Вы можете войти.");
    echo('<meta http-equiv="refresh" content="3; URL=login.html" >');
} else {
    echo("Ошибка регистрации: " . mysqli_error($conn));
    echo('<meta http-equiv="refresh" content="3; URL=login.html" >');
}
mysqli_close($conn);
?>