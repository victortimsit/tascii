<?php 
if(!empty($_POST['project_title'])) {

    !empty($_POST['project_title']) ? $title = $_POST['project_title'] : $dashboardErrors['project_name'] = 'addProject__empty--active';
    // NE PEUT PAS ÊTRE VIDE ICI CAR DES VALEURS SONT CHECKÉS PAR DÉFAUT
    !empty($_POST['category']) ? $category = $_POST['category'] : $errors['category'] = 'empty';
    !empty($_POST['color']) ? $color = $_POST['color'] : $errors['color'] = 'empty';
    $user_id = $_SESSION['id'];
    
    if(!empty($_POST['project_title'])) {
        // Values
        $data = ['user_id' => $user_id, 'title' => $title, 'category' => $category, 'color' => $color];
        
        // Prepare request
        $prepare = $pdo->prepare('INSERT INTO projects (user_id, title, category, color) VALUES (:user_id, :title, :category, :color)');
        
        // Execute request
        $exec = $prepare->execute($data);

        header('Location: ./');
    }
}
