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
    <title>customer order</title>
    <link rel="stylesheet" type="text/css" href="order.css">
</head>

<body>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>your Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Your Email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> product <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Your name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Location <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Order Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Amount <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $reader=new BlogReader();
                         $orders=$reader->getCustomerOrderFromDB($_SESSION['email']);
                         if($orders)
                         {
                            foreach($orders as $order)
                            {
                                echo "<tr>
                                <td>". $order['id']." </td>
                                <td>". $order['email']." </td>
                                <td>".$order['product']."</td>
                                <td>".$order['customer']."</td>
                                <td>".$order['location']."</td>
                                <td>".$order['date']."</td>";?>
                                <?php
                                if($order['status']=='0'){
                                    echo"<td>
                                    <p class=\"status delivered\">Pending</p>
                                </td>";
                                }
                                echo"<td> <strong>$".$order['amount']."</strong></td>
                                <";
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