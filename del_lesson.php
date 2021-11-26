<?php
if($_SESSION['login']=='teacher') {
    try {
        $query = $pdo->query('DELETE FROM lesson WHERE id=' . $_GET["lesson"]);
        $err_msg = "Урок успешно удален";
    } catch (PDOException $exception) {
        $err_msg = "Ошибка удаления урока ".$exception->getMessage();
    }
}
else $err_msg = "У вас нет полномочий для выполнения данного действия";