<?php


    $host = $_ENV['host'];
    $db   = $_ENV['database'];
    $user = $_ENV['user'];
    $pass = $_ENV['password'];
    $port = $_ENV['port'];

    $timezone = $_ENV['timezone'];


    $dsn = 'pgsql:host='.$host.';port='.$port.';dbname='.$db;

    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

