<?php
 require("include" . DIRECTORY_SEPARATOR . "config.php"); 
$message = "";
$email = utils::post("email");
$password = utils::post("password");

if ($email !== "" && $password !== "") {
    db::run("select id from user where email=? and password=?", $email, $password);
    $user = db::records(true);

    if (count($user) > 0) {
        $_SESSION["user_id"] = $user["id"];
        header("location:user-account.php");
    } else {
        $message = "Wrong username and password";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require(root . "component" . ds . "head.php"); ?>
</head>

<body>
    <div class="tj-wrapper">
        <div class="loader-outer">
            <div class="tj-loader">
                <img src="images/pre-loader.gif" alt="">
                <h2>Loading...</h2>
            </div>
        </div>
        <?php require(root . "component" . ds . "header.php"); ?>
        <div class="tj-inner-banner">
            <div class="container">
                <h2>Login</h2>
            </div>
        </div>
        <div class="tj-breadcrumb">
            <div class="container">
                <ul class="breadcrumb-list">
                    <li><a href="home-1.html">Home</a></li>
                    <li class="active">Login</li>
                </ul>
            </div>
        </div>
        <section class="tj-login">
            <div class="container">
                <div class="row">
                    <div class="col-sm-offset-3 col-sm-6">
                        <div class="tj-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="login.php">Login</a></li>
                                <li><a href="register.php">Register</a></li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!--Login Tabs Content Start-->
                            <div class="tab-pane active" id="login">
                                <div class="col-md-12 col-sm-12">
                                    <form class="login-frm" method="POST" action="">
                                        <?php if ($message !== "") { ?>
                                            <div class="alert alert-danger"><?php echo $message; ?></div>
                                        <?php } ?>
                                        <div class="field-holder">
                                            <span class="far fa-envelope"></span>
                                            <input type="email" name="email" placeholder="Enter your Email Address">
                                        </div>
                                        <div class="field-holder">
                                            <span class="fas fa-lock"></span>
                                            <input type="password" name="password" placeholder="Password">
                                        </div>
                                        <a href="#" class="forget-pass">Forget Password?</a>
                                        <button type="submit" class="reg-btn">Login <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    


        <?php require(root . "component" . ds . "footer.php"); ?>

    </div>

</body>

</html>