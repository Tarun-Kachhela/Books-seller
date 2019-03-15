
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
//    echo $book_name." : ".$description." : ".$subject." : ".$standard." : ".$company_name." : ".$state." : ".$price." : ".$quantity." : ".$image;
//        die();
    $query ="INSERT INTO employee(first_name, last_name, email, gender, age, contact_no, address, image) VALUES ('$first_name', '$last_name', '$email', '$gender', '$age','$contact_no' , '$address','$image' )";
    $rs = mysqli_query($conn,$query);
    echo $rs."ss";
//    die();
    if (!$rs)
        die(mysqli_error($conn));
    else
        header("Location: ../employee.php");
}
?>

<div class="container col-md-8">
    <div class="row">
        <form action="pages/add_emp.php" method="post" role="form" enctype="multipart/form-data">

            <div class="form-group">
                <label for="firstName" class="">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name">
            </div>

            <div class="form-group">
                <label for="last_name" class="">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name">
            </div>

            <div class="form-group">
                <label for="email" class="">Email</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="contact_no" class="">Contact Number:</label>
                <input type="tel" class="form-control" name="contact_no" id="contact_no">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="0" class="form-control">Please select gender...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age" class="">Age</label>
                <input type="tel" class="form-control" name="age" id="age">
            </div>
            <div class="form-group">
                <label for="image" class="">Image of Employee</label>
                <input type="file" class="form-group" name="image" id="image">
            </div>


            <div class="form-group">
                <label for="address" class="">Address</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
        </form>
        <br>
        <br>
    </div>
</div>