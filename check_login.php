<?php
    session_start();
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = hash('sha256', $pwd);

    $sql = "SELECT * FROM logins
            WHERE UserName = '$user'
            AND PwdHash = '$hash' ";

    $conn = mysqli_connect("localhost", "root", "", "calc");
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        echo("<h1>Привет, $user!</h1>");
        // Выписываем жетон безопасности
        $_SESSION["user"] = $user;
        // Отправляем пользователя на целевой ресурс
        echo "<meta http-equiv='refresh' content='1; URL=calc_classic.php'/>";
    }
    else {
        echo("<h1>Неверный вход!</h1>");
        echo('<meta http-equiv="refresh" content="1; URL=login.html" >');
    }
    
    mysqli_close($conn);
?>  
