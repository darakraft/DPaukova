<?php
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];

    $hash = hash('sha256', $pwd);

    $conn = mysqli_connect("localhost", "root", "", "calc");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM `logins` WHERE UserName='$user' and PwdHash='$hash'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Привет, $user!</h1>";
    } else {
        echo "<h1>Неверный вход!</h1>";
    }
    mysqli_close($conn);
?>
