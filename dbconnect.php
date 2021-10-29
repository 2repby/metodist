<?php
    use Dotenv\Dotenv;
    if (file_exists(__DIR__."/.env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }


    $host = $_ENV['host'];
    $db   = $_ENV['database'];
    $user = $_ENV['user'];
    $pass = $_ENV['password'];
    $port = $_ENV['port'];


    $dsn = 'pgsql:host='.$host.';port='.$port.';dbname='.$db;

    $pdo = new PDO($dsn, $user, $pass);

