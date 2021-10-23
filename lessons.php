<div class="container">
    <table border="1" class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Дисциплина</th>
            <th scope="col">Преподаватель</th>
            <th scope="col">Начало</th>
            <th scope="col">Окончание</th>
            <?php if(isset($_SESSION['username'])) echo "<th scope='col'>Действие</th>" ?>
        </tr>
        </thead>
        <tbody>
<?php
$query = $pdo->query('SELECT * FROM lesson');
while ($row = $query->fetch())
{
?>

    <tr>
            <th scope='row'><?php echo $row['id'] ?></th>
            <td><?php echo $row['name'] ?></td>
            <td><?php echo $row['teacher_id'] ?> </td>
            <td><?php echo  $row['start_at'] ?> </td>
            <td><?php echo  $row['end_at'] ?> </td>

        </tr>

<?php } ?>
        </tbody>
    </table>





</div>
