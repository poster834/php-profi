<?php
http_response_code($code);
echo "Объект не найден в базе данных. <br>Ответ сервера:<br>";
var_dump($error);