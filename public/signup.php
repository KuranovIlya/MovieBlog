<?php
session_start();
if($_SESSION['user_id']){
    header('Location: ../index.php');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/signin.css">
    <style type="text/css">

    </style>
    <title>Document</title>
</head>
<body>
    <form class="form-signin text-center" method="post" action="actions/act_signup.php">
        <img class="mb-4" src="/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

        <label for="inputName" class="sr-only">Имя</label>
        <input type="text" id="inputName" name="name" class="form-control" placeholder="Имя" value="<?php if($_SESSION['su_name']){echo $_SESSION['su_name'];} unset($_SESSION['su_name']); ?>">

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" value="<?php if($_SESSION['su_email']){echo $_SESSION['su_email'];} unset($_SESSION['su_email']); ?>">

        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Пароль">

        <label for="repeatPassword" class="sr-only">Повторите пароль</label>
        <input type="password" id="repeatPassword" name="password2" class="form-control" placeholder="Повторите пароль">
        <div class="checkbox mb-3">
            <input type="checkbox" value="remember-me"required> Я согласен с обработкой данных
        </div>
        <?php
        if($_SESSION['message']){
            echo '<p class="text-danger">' .$_SESSION['message']. '</p>';
        }
        unset($_SESSION['message']);
        ?>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="sub" onclick="error_registration()">Зарегистрироваться</button>
        <a href="index.php">Вернуться на главную</a>
    </form>
    <script src="js/errors.js"></script>
</body>
</html>