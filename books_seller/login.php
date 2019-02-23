<!DOCTYPE html>
<html>
<?php
    include_once ("includes/header.php");
    include_once ("includes/connection.php");
    include_once ("includes/functions.php");
    startSession();
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
//        $password = password_hash($password,1);
        $type = $_POST['type'];
//        $query  = "INSERT INTO users ( username, password, user_type) VALUES ('$username','$password','$type')";
        $query = "SELECT * FROM users WHERE username ='$username'";
        $rs = mysqli_query($conn,$query);
        if($row= mysqli_fetch_assoc($rs)){
            startSession();
            $_SESSION['id'] = $row['id'];
//            die($row['user_id']);
            if(password_verify($password,$row['password'])){
                header("Location: index.php");
            }else{
                header("Location: login.php");
            }
        }
//        sleep(20);
//        header("location: index.php");
    }

?>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Sign Up</div>
				<div class="panel-body">
					<form action="login.php" enctype="multipart/form-data" method="post" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
                            <div class="form-group">
                                <select name="type" id="" class="form-control">
                                    <option value="0">Select user Type...</option>
                                    <option value="1">Normal user</option>
                                    <option value="2">Book Store</option>
                                    <option value="3">Company</option>
                                    <option value="4">Donor</option>
                                </select>
                            </div>

                            <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" name="login" class="btn btn-primary">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->


<?php
    include_once ("includes/scripts.php");
?>
</body>
</html>
