<?php
session_start();
require_once 'db.php';

$user = $_POST;
$_SESSION['si_email'] = $user['email'];

$sql = 'SELECT user_id, user_name, user_role, user_password FROM users WHERE user_email LIKE ?';
$query = $pdo->prepare($sql);
$query->execute([$user['email']]);

$row = $query->fetch(PDO::FETCH_OBJ);
if ($row) {
    if (password_verify($user['password'], $row->user_password)) {
        $_SESSION['user_id'] = $row->user_id;
        $_SESSION['user_name'] = $row->user_name;
        $_SESSION['user_role'] = $row->user_role;

        if ($_SESSION['current_page']) {
            header('Location: ../'.$_SESSION['current_page']);
        }
        else {
            header('Location: ../index.php');
        }
    }
    else {
        $_SESSION['message'] = 'Неправильная почта или пароль';
        header('Location: ../signin.php');
    }
}
else {
    $_SESSION['message'] = 'Неправильная почта или пароль';
    header('Location: ../signin.php');
}
