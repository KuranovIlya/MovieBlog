<?php

session_start();
require_once 'db.php';
$review = $_POST;

$_SESSION['ar_name'] = $review['name'];
$_SESSION['ar_text'] = $review['text_review'];

if (trim($review['name']) == '') {
    $_SESSION['message'] = 'Поле названия не должно быть пустым';
    header('Location: ../review_add.php');
} else if (trim($review['text_review']) == '') {
    $_SESSION['message'] = 'Поле обзора не должно быть пустым';
    header('Location: ../review_add.php');
} else {
    $path = 'uploads/'.$_SESSION['user_id'].'_'.time().'_'.$_FILES['poster']['name'];

    if (!move_uploaded_file($_FILES['poster']['tmp_name'], '../'.$path)) {
        $_SESSION['message'] = 'Ошибка загрузки постера';
        header('Location: ../review_add.php');
    }

    $sql = 'INSERT INTO review(user_id, review_filmname, review_poster, review_date, review_text, review_trailer) VALUES (:user_id, :review_filmname, :review_poster, :review_date, :review_text, :review_trailer)';
    $query = $pdo->prepare($sql);
    $query->execute(['user_id' => $_SESSION['user_id'],
        'review_filmname' => $review['name'],
        'review_poster' => $path,
        'review_date' => date("Y-m-d H:i:s"),
        'review_text' => $review['text_review'],
        'review_trailer' => $review['trailer']]);

    header('Location: ../index.php');
}
