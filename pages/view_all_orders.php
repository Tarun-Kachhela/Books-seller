<div class="container-fluid border-top">
    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Sr.NO</th>
                    <th>Book Name</th>
                    <th>Subject</th>
                    <th>Image</th>
                    <th>Standard</th>
                    <th>Company Name</th>
                    <th>Price</th>
                    <th>Actual Quantity</th>
                    <th>Placed Quantity</th>
                    <th>book condition</th>
                    <th>Status</th>
                    <th>Address</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include_once ("includes/connection.php");
                include_once ("includes/functions.php");
                startSession();
                $i = 0;
                $id= $_SESSION['id'];
                //                echo $id;
                //                die();
                $query  = "SELECT books.*,placed_orders.* FROM `placed_orders` JOIN books ON placed_orders.book_id=books.id WHERE placed_orders.buyer_user=$id";
                $rs = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($rs)) {
                    $book_name = $row['book_name'];
                    $description = $row['description'];

                    $subject = $row['subject'];
                    $standard = $row['standard'];
                    $company_name = $row['company_name'];
                    $price = $row['price'];
                    $placed_quantity= $row['placed_quantity'];
                    $quantity = $row['quantity'];
                    $image = $row['image'];
                    $state= $row['state'];
                    $status = $row['status'];
                    $address = $row['address'];

                    $i++;
                    echo<<<ROW
<tr>
    <td>$i</td>
    <td>$book_name</td>
    <td>$subject</td>
    <td><a href=""><img src="images/books/$image" class="img-rounded img-circle img-responsive" style="width: 75px" alt=""></a></td>
    <td>$standard</td>
    <td>$company_name</td>
    <td>$price</td>
    <td>$placed_quantity</td>
    <td>$quantity</td>
    <td>$state</td>
    <td class = "color-red">$status</td>
    <td>$address</td>
</tr>
ROW;


                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>