<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
    <a class="navbar-brand my-0 d-flex mr-md-auto font-weight-normal h5" href="../index.php">MovieBlog</a>
    <?php
    if ($_SESSION['user_id']) {
        if ($_SESSION['user_role'] !== 'Admin') {
            echo '<p class="p-2 m-0">Здравствуйте, '.$_SESSION['user_name'].'</p>';
        }
        else {
            echo '<nav class="my-2 my-md-0 mr-md-3">
                <a class="btn btn-outline-primary p-2" href="../review_add.php">Обзор</a>
              </nav>';
        }
        echo '<a class="btn btn-outline-primary" href="../actions/logout.php">Выйти</a>';
    }
    else {
        echo '<nav class="my-2 my-md-0 mr-md-3">
                <a class="btn btn-outline-primary p-2" href="../signup.php">Регистрация</a>
              </nav>

              <a class="btn btn-outline-primary" href="../signin.php">Войти</a>';
    }
    ?>
</div>