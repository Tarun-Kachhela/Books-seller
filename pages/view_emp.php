<br>
<div class="container-fluid border-top">
    <div class="row">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include_once ("includes/connection.php");
                include_once ("includes/functions.php");

                $query  = "SELECT * FROM employee";
                $rs = mysqli_query($conn,$query);
                $i=0;
                //                    echo $username."t";
                while ($row = mysqli_fetch_assoc($rs)) {
//                        echo "d";
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $address= $row['address'];
//                        $description = strip_tags($description);
                    $contact_no= $row['contact_no'];
                    $email = $row['email'];

                    $image = $row['image'];
                    $i++;

                    echo<<<ROW
<tr>
    <td>$i</td>
    <td>$first_name</td>
    <td>$last_name</td>
    <td>$email</td>
    <td>$contact_no</td>
    <td>$address</td>
    <td><a href=""><img src="images/employee/$image" class="img-rounded img-circle img-responsive" style="width: 75px"></a></td>  
    <td><a href="employee.php?source=edit_emp_info&edit_id=$id" class="btn btn-primary btn-lg fa fa-edit"></a></td>
    <td><a href="pages/delete_emp.php?delete_id=$id" class="btn btn-danger btn-lg fa fa-trash-o"></a></td>
</tr>
ROW;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>