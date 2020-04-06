<?php
session_start();
require_once 'actions/db.php';
unset($_SESSION['current_page']);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <style type="text/css">
        html,
        body {
            height: 100%;
        }
        .container1 {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1;
        }
    </style>
    <title>Главная</title>
</head>

<body>
    <div class="container-fluid container1">
        <?php require "blocks/header.php" ?>


        <div class="content">
            <?php //require "blocks/list_films.php" ?>
            <!---->
            <div class="container-fluid py-5 px-1">
                <div class="row">
                    <?php require 'blocks/list_films.php'?>

                </div>
            </div>
            <!---->
        </div>


        <?php require "blocks/footer.php" ?>
    </div>
</body>

</html>