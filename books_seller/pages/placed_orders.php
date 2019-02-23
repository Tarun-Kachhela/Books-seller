<div class="container-fluid border-top">
    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Sr.NO</th>
                    <th>Subject</th>
                    <th>Image</th>
                    <th>Standard</th>
                    <th>Company Name</th>
                    <th>Price</th>
                    <th>Placed Quantity</th>
                    <th>book condition</th>
                    <th>Quantity</th>
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
                $query  = "SELECT books.*,placed_orders.* FROM `placed_orders` JOIN books ON books.id = placed_orders.book_id WHERE books.user_id=$id";
                $rs = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_assoc($rs)) {
                    $subject = $row['subject'];
                    $standard = $row['standard'];
                    $company_name = $row['company_name'];
                    $price = $row['price'];
                    $placed_quantity= $row['placed_quantity'];
                    $image = $row['image'];
                    $state= $row['state'];
                    $quantity = $row['quantity'];
                    $status = $row['status'];
                    $address = $row['address'];

                    $i++;
                    echo<<<ROW
<tr>
    <td>$i</td>
    <td>$subject</td>
    <td><a href=""><img src="images/books/$image" class="img-rounded img-circle img-responsive" style="width: 75px" alt=""></a></td>
    <td>$standard</td>
    <td>$company_name</td>
    <td>$price</td>
    <td>$placed_quantity</td>
    <td>$state</td>
    <td>$quantity</td>
    <td>$status</td>
    <td>$address</td>
    <!--<td><a href="" class="btn btn-primary btn-lg fa fa-edit"></a></td>-->
    <!--<td><a href="" class="btn btn-danger btn-lg fa fa-trash-o"></a></td>-->
</tr>
ROW;


                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>