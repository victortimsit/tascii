<?php
  include 'includes/error.php';
  include 'includes/dataBase_connection.php';
  include 'includes/addProject_from.php';
  include 'includes/register_form.php';

  $query = $pdo->query('SELECT * FROM users ORDER BY id DESC');
  $users = $query->fetchAll();
  
  $query = $pdo->query('SELECT * FROM projects');
  // Éxécution de la requête et récupération des données
  $projects = $query->fetchAll();

?>

<?php 
    if (isset($_SESSION['user'])) { ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale = 1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Page</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
  <!--build:css styles/styles.min.css-->
  <link rel="stylesheet" href="styles/css/base/styles.css" />
  <link rel="stylesheet" href="styles/css/layout/menu.css" />
  <link rel="stylesheet" href="styles/css/layout/container.css" />
  <link rel="stylesheet" href="styles/css/layout/project.css" />
  <link rel="stylesheet" href="styles/css/layout/addProject.css" />
  <link rel="stylesheet" href="styles/css/element/menuElements.css" />
  <link rel="stylesheet" href="styles/css/element/encouragementSentence.css" />
  <link rel="stylesheet" href="styles/css/element/projectElements.css" />
  <link rel="stylesheet" href="styles/css/element/addProjectElements.css" />
  <link rel="stylesheet" href="styles/css/state/menuActive.css" />
  <link rel="stylesheet" href="styles/css/state/projectFullScreen.css" />
  <link rel="stylesheet" href="styles/css/state/addProjectVisible.css" />
  <link rel="stylesheet" href="styles/css/state/projectsColors.css" />
  <link rel="stylesheet" href="styles/css/state/taskDisplay.css" />
  <link rel="stylesheet" href="styles/css/tools/reset.css" />
  <!--endbuild-->
</head>

<body class="body">
      <div class="menu">
    <div class="menu__user">
      <span class="menu__userPicture"></span>
      <span class="menu__userName">Victor</span>
      <span class="menu__signOut">
        <svg class="menu__navigationIcon">
          <use xlink:href="assets/images/materialIcons/signOut.svg#signOut"></use>
        </svg>
      </span>
    </div>
    <ul class="menu__navigation">
      <li class="menu__all menu__element">
        <svg class="menu__navigationIcon menu__all--active">
          <use xlink:href="assets/images/materialIcons/all.svg#all"></use>
        </svg>
        <span class="menu__navigationName">All</span>
        <span class="menu__navigationCount">12</span>
      </li>
      <li class="menu__important menu__element">
        <svg class="menu__navigationIcon menu__important--active">
          <use xlink:href="assets/images/materialIcons/important.svg#important"></use>
        </svg>
        <span class="menu__navigationName">Important</span>
        <span class="menu__navigationCount">12</span>
      </li>
      <li class="menu__work menu__element">
        <svg class="menu__navigationIcon menu__work--active">
          <use xlink:href="assets/images/materialIcons/work.svg#work"></use>
        </svg>
        <span class="menu__navigationName">Work</span>
        <span class="menu__navigationCount">12</span>
      </li>
      <li class="menu__home menu__element">
        <svg class="menu__navigationIcon menu__home--active">
          <use xlink:href="assets/images/materialIcons/home.svg#home"></use>
        </svg>
        <span class="menu__navigationName">Home</span>
        <span class="menu__navigationCount">12</span>
      </li>
      <li class="menu__hobby menu__element">
        <svg class="menu__navigationIcon menu__hobby--active">
          <use xlink:href="assets/images/materialIcons/hobby.svg#hobby"></use>
        </svg>
        <span class="menu__navigationName">Hobby</span>
        <span class="menu__navigationCount">12</span>
      </li>
      <li class="menu__done menu__element">
        <svg class="menu__navigationIcon menu__done--active">
          <use xlink:href="assets/images/materialIcons/done.svg#done"></use>
        </svg>
        <span class="menu__navigationName">Done</span>
        <span class="menu__navigationCount">12</span>
      </li>
    </ul>
    <ul class="menu__addProject">
      <div class="menu__addProject--hover">
        <li class="menu__element menu__addProjectElement">
          <svg class="menu__navigationIcon menu__addProject--active">
            <use xlink:href="assets/images/materialIcons/addProject.svg#addProject"></use>
          </svg>
          <span class="menu__navigationName">Add project</span>
        </li>
      </div>
    </ul>
  </div>
  <div class="container">
    <h1 class="encouragementSentence">Go, at least a little !</h1>
    <div class="projects">
      <?php foreach($projects as $project): ?>
        <div class="project">
          <div class="project__progressBar project__color--<?= $project->color ?>">
            <div class="project__progressBar--active"></div>
          </div>
          <div class="project__header">
            <svg class="project__icon project__icon--<?= $project->color ?>">
              <use xlink:href="assets/images/materialIcons/<?= $project->category ?>.svg#<?= $project->category ?>"></use>
            </svg>
            <h2 class="project__title"><?= $project->title ?></h2>
            <img class="project__fullScreen project__fullScreen--active" src="assets/images/materialIcons/fullScreen.svg" alt="full screen icon">
            <img class="project__fullScreenExit" src="assets/images/materialIcons/ExitfullScreen.svg" alt="Exit full screen icon">
          </div>
          <input class="project__addTaskInput" type="text" name="addTask" placeholder="Add a task...">
          <div class="project__gradientTop"></div>
          <div class="project__content">
            <form class="project__form" action="/action_page.php">
              <div class="project__task">
                <a class="project__link" href="#">
                  <div class="project__checkbox project__checkbox--notdone">
                    <svg class="project__taskDone project__icon--<?= $project->color ?> project__taskDone--notdone">
                    <use xlink:href="assets/images/materialIcons/taskDone.svg#taskDone"></use>
                    </svg>
                  </div>
                  <p class="project__taskDescription">Make tasky wireframes 😀<p>
                </a>
              </div>
            </form>
            <div class="project__gradientBottom"></div>
          </div>
        </div>
      <?php endforeach ?>
  </div>
  <div class="addProject <?= !empty($dashboardErrors['project_name']) ? 'addProject--visible' : 'addProject--hidden' ?>">
    <div class="addProject__triangle"></div>
    <div class="addProject__box">
      <form action="#" method="post">
        <input class="addProject__projecTitleInput" type="text" name="project_title" placeholder="Project title...">
        <div class="addProject__error <?= !empty($dashboardErrors['project_name']) ? $dashboardErrors['project_name'] : false ?>">
          <div class="addProject__errorLine"></div>
          <p class="addProject__errorMessage">Title is required</p>
        </div>
        <!-- Category -->
        <h3 class="addProject__Title">Category</h3>
        <div class="addProject__categoryList">
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="category" value="important" <?= !empty($_POST['category']) && $_POST['category'] == 'important' ? 'checked' : false ?>/>
            <svg class="addProject__icon addProject__important <?= !empty($_POST['category']) && $_POST['category'] == 'important' ? 'addProject__categoryRadio--checked' : false ?>">
              <use xlink:href="assets/images/materialIcons/important.svg#important"></use>
            </svg>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="category" value="work" checked/>
            <svg class="addProject__icon addProject__colorIcon addProject__icon--blue <?= !empty($_POST['category']) && $_POST['category'] == 'work' ? 'addProject__categoryRadio--checked' : false ?>">
              <use xlink:href="assets/images/materialIcons/work.svg#work"></use>
            </svg>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="category" value="home" <?= !empty($_POST['category']) && $_POST['category'] == 'home' ? 'checked' : false ?>/>
            <svg class="addProject__icon addProject__colorIcon addProject__icon--blue <?= !empty($_POST['category']) && $_POST['category'] == 'home' ? 'addProject__categoryRadio--checked' : false ?>">
              <use xlink:href="assets/images/materialIcons/home.svg#home"></use>
            </svg>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="category" value="hobby" <?= !empty($_POST['category']) && $_POST['category'] == 'hobby' ? 'checked' : false ?>/>
            <svg class="addProject__icon addProject__colorIcon addProject__icon--blue <?= !empty($_POST['category']) && $_POST['category'] == 'hobby' ? 'addProject__categoryRadio--checked' : false ?>">
              <use xlink:href="assets/images/materialIcons/hobby.svg#hobby"></use>
            </svg>
          </label>
        </div>
        <!-- Color -->
        <h3 class="addProject__Title">Color</h3>
        <div class="addProject__categoryList">
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="color" value="blue" data-color="blue" checked/>
            <div class="addProject__color addProject__blue addProject__icon <?= !empty($_POST['color']) && $_POST['color'] == 'blue' ? 'addProject__colorRadio--checked' : false ?>"></div>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="color" value="orange" <?= !empty($_POST['color']) && $_POST['color'] == 'orange' ? 'checked' : false ?>/>
            <div class="addProject__color addProject__orange addProject__icon <?= !empty($_POST['color']) && $_POST['color'] == 'orange' ? 'addProject__colorRadio--checked' : false ?>" data-color="orange"></div>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="color" value="green" <?= !empty($_POST['color']) && $_POST['color'] == 'green' ? 'checked' : false ?>/>
            <div class="addProject__color addProject__green addProject__icon <?= !empty($_POST['color']) && $_POST['color'] == 'green' ? 'addProject__colorRadio--checked' : false ?>" data-color="green"></div>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="color" value="purple" <?= !empty($_POST['color']) && $_POST['color'] == 'purple' ? 'checked' : false ?>/>
            <div class="addProject__color addProject__purple addProject__icon <?= !empty($_POST['color']) && $_POST['color'] == 'purple' ? 'addProject__colorRadio--checked' : false ?>" data-color="purple"></div>
          </label>
          <label class="addProject__category">
            <input class="addProject__radio" type="radio" name="color" value="yellow" <?= !empty($_POST['color']) && $_POST['color'] == 'yellow' ? 'checked' : false ?>/>
            <div class="addProject__color addProject__yellow addProject__icon <?= !empty($_POST['color']) && $_POST['color'] == 'yellow' ? 'addProject__colorRadio--checked' : false ?>" data-color="yellow"></div>
          </label>
        </div>
        <label>
          <input class="addProject__radio" type="submit">
          <div class="addProject__button">Create project</div>
        </label>
      </form>
    </div>
  </div>
  <div class="baseline">
    <img src="assets/baseline.png" alt="">
  </div>
  <div class="php">
      <?php
        echo '<pre>';
        var_dump($dashboardErrors);
        echo '</pre>';
      ?>
  </div>
  <!--build:js scripts/main.min.js -->
  <script src="scripts/fullScreenBox.js"></script>
  <script src="scripts/AddProjectWindow.js"></script>
  <script src="scripts/CategoryColor.js"></script>
  <script src="scripts/TaskCheckbox.js"></script>
  <script src="scripts/main.js"></script>
  <!--endbuild-->

  </body>

  </html>
  <?php
    } else {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
  </head>
  <body>
  <div class="php">
  <? 
      echo '<pre>';
      var_dump(!empty($registerErrors) ? $registerErrors : false);
      echo '</pre>';
  ?>
  </div>
      
  <div class="register">
      <form action="#" method="post">
          <label for="user_name">User name</label>
          <input type="text" name="user_name" placeholder="User name">
          <label for="user_name">Password</label>
          <input type="password" name="password" placeholder="Password">
          <label>
          <input type="submit">
          <div>Connexion</div>
          </label>
      </form>
      <a href="createAccount.php">Create a account</a>
  </div>
    
  </body>
  </html>
  <?php
    }
    ?>
