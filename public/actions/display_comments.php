<?php
session_start();
require_once 'db.php';

$query = $pdo->query('SELECT comment_text, comment_date, user_name FROM comments INNER JOIN users ON comments.user_id = users.user_id WHERE review_id = '.$_SESSION['review_id'].' ORDER BY comment_date DESC');
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    echo '<div class="container border-top border-bottom">
            <div class="d-flex bd-highlight">
                <div class="mr-auto bd-highlight"><h6>'.$row->user_name.'</h6></div>
                <div class="px-2 py-1 bd-highlight"><p class="text-muted">'.$row->comment_date.'</p></div>
            </div>
            <p>'.$row->comment_text.'</p>
          </div>';
}

