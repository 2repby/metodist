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
        </tr>
        </thead>
        <tbody>
<?php

$query = $pdo->query('SELECT * FROM users,lesson WHERE users.id = lesson.teacher_id;');

while ($row = $query->fetch())
{
?>

    <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['last_name'].' '.$row['first_name'] ?> </td>
            <td><?php echo $row['student_group'] ?> </td>
            <td><?php echo  $row['start_at'] ?> </td>
            <td><?php echo  $row['end_at'] ?> </td>
            <td><?php echo  $row['comment'] ?> </td>
            <td>
                <?php
                $query2 = $pdo->query('SELECT * FROM users, visit WHERE users.id = visit.id_user AND visit.id_lesson = '.$row['id'].';');
                while ($row2 = $query2->fetch())
                    echo $row2['last_name'].' '.$row2['first_name'].'<br>';
                ?>
            </td>
    </tr>

<?php } ?>
        </tbody>
    </table>





</div>
