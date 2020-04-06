<?php
session_start();
if ($_SESSION['user_role']!=='Admin') {
    header('Location: ../index.php');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid container1">
        <?php require "blocks/header.php"?>

        <div class="container bg-light content mb-2">
            <div class="container-fluid px-0">
                <h1 class="text-center">Добавление обзора</h1>
            </div>
            <div class="container">
                <form action="actions/act_addReview.php" method="post" enctype="multipart/form-data" ">
                    <p>Название фильма</p>
                    <input class="form-control mb-3" name="name" type="text" placeholder="Название фильма" required value="<?php if($_SESSION['ar_name']){echo $_SESSION['ar_name'];} unset($_SESSION['ar_name']); ?>">

                    <p>Текст обзора</p>
                    <textarea class="form-control mb-3" name="text_review" required maxlength="700" cols="100" rows="5" value="<?php if($_SESSION['ar_text']){echo $_SESSION['ar_text'];} unset($_SESSION['ar_text']); ?>"></textarea>

                    <p>Постер</p>
                    <input type="file" class="form-control-file mb-3" name="poster" required>

                    <p>Трейлер</p>
                    <input class="form-control mb-3" name="trailer" type="text" placeholder="Ссылка на трейлер">
                    <?php
                    if($_SESSION['message']){
                        echo '<p class="text-danger">' .$_SESSION['message']. '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>

        <?php require "blocks/footer.php"?>
    </div>
</body>
</html>