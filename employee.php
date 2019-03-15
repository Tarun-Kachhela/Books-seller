
<!DOCTYPE html>
<html>
<?php
$active = "employee";
echo $active;
session_start();
include_once ("includes/header.php");
?>
<body>
<?php
    include_once ("includes/navigation.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Books</li>
        </ol>
    </div><!--/.row-->


    <?php
        function setTitle($title){
            echo<<<TITLE
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">$title</h1>
    </div>
</div>
TITLE;

        }
        $source ="";
        if(isset($_GET['source']))
            $source =  $_GET['source'];
        switch($source){
            case "add_employee":
                $active = "add_employee";
                setTitle("ADD EMPLOYEE");
                include_once ("pages/add_emp.php");
                break;
           /* case "view_orders":
                setTitle("VIEW ORDERS");
                $active = "view_orders";
                include_once("pages/view_all_orders.php");
                break;
            case "placed_orders":
                setTitle("Your PLACED ORDERS");
                $active = "placed_orders";
                include_once ("pages/placed_orders.php");
                break;*/
            case "edit_emp_info":
                $active = "";
                setTitle("EDIT EMPLOYEE");
                include_once ("pages/edit_emp.php");
                break;
            default:
                setTitle("ALL EMPLOYEE");
                $active = "employee";
                echo<<<BUTTON
<div >
    <a href="employee.php?source=add_employee" class="btn btn-primary btn-lg">Add Employee</a>
</div>
BUTTON;
                include_once ("pages/view_emp.php");
        }
    include_once ("includes/sidebar.php");
    ?>
</div>	<!--/.main-->

<?php
include_once ("includes/scripts.php");
?>

</body>
</html>