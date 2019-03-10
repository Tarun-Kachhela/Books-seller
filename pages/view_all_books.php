<br>
<div class="container-fluid border-top">
    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Sr.NO</th>
                    <th>Book Name</th>
                    <th>Description</th>
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
                    include_once ("includes/functions.php");
                    startSession();
                    $i = 0;
                    $id= $_SESSION['id'];
                    $query  = "SELECT * FROM books WHERE user_id ='$id'";
                    $rs = mysqli_query($conn,$query);
//                    echo $username."t";
                    while ($row = mysqli_fetch_assoc($rs)) {
//                        echo "d";
                        $book_id = $row['id'];
                        $book_name = $row['book_name'];
                        $description = $row['description'];
                        $subject = $row['subject'];
                        $standard = $row['standard'];
                        $company_name = $row['company_name'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $image = $row['image'];
                        $i++;
                        $description=substr($description,0,20)."......";
                        echo<<<ROW
<tr>
    <td>$i</td>
    <td>$book_name</td>
    <td>$description</td>
    <td>$subject</td>
    <td><a href=""><img src="images/books/$image" class="img-rounded img-circle img-responsive" style="width: 75px"></a></td>
    <td>$standard</td>
    <td>$company_name</td>
    <td>$price</td>
    <td>$quantity</td>
    <td><a href="books.php?source=edit_book_info&edit_id=$book_id" class="btn btn-primary btn-lg fa fa-edit"></a></td>
    <td><a href="pages/delete_book.php?delete_id=$book_id" class="btn btn-danger btn-lg fa fa-trash-o"></a></td>
</tr>
ROW;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>