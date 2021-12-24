<?php
    ob_start();
    require __DIR__ . '/vendor/autoload.php';
    use Dotenv\Dotenv;
    if (file_exists(__DIR__."/.env"))
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

    require 'dbconnect.php';
    require 'vk_auth.php';
    require 'auth.php';
    require 'header.php';
    require 'menu.php';


echo "<main role='main' class='container'>";

if ($_GET['c'] == '') $c = 1;
else $c = $_GET['c'];
switch ($c) {
    case "1":
        {

            if(isset($_SESSION['login'])) {
                switch ($_GET["a"]) {
                    case "1":
                        require("add_lesson.php");break;
                    case "2":
                        require("del_lesson.php");break;
                }
            };



            require("lessons.php");
        }break;
    case "2":
        {
            require("lesson.php");

        }break;
    case "3":
        {
            if(isset($_SESSION['login'])) require("lesson_form.php");

        }break;

}
require 'message.php';
echo '</main>';
require 'footer.php';
?>

</body>
</html>