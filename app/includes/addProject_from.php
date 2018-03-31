<?php 

if(!empty($_POST)) {
    !empty($_POST['project_title']) ? $project_title = $_POST['project_title'] : $errors['project_name'] = 'addProject__error--active';
    !empty($_POST['category']) ?$category = $_POST['category'] : $errors['category'] = 'empty';
    !empty($_POST['color']) ? $color = $_POST['color'] : $errors['color'] = 'empty';
}

