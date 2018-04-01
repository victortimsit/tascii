<?php 
if(!empty($_POST)) {

    !empty($_POST['project_title']) ? $title = $_POST['project_title'] : $dashboardErrors['project_name'] = 'addProject__error--active';
    // NE PEUT PAS ÊTRE VIDE ICI CAR DES VALEURS SONT CHECKÉS PAR DÉFAUT
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

