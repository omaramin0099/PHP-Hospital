<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../general/configDB.php';
include '../general/functions.php';



if (isset($_POST['login'])) {
    $userName=   $_POST['userName'];
    $password=   $_POST['password'];
    $select= "SELECT * from `admin` WHERE Username = '$userName' AND password = '$password' ";

    $s = mysqli_query($connect, $select);
    $num = mysqli_num_rows($s);
    if ($num > 0) {
        
        echo "<div class='alert alert-success alert-dismissible mt-5'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Login Success!</strong>
      </div>";
        $_SESSION['admin'] =  $userName;
        header("location: /hospital/index.php");
    } 
    else {
        echo "<div class='alert alert-danger alert-dismissible mt-5'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        <strong>Wrong username or password</strong>
      </div>";
    }
    

}
?>


<link rel="stylesheet" href="/hospital/css/admin.css">

<!-- <h1 class="text-center text-primary display-1 my-5 py-3">Admin login</h1>
<div class="container col-7 ">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Admin name</label>
                    <input type="text" name="userName" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Admin password</label>
                    <input type="text" name="password" class="form-control">
                </div>
                <button name="login" class="btn btn-primary btn-block w-50 mx-auto">Login</button>

            </form>
        </div>
    </div>
</div> -->


<!-- ================================================ -->

<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Admin Login
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="userName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" name="login" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>





<!-- =================================================== -->





<?php
include '../shared/foot.php'
?>

