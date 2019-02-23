<!DOCTYPE html>
<html>
<?php
$active = "books";
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
            case "add_book":
                $active = "add_book";
                setTitle("ADD BOOKS");
                include_once ("includes/sidebar.php");
                include_once ("pages/add_book.php");
                break;
            case "view_orders":
                setTitle("VIEW ORDERS OF MY BOOKS");
                $active = "view_orders";
                include_once ("includes/sidebar.php");
                include_once ("pages/view_all_orders.php");
                break;
            case "placed_orders":
                setTitle("PLACED ORDERS BOOKS");
                $active = "placed_orders";
                include_once ("includes/sidebar.php");
                include_once ("pages/placed_orders.php");
                break;
            default:
                setTitle("ALL BOOKS ");
                $active = "NULL";
                echo<<<BUTTON

<div class="btn btn-primary">
    <a href="books.php?source=add_book" class="btn btn-primary">Add book</a>
</div>
BUTTON;
                include_once ("includes/sidebar.php");
                include_once ("pages/view_all_books.php");
        }
    ?>
</div>	<!--/.main-->

<?php
include_once ("includes/scripts.php");
?>

</body>
</html>