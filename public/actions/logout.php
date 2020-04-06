<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['user_role']);

if ($_SESSION['current_page']) {
    header('Location: ../'.$_SESSION['current_page']);
}
else {
    header('Location: ../index.php');
}
