<?php

if($_SESSION['teacher']==1) {
    try {
        $sql = 'INSERT INTO lesson(name,teacher_id,keyword,start_at,end_at,student_group,comment) VALUES(:name,:teacher,:keyword,:start_at,:end_at,:student_group,:comment)';
        $stmt = $pdo->prepare($sql);

        // pass values to the statement
        $stmt->bindValue(':name', $_GET['name']);
        $stmt->bindValue(':teacher', $_GET['teacher']);
        $stmt->bindValue(':keyword', $_GET['keyword']);
        $stmt->bindValue(':start_at', $_GET['start_at']." +05:00");
        $stmt->bindValue(':end_at', $_GET['end_at']." +05:00");
        $stmt->bindValue(':student_group', $_GET['student_group']);
        $stmt->bindValue(':comment', $_GET['comment']);
        // execute the insert statement
        $stmt->execute();
        $err_msg = "Урок успешно добавлен";
        // return generated id
        // $id = $pdo->lastInsertId('id');


    } catch (PDOexception $error) {
        $err_msg = "Ошибка: " . $error->getMessage();
    }
}