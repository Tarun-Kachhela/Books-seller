<br>
<br>
<div class="container-fluid border-top">
    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th>Image</th>
                    <th>Standard</th>
                    <th>Company Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    include_once ("includes/connection.php");
                    $query  = "SELECT * FROM books WHERE user_id =1";
                    $rs = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_assoc($rs)) {
                        $subject = $row['subject'];
                        $standard = $row['standard'];
                        $company_name = $row['company_name'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $image = $row['image'];
                        echo<<<ROW
<tr>
    <td>$subject</td>
    <td><a href=""><img src="images/books/$image" class="img-rounded img-circle img-responsive" style="width: 75px" alt=""></a></td>
    <td>$standard</td>
    <td>$company_name</td>
    <td>$price</td>
    <td>$quantity</td>
    <td><a href="" class="btn btn-primary btn-lg fa fa-edit"></a></td>
    <td><a href="" class="btn btn-danger btn-lg fa fa-trash-o"></a></td>
</tr>
ROW;


                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>