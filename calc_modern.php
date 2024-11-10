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
    <title>Калькулятор</title>
    <style>
        body {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #f3f4f5, #dfe6e9);
            font-family: Arial, sans-serif;
        }

        .calculator {
            border: 2px solid #0984e3;
            border-radius: 10px;
            width: 220px;
            padding: 20px;
            text-align: center;
            background-color: #dff9fb;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }
        
        .calculator:hover {
            transform: scale(1.05);
        }

        input {
            width: 180px;
            margin: 5px;
            padding: 8px;
            text-align: center;
            border-radius: 5px;
            border: 1px solid #b2bec3;
            font-size: 16px;
            outline: none;
            transition: box-shadow 0.3s;
        }
        
        input:focus {
            box-shadow: 0 0 5px #0984e3;
        }

        button {
            border: none;
            border-radius: 5px;
            width: 50px;
            margin: 5px;
            padding: 10px;
            background: #00cec9;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #0984e3;
        }

        button:active {
            background-color: #74b9ff;
            transform: scale(0.95);
        }

        #txtZ {
            font-size: 18px;
            color: #2d3436;
            background: #dfe6e9;
            border: none;
            width: 180px;
            padding: 10px;
            margin-top: 10px;
            transition: opacity 0.5s ease;
            border-radius: 5px;
        }

        #txtZ.animated {
            opacity: 1;
        }
    </style>
    <script>
        function animateResult() {
            var resultField = document.getElementById("txtZ");
            resultField.classList.remove("animated");
            setTimeout(() => resultField.classList.add("animated"), 10);
        }

        function calculate(operation) {
            var url = "api/calc_service.php?" + operation +
                      "&txtX=" + document.getElementById("txtX").value +
                      "&txtY=" + document.getElementById("txtY").value;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", url);
            xhr.onload = function() {
                var result = xhr.responseText;
                document.getElementById("txtZ").value = result;
                animateResult();
            };
            document.getElementById("txtZ").value = "Подождите...";
            xhr.send();
        }
    </script>
</head>
<body>
    <h1>Калькулятор на AJAX</h1>
    <div class="calculator">
        <input id="txtX" autocomplete="off" placeholder="Введите число X" /> <br />
        <input id="txtY" autocomplete="off" placeholder="Введите число Y" /> <br />
        <div class="buttons">
            <button onclick="calculate('plus')">+</button>
            <button onclick="calculate('minus')">-</button>
            <button onclick="calculate('multiply')">x</button>
        </div>
        <input id="txtZ" placeholder="Результат" readonly />
    </div>
</body>
</html>