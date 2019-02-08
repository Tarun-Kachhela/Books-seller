
<?php
    if (isset($_POST['submit'])){
        include_once ("../includes/connection.php");
        $subject  = $_POST['subject'];
        $standard = $_POST['standard'];
        $company_name  = $_POST['company_name'];
        $state  = $_POST['state'];
        $price  = $_POST['price'];
        $image  = $_FILES['image']['name'];
        $tmp_image  = $_FILES['image']['tmp_name'];
        $upload = move_uploaded_file($tmp_image,"../images/books/$image");
        echo $upload;
//        die();
        $quantity = $_POST['quantity'];

        $query = "INSERT INTO books (subject, standard, company_name, state, price, user_id, quantity, image) VALUES ('$subject','$standard','$company_name','$state','$price','1','$quantity','$image')";

        $rs = mysqli_query($conn,$query);
        echo $rs."ss";
        if (!$rs)
            die(mysqli_error($conn));
        else
            header("Location: ../books.php");
    }
?>

<div class="container col-md-8">
    <div class="row">
        <form action="pages/add_book.php" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="subject" class="">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject">
            </div>

            <div class="form-group">
                <label for="standard" class="">Standard</label>
                <input type="text" class="form-control" name="standard" id="standard">
            </div>
            <div class="form-group">
                <label for="company_name" class="">Company Name</label>
                <input type="text" class="form-control" name="company_name" id="company_name">
            </div>
            <div class="form-group">
                <label for="state">Condition</label>
                <select name="state" id="state" class="form-control">
                    <option value="0" class="form-control ">Please select condition of book ...</option>
                    <option value="new">New book</option>
                    <option value="second_hand">Second hand</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price" class="">Price</label>
                <input type="text" class="form-control" name="price" id="price">
            </div>

            <div class="form-group">
                <label for="image" class="">Image of book</label>
                <input type="file" class="form-group" name="image" id="image">
            </div>

            <div class="form-group">
                <label for="quantity" class="">Quantity</label>
                <input type="text" class="form-control" name="quantity" id="quantity">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </form>
        <br>
        <br>
    </div>
</div>
