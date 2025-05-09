<?php
    session_start();
    unset($_SESSION["user"]);
    echo('<meta http-equiv="refresh" content="1; URL=home_.html">');
    die("Вы успешно вышли из системы. 
        Через насколько секунд вы будете перенапраавлены
        на домашнюю страницу нашего сайта");
