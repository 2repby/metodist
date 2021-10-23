<?php
    require __DIR__ . '/vendor/autoload.php';
    require 'dbconnect.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Методист СурГУ</title>
</head>
<body>
<h1>Занятия</h1>
<?php
    require 'lessons.php';
?>
</body>
</html>