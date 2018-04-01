<?php
if(!empty($_GET['action']) && $_GET['action']=='notdone' && !empty($_GET['id']))
{
    
    $prepare = $pdo->prepare('UPDATE tasks SET state = :done WHERE id = :id');
    
    $prepare->bindValue(':id', $_GET['id']);
    $prepare->bindValue(':done', 'done');

    $prepare->execute();

    header('Location: ./');
} 
else if(!empty($_GET['action']) && $_GET['action']=='done' && !empty($_GET['id']))
{
    $prepare = $pdo->prepare('UPDATE tasks SET state = :notdone WHERE id = :id');
    
    $prepare->bindValue(':id', $_GET['id']);
    $prepare->bindValue(':notdone', 'notdone');

    $prepare->execute();

    header('Location: ./');
}