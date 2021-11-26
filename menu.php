<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="index.php">Методист СурГУ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown show">
                <a class="nav-link dropdown-toggle" href="?c=1" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Уроки</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="index.php?&c=1">Уроки</a>
                    <a class="dropdown-item" href="index.php?&c=3">Добавить урок</a>
                </div>
            </li>




        </ul>
<?php
if(isset($_SESSION['login']))
{
    echo '<a class="nav-link disabled" href="#">Привет, '.$_SESSION['login'].'!';
    echo '<form class="form-inline my-2 my-lg-0">';
    echo '<a class="btn btn-outline-success my-2 my-sm-0 href="index.php?logout=1">Выйти</a>';
    echo '</form>';
}
else
{
    echo '<form class="form-inline my-2 my-lg-0" method="post" action="index.php">';
    echo '<input class="form-control mr-sm-2" type="text" placeholder="Логин" name="login">';
    echo '<input class="form-control mr-sm-2" type="password" placeholder="Пароль" name="password">';
    echo '<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Войти</button>';
    echo '<a class="btn btn-outline-success my-2 my-sm-0" type="submit" href="'.$vk_auth_url.'">Войти через ВК</a>';

    echo '</form>';
}

?>

    </div>
</nav>

