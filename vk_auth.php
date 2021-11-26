<?php

    function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }

    $client_id = '8010108'; // ID приложения
    $client_secret = $_ENV['client_secret']; // Защищённый ключ
    $redirect_uri = $_ENV['redirect_uri']; // Адрес сайта http://metodist/index.php

    $url = 'http://oauth.vk.com/authorize';

    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );

    $vk_auth_url = $url . '?' . urldecode(http_build_query($params));

if (isset($_GET['code'])) {
    $result = false;
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access_token' => $token['access_token'],
            'v'            => '5.131'
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);


        if (isset($userInfo['response'][0]['id'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;

        }

    }
    // Если пользователь от ВК получен

    if ($result) {
        //Аутентифицируем пользователя
        session_start();
        $_SESSION['login'] = $userInfo["screen_name"];
        $query = $pdo->query("SELECT password FROM users WHERE vk_id='" . $userInfo['id'] . "'");
        $row=$query->fetch();

        //Если пользователь найден в таблице
        if ($row){


            //Если у пользователя пустой логин
            if (is_null($row['login'])) {
                $query = $pdo->query("UPDATE users SET login='" . $userInfo["screen_name"] . "' WHERE vk_id =" . $userInfo['id']);


            }
        }
        // Если пользователь не найден в табдице - добавить
        else{

            $err_msg = "Пользователь успешно добавлен в таблицу";
            try {
                $sql = 'INSERT INTO users(first_name,last_name,vk_id,login,password) 
                        VALUES(:first_name,:last_name,:vk_id,:login,:password)';
                $stmt = $pdo->prepare($sql);

                // pass values to the statement
                $stmt->bindValue(':first_name', $userInfo['first_name']);
                $stmt->bindValue(':last_name', $userInfo['last_name']);
                $stmt->bindValue(':vk_id', $userInfo['id']);
                $stmt->bindValue(':login', $userInfo['screen_name']);
                $stmt->bindValue(':password', generatePassword());

                // execute the insert statement
                $stmt->execute();

                // return generated id
                // $id = $pdo->lastInsertId('id');

            }
            catch (PDOexception $error){
                $err_msg = "Ошибка добавления пользователя: ".$error->getMessage();
            }

        }

    }
}
?>