<?php



$query2 = $pdo->query('SELECT * FROM users, visit WHERE users.id = visit.id_user AND visit.id_lesson = '.$_GET['lesson'].';');
while ($row2 = $query2->fetch())
    echo $row2['last_name'].' '.$row2['first_name'].'<br>';
echo " ";
?>