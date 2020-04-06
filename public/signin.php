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
    <form class="form-signin text-center" action="actions/act_signin.php" method="post">
        <img class="mb-4" src="/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Авторизация</h1>

        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" name="email" class="form-control" placeholder="Email" required="true" value="<?php if($_SESSION['si_email']){echo $_SESSION['si_email'];} unset($_SESSION['si_email']); ?>">

        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name="password" class="form-control" placeholder="Пароль" required="true">

        <?php
        if($_SESSION['message']){
            echo '<p class="text-danger">' .$_SESSION['message']. '</p>';
        }
        unset($_SESSION['message']);
        ?>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
        <a href="index.php">Вернуться на главную</a>
    </form>
</body>
</html>
