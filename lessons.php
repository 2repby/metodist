
<div class="container">
    <table border="1" class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Дисциплина</th>
            <th scope="col">Преподаватель</th>
            <th scope="col">Группа</th>
            <th scope="col">Начало</th>
            <th scope="col">Окончание</th>
            <th scope="col">Примечание</th>
            <th scope="col">Присуствующие</th>
            <?php if(isset($_SESSION['username'])) echo "<th scope='col'>Действие</th>" ?>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
<?php

$query = $pdo->query('SELECT * FROM users RIGHT JOIN lesson ON users.id = lesson.teacher_id ORDER BY start_at;');

while ($row = $query->fetch())
{
?>

    <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['last_name'].' '.$row['first_name'] ?> </td>
            <td><?php echo $row['student_group'] ?> </td>
            <td><?php echo $row['start_at'] ?> </td>
            <td><?php echo $row['end_at'] ?> </td>
            <td><?php echo $row['comment'] ?> </td>
            <td><a href="/?c=2&lesson=<?php echo $row['id'] ?>">Просмотреть</a></td>
            <td><a href="/?c=1&a=2&lesson=<?php echo $row['id'] ?>">Удалить</a></td>
    </tr>

<?php } ?>
        </tbody>
    </table>






</div>
