<?php
session_start();
require_once 'db.php';

$query = $pdo->query('SELECT user_name, review_filmname, review_date, review_poster, review_text, review_trailer 
    FROM review INNER JOIN users ON users.user_id = review.user_id 
    WHERE review_id = '.$_SESSION['review_id'].' ORDER BY review_date');
$review = $query->fetch(PDO::FETCH_OBJ);