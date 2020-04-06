<?php
$query = $pdo->query('SELECT review_id, user_name, review_filmname, review_date, review_poster FROM review INNER JOIN users ON users.user_id = review.user_id ORDER BY review_date');
while ($row = $query->fetch(PDO::FETCH_OBJ)) {
    echo '<div class="col-md-3 col-sm-6 col-12 mb-5 bg-light border">
            <div class="container-fluid">
                <img class="img-fluid d-block mx-auto" src="'.$row->review_poster.'" alt="">
            </div>
            <div class="container-fluid">
                <p class="h3 text-center"><a href="../review_page.php?id='.$row->review_id.'">'.$row->review_filmname.'</a></p>
                <p class="h5 text-center">'.$row->user_name.'</p>
                <p class="h6 text-center">'.$row->review_date.'</p>
            </div>
        </div>';
}

