<?php
if(!empty($_GET['action']) && $_GET['action']=='delete' && !empty($_GET['id']))
{
    
    $prepare = $pdo->prepare('DELETE FROM tasks WHERE id = :id');
    
    $prepare->bindValue(':id', $_GET['id']);
    // $prepare->bindValue(':done', 'done');

    $prepare->execute();

    header('Location: ./');
} 