<?php
session_start();
require_once 'db.php';

if (trim($_POST['comment']) == '') {
    $_SESSION['message'] = 'Поле сообщения не должно быть пустым';
    header('Location: ../review_page.php?id='.$_SESSION['review_id']);
}
else {
    $sql = 'INSERT INTO comments(user_id, review_id, comment_text, comment_date) VALUES (:user_id, :review_id, :comment_text, :comment_date)';
    $query = $pdo->prepare($sql);
    $query->execute(['user_id' => $_SESSION['user_id'], 'review_id' => $_SESSION['review_id'], 'comment_text' => $_POST['comment'], 'comment_date' => date("Y-m-d H:i:s")]);
    echo $_SESSION['user_id'].'<br>'.$_SESSION['review_id'].'<br>'.$_POST['comment'].'<br>'.date("Y-m-d H:i:s");
    header('Location: ../review_page.php?id='.$_SESSION['review_id']);
}
