<?php 
if(!empty($_POST['content'])) {

    !empty($_POST['content']) ? $content = $_POST['content'] : $dashboardErrors['task'] = 'addTask__error--active';
    !empty($_POST['project_id']) ? $project_id = $_POST['project_id'] : $dashboardErrors['task'] = 'addTask__error--active';

    $user_id = $_SESSION['id'];
    $state = 'notdone';
    
    if(!empty($_POST['content'])) {
        // Values
        $data = ['user_id' => $user_id, 'project_id' => $project_id, 'content' => $content, 'state' => $state];
        
        // Prepare request
        // $prepare = $pdo->prepare('INSERT INTO tasks (user_id, project_id, content, state) VALUES (:user_id, :project_id, :content, :state) WHERE user_id = :user_id');
        $prepare = $pdo->prepare('INSERT INTO tasks (user_id, project_id, content, state) VALUES (:user_id, :project_id, :content, :state)');
        
        // Execute request
        $exec = $prepare->execute($data);
    }
}


