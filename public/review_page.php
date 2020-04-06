<?php
session_start();
$_SESSION['review_id'] = $_GET['id'];
$_SESSION['current_page'] = 'review_page.php?id='.$_SESSION['review_id'];
require 'actions/display_review.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <link rel="stylesheet" href="css/review_style.css">
    <title><?php echo $review->review_filmname;?></title>
</head>
<body>
    <div class="container-fluid container1">

        <?php require "blocks/header.php"?>

        <div class="content mt-4 mb-2">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-sm-4">
                                                <img class="img-fluid d-block mx-auto" src="<?php echo $review->review_poster;?>" alt="">
                        <p class="text-muted text-monospace text-center mt-3"><?php echo $review->review_date;?></p>
                        <p class="text-monospace text-center mt-3">Автор обзора: <?php echo $review->user_name;?></p>
                    </div>
                    <div class="col-sm-8">
                        <h2 class="text-center"><?php echo $review->review_filmname;?></h2>
                        <p class="h5 text-center"><?php echo $review->review_text;?></p>
                        <div class="div-frame">
                            <iframe class="d-block mx-auto" src="<?php echo $review->review_trailer; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-1">
                <p class="h3 text-center">Комментарии</p>
                <div class="container"">
                    <form action="actions/send_comment.php" method="post" <?php if(!$_SESSION['user_id']){echo 'style="display:none"';}?>>
                        <textarea class="form-control" name="comment" required maxlength="700" cols="100"></textarea>
                        <button type="submit" class="btn btn-outline-primary my-2">Отправить</button>
                        <?php
                        if($_SESSION['message']){
                            echo '<p class="text-danger h6">' .$_SESSION['message']. '</p>';
                        }
                        unset($_SESSION['message']);
                        ?>
                    </form>
                </div>
                <div class="container mt-3">
                    <?php require 'actions/display_comments.php';?>
                </div>
            </div>
        </div>

        <?php require "blocks/footer.php"?>

    </div>
</body>
</html>