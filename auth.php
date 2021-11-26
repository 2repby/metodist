<?php
    session_start();
    $err_msg = '';


    if (isset($_POST["login"]) and $_POST["login"]!='')
    {

        $query = $pdo->query("SELECT password FROM users WHERE login='" . $_POST["login"] . "'");
        $row=$query->fetch();
        if (is_null($row)) $err_msg = "Неправильное имя пользователя!";
        else {

            if (MD5($_POST["password"])!= $row['password']) $err_msg = "Неправильный пароль!";
            else {
                $_SESSION['login'] = $_POST["login"];
                $err_msg = "Вы успешно вошли в систему";
            }
        }

    }


    if (isset($_GET["logout"]))
    {
        session_unset();
        $err_msg = "Вы успешно вышли из системы";
    }






?>

