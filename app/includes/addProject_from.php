<?php 

if(!empty($_POST)) {
    !empty($_POST['project_title']) ? $title = $_POST['project_title'] : $errors['project_name'] = 'addProject__error--active';
    !empty($_POST['category']) ? $category = $_POST['category'] : $errors['category'] = 'empty';
    !empty($_POST['color']) ? $color = $_POST['color'] : $errors['color'] = 'empty';
    
    if(!empty($_POST['project_title'])) {
        // Values
        $data = ['title' => $title, 'category' => $category, 'color' => $color];
        
        // Prepare request
        $prepare = $pdo->prepare('INSERT INTO projects (title, category, color) VALUES (:title, :category, :color)');
        
        // Execute request
        $exec = $prepare->execute($data);
    }
}
