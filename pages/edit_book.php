
<?php
if (isset($_POST['submit'])){
    include_once ("../includes/connection.php");
    include_once ("../includes/functions.php");
    $book_name  = $_POST['book_name'];
    $description  = $_POST['description'];

    $subject  = $_POST['subject'];
    $standard = $_POST['standard'];
    $company_name  = $_POST['company_name'];
    $state  = $_POST['state'];
    $price  = $_POST['price'];
    $image  = $_FILES['image']['name'];
    $tmp_image  = $_FILES['image']['tmp_name'];

    $book_id = $_GET['id'];
    $quantity = $_POST['quantity'];
    startSession();
    $id = $_SESSION['id'];
    $old_image= $_POST['checkImage'];
    echo $old_image;
    if($image=="")
        $image =$old_image;
    else if($image != $old_image){
        $var ="../images/books/$old_image";
        unset($var);
        $old_image = $image;
    }
    $query = "UPDATE `books` SET book_name='$book_name',description='$description',subject='$subject',standard='$standard',company_name='$company_name',state='$state',price='$price',user_id='$id',quantity='$quantity',image='$image' WHERE id='$book_id '";

    $rs = mysqli_query($conn,$query);
    if (!$rs)
        die(mysqli_error($conn));
    else{
        $upload = move_uploaded_file($tmp_image,"../images/books/$image");
        header("Location: ../books.php");
    }
}
if(isset($_GET['edit_id'])) {
    include_once ("includes/connection.php");
    $query = "SELECT * FROM books WHERE id={$_GET['edit_id']}";
    $rs = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($rs)) {
        $book_name  = $row['book_name'];
        $description  = $row['description'];
        $subject  = $row['subject'];
        $standard = $row['standard'];
        $company_name  = $row['company_name'];
        $state  = $row['state'];
        $price  = $row['price'];
        $quantity = $row['quantity'];
        $old_image  = $row['image'];
        $id = $_GET['edit_id'];
    }
    ?>

    <div class="container col-md-8">
        <div class="row">
            <form action="pages/edit_book.php?id=<?php echo $id ?>" method="post" role="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="book_name" >Book Name</label>
                    <input type="text" class="form-control" name="book_name" id="book_name" value=<?php echo $book_name?>>
                </div>

                <div class="form-group">
                    <input type="hidden" name="checkImage" id="checkImage" value="<?php echo $old_image;?>">
                </div>


                <div class="form-group">
                    <label for="subject" class="">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" value=<?php echo $subject?>>
                </div>


                <div class="form-group">
                    <label for="standard" class="">Standard</label>
                    <input type="text" class="form-control" name="standard" id="standard" value=<?php echo $standard?>>
                </div>
                <div class="form-group">
                    <label for="company_name" class="">Company Name</label>
                    <input type="text" class="form-control" name="company_name" id="company_name" value=<?php echo $company_name?>>
                </div>
                <div class="form-group">
                    <label for="state">Condition</label>
                    <select name="state" id="state" class="form-control">
                        <?php
                            if ($state == "new"){
                            ?>
                                <option value="new" selected>New book</option>
                                <option value="second_hand">Second hand</option>
                            <?php
                        }else {
                                ?>
                                <option value="new" >New book</option>
                                <option value="second_hand" selected>Second hand</option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="price" class="">Price</label>
                    <input type="number" name="price" id="price" value=<?php echo $price?>>
                </div>

                <div class="form-group">
                    <label for="image" class="">Image of book</label>
                    <input type="file" class="form-group" name="image" id="image" value=<?php echo $old_image?>>
                </div>

                <div class="form-group">
                    <label for="quantity" class="">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" value=<?php echo $quantity?>>
                </div>

                <div class="form-group">
                    <label for="description" class="">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"><?php echo $description?></textarea>
                </div>

                <button type="submit" class="btn btn-warning" name="submit" id="submit">Edit Book</button>
            </form>
            <br>
            <br>
        </div>
    </div>
    <?php

}?>