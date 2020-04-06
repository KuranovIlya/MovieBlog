<?php
session_start();
require_once 'db.php';
$user = $_POST;
$_SESSION['su_name'] = $user['name'];
$_SESSION['su_email'] = $user['email'];

$sql = 'SELECT user_id FROM users WHERE user_email LIKE ?';
$query = $pdo->prepare($sql);
$query->execute([$user['email']]);

$row = $query->fetch(PDO::FETCH_OBJ);

if (trim($user['name']) == '') {
    $_SESSION['message'] = 'Укажите свое имя';
    header('Location: ../signup.php');
}
else if (trim($user['email']) == '') {
    $_SESSION['message'] = 'Укажите адрес электронной почты';
    header('Location: ../signup.php');
}
else if (trim($user['password']) == '') {
    $_SESSION['message'] = 'Укажите пароль';
    header('Location: ../signup.php');
}
else if (strcasecmp($user['password'], $user['password2']) != 0) {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../signup.php');
}
else if (!preg_match('/^[АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ][-абвгдеёжзийклмнопрстуфхцчшщъыьэюяАБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ ]+$/', $user['name'])) {
    $_SESSION['message'] = 'ФИО должно начинаться с заглавной буквы и состоять из русских букв, пробелов и дефисов!';
    header('Location: ../signup.php');
}
else if (!preg_match('/(?=.*[0-9])(?=.*[!@#$%^&*_])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*_]{6,}/', $_POST['password'])) {
    $_SESSION['message'] = 'Пароль должен быть длинне 5 символов, состоять из латинских заглавных и строчных букв и иметь цифры и специальные символы!';
    header('Location: ../signup.php');
}
else if ($row) {
    $_SESSION['message'] = 'Данная почта уже зарегистрирована на сайте!';
    header('Location: ../signup.php');
}
else {
    $sql = 'INSERT INTO users(user_name, user_email, user_password, user_role) VALUES (:user_name, :user_email, :user_password, :user_role)';
    $query = $pdo->prepare($sql);
    $query->execute(['user_name' => $user['name'], 'user_email' => $user['email'], 'user_password' => password_hash($user['password'], PASSWORD_DEFAULT), 'user_role' => 'User']);

    header('Location: ../index.php');
}
