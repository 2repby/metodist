
<form method="get" action="/">
    <input type="hidden" name="c" value="1">
    <input type="hidden" name="a" value="1">
    <label for="name">Дисциплина</label>
    <p><input type="text" name="name"></p>
    <label for="teacher">Преподаватель</label>
    <p><select name="teacher">
        <?php
        $query = $pdo->query('SELECT * FROM users WHERE users.is_teacher = 1');
        while ($row = $query->fetch())

            echo "<option value=".$row['id'].">".$row['last_name'].' '.$row['first_name']."</option>"
        ?>

    </select></p>
    <label for="keyword">Кодовое слово</label>
    <p><input type="text" name="keyword"></p>
    <label for="start_at">Дата и время начала</label>
    <p><input type="datetime-local" name="start_at"></p>
    <label for="end_at">Дата и время конца</label>
    <p><input type="datetime-local" name="end_at"></p>
    <label for="username">Группа</label>
    <p><input type="text" name="student_group"></p>
    <label for="username">Комментарий</label>
    <p><input type="text" name="comment"></p>
    <p><input type="submit" value="Добавить"></p>
</form>