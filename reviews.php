<?php
    session_start();
    include "UI_include.php";
    include INC_DIR."/classes/Database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>customer Reviews</title>
    <link rel="stylesheet" type="text/css" href="order.css">
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>customer's Reviews</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $reader=new BlogReader();
                         $reviews=$reader->getReviewFromDB();
                         if($reviews)
                         {
                            foreach($reviews as $review)
                            {
                                echo "<tr>
                                <td>". $review['name']." </td>
                                <td>".$review['email']." </td>
                                <td>".$review['message']."</td>
                                <td>".$review['date']."</td>";?>
                                <?php
                            }
                         }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="order.js"></script>

</body>

</html>