<?php
    session_start();
    if (!isset($_SESSION["user"])) {
    echo('<meta http-equiv="refresh" content="3; URL=login.html">');
        die("You need login to open this page! Вы будете перенеправлены");
  }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Calc</title>
    <style>
      input {
        /* it is css comment */
        width: 160px;
        margin: 2px;
        text-align: center;
      }

      button {
        width: 70px;
        background-color: darkgrey;
      }

      .calculator {
        border: solid black thin;
        width: 180px;
        padding: 10px;
        text-align: center;
        background-color: burlywood;
      }

      .pressed {
        background-color: #FFFF55;
      }

      img {
        height: 200px;
      }
    </style>

    <script>
      function plus() {
        var url = "api/calc_service.php?txtX=" 
              + document.getElementById("txtX").value 
              + "&txtY= "
              + document.getElementById("txtY").value
              + "&plus=true";

        var xhr = new XMLHttpRequest();
        xhr.open("GET", url);
        xhr.onload = function() {
          var result = xhr.responseText;
          //alert(result);
          document.getElementById("txtZ").value = result;
        }
        document.getElementById("txtZ").value = "WAIT...";
        xhr.send();
        
      }

      function minus() {
                var url = "api/calc_service.php?txtX=" 
                          + document.getElementById("txtX").value 
                          + "&txtY="
                          + document.getElementById("txtY").value
                          + "&plus=false";

                var xhr = new XMLHttpRequest();
                xhr.open("GET", url);
                xhr.onload = function() {
                    var result = xhr.responseText;
                    //alert(result);
                    document.getElementById("txtZ").value = result;
                }
                document.getElementById("txtZ").value = "WAIT...";
                xhr.send();  
            }
    </script>
  
  </head>
  <body>
    <!-- It is comment -->
    <h1>Калькулятор with AJAX</h1>
    <div>Our unique calculator. Try it!</div>
    
    <div class="calculator">
        <input id="txtX" autocomplete="off" /> <br />
        <input id="txtY" autocomplete="off"/> <br />
        <div class="buttons">
          <button id="plus" onclick="plus();">+</button>
          <button id="minus">-</button>
        </div>
        <input id="txtZ" />
    </div>

    <textarea>
      
    </textarea>
  </body>
  
</html>