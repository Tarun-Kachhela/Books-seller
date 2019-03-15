
<?php
if (isset($_POST['submit'])){
    include_once ("../includes/connection.php");
    include_once ("../includes/functions.php");
    $first_name  = $_POST['first_name'];
    $last_name  = $_POST['last_name'];

    $email  = $_POST['email'];
    $gender = $_POST['gender'];
    $age  = $_POST['age'];
    $contact_no  = $_POST['contact_no'];
    $address  = $_POST['address'];

    $image  = $_FILES['image']['name'];
    $tmp_image  = $_FILES['image']['tmp_name'];
    $upload = move_uploaded_file($tmp_image,"../images/employee/$image");
    startSession();
    $id = $_SESSION['id'];
    $old_image= $_POST['checkImage'];
    echo $old_image;
    if($image=="")
        $image =$old_image;
    else if($image != $old_image){
        $var ="../images/employee/$old_image";
        unset($var);
        $old_image = $image;
        echo "nosame";
    }//first_name, last_name, email, , age, , , image
    $query = "UPDATE `employee` SET first_name='$first_name',last_name='$last_name',email='$email',gender='$gender',age='$age',contact_no='$contact_no',address='$address',image='$image' WHERE id='{$_GET['id']}'";

    $rs = mysqli_query($conn,$query);
    if (!$rs)
        die(mysqli_error($conn));
    else{
        $upload = move_uploaded_file($tmp_image,"../images/books/$image");
        header("Location: ../employee.php");
    }
}
if(isset($_GET['edit_id'])) {
    include_once ("includes/connection.php");
    $query = "SELECT * FROM employee WHERE id={$_GET['edit_id']}";
    $rs = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($rs)) {
        $first_name  = $row['first_name'];
        $last_name  = $row['last_name'];

        $email  = $row['email'];
        $gender = $row['gender'];
        $age  = $row['age'];
        $contact_no  = $row['contact_no'];
        $address  = $row['address'];
        $old_image  = $row['image'];

    }
    ?>

    <div class="container col-md-8">
        <div class="row">
            <form action="pages/edit_emp.php?id=<?php echo $_GET['edit_id']; ?>" method="post" role="form" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="first_name" class="">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name?>">
                </div>

                <div class="form-group">
                    <label for="last_name" class="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name?>">
                </div>

                <div class="form-group">
                    <input type="hidden" name="checkImage" id="checkImage" value="<?php echo $old_image;?>">
                </div>

                <div class="form-group">
                    <label for="email" class="">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $email?>">
                </div>
                <div class="form-group">
                    <label for="contact_no" class="">Contact Number:</label>
                    <input type="tel" class="form-control" name="contact_no" id="contact_no" value="<?php echo $contact_no?>">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <?php
                        if ($gender == "male"){
                            ?>
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            <?php
                        }else {
                            ?>
                            <option value="male" >Male</option>
                            <option value="female" selected>Female</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="age" class="">Age</label>
                    <input type="tel" class="form-control" name="age" id="age" value="<?php echo $age?>">
                </div>
                <div class="form-group">
                    <label for="image" class="">Image of Employee</label>
                    <input type="file" class="form-group" name="image" id="image">
                </div>


                <div class="form-group">
                    <label for="address" class="">Address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="10"><?php echo $address?></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
            </form>
            <br>
            <br>
        </div>
    </div>
    <?php

}?>