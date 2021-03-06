<?php
include 'admin/examples/db.php';
session_start();
require_once "recaptchalib.php";
include 'FacebookLogin/facebook_source.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Product</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Owen House" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link rel="shortcut icon" href="./images/logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <!--/home -->
    <div id="home" class="inner-w3pvt-page">
        <div class="overlay-innerpage">
            <!--/top-nav -->
            <div class="top_w3pvt_main container">
                <!--/header -->
                <header class="nav_w3pvt text-center">
                    <!-- nav -->
                    <nav class="wthree-w3ls">
                        <div id="logo">
                            <h1> <a class="navbar-brand px-0 mx-0" href="index.php">Owen House
                                </a>
                            </h1>
                        </div>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu mr-auto">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="services.php?page=1">Services</a></li>
                            <li class="active"><a href="product.php?page=1">Product</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li>

                                <a id="name-after-login" href="#" id="sign-in-drop">Log in <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul id="drop-sign-in">
                                    <li id="signin-button"><a href="" data-toggle="modal" data-target=".login-form" class="drop-text"><i class="fa fa-user"></i> | Sign in</a></li>
                                    <li id="register-button"><a data-toggle="modal" data-target=".register" href="" class="drop-text"><i class="fa fa-address-card"></i> | Register</a></li>
                                    <li id="profile-button"><a href="" data-toggle="modal" data-target=".profile" class="drop-text"><i class="fa fa-id-card"></i> Profile</a></li>
                                    <li id="orders-button"><a href="" data-toggle="modal" data-target=".orders" class="drop-text"><i class="fa fa-money"></i> Orders</a></li>
                                    <li id="logout-button"><a href="logout.php" class="drop-text"> <i class="fa fa-sign-out"></i> Log out</a></li>
                                </ul>
                            </li>
                            <li class="social-icons ml-lg-3"><a href="https://www.facebook.com/olwenhousespa/" class="p-0 social-icon"><span class="fa fa-facebook-official" aria-hidden="true"></span>
                                    <div class="tooltip">Our Facebook</div>
                                </a>
                            </li>
                            <li class="social-icons ml-lg-3" data-toggle="modal" id="cart-button"><a disabled="disabled" href="#" class="p-0 social-icon"><span class="fa fa-shopping-cart" aria-hidden="true"></span>
                                    <div class="tooltip">Cart</div>
                                    <span id="quantity-product"><?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?></span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </header>
                <!--//header -->

                <!--/breadcrumb-->
                <div class="inner-w3pvt-page-info">
                    <ol class="breadcrumb d-flex">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>

                </div>
                <!--//breadcrumb-->
            </div>
            <!-- //top-nav -->
        </div>
    </div>
    <div class="modal fade register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="registerForm" action="register.php" method="POST">
                    <legend class="title-form">MEMBER REGISTER</legend>
                    <div class="form-group register-form-group">
                        <label>User Name(*)</label>
                        <input type="text" class="form-control" id="username" name="id" required="required">
                        <span class="warning warning-username"></span>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Password(*)</label>
                        <input type="password" id="password-register" name="password" class="form-control" required="required">
                        <span class="warning warning-pass">Password must be 6-18 letters and mustn't contain
                            special characters</span>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Re-enter password(*)</label>
                        <input type="password" id="re-password-register" class="form-control" required="required">
                        <span class="warning warning-repass">Re-password must be the same as password</span>
                    </div>

                    <div class="form-group register-form-group">
                        <label>Full Name</label>
                        <br>
                        <input id="fullname" type="text" name="fullname" class="form-control">
                        <div id="gender-group">
                            Male <input type="radio" value="0" name="gender" checked> |
                            Female <input type="radio" value="1" name="gender">
                        </div>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control" required="required">

                    </div>
                    <div class="form-group register-form-group">
                        <label>Email</label>
                        <input id="email" type="email" name="email" class="form-control">
                        <span class="warning warning-email">Email format is not valid</span>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required="required">

                    </div>

                    <div class="form-group register-form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" name="dob" type="date" placeholder="Birthdate" name="birthday">
                    </div>
                    <div class="form-group register-form-group">
                        <div class="button-group">
                            <button name="submit" type="submit" class="btn btn-primary">Register</button>
                            <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade login-form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="loginForm" action="login.php" method="POST">
                    <legend class="title-form">LOGIN</legend>
                    <div class="form-group register-form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" id="id-login" required="required">
                    </div>
                    <div class="form-group register-form-group">
                        <label>Password</label>
                        <input type="password" id="password-login" class="form-control" required="required">
                        <span class="warning warning-login"></span>
                    </div>

                    <div class="form-group register-form-group">
                        <div class="button-group">
                            <button id="submit-login" name="submit" type="button" class="btn btn-primary">Login</button>
                            <button id="register-button-directive" type="button" class="btn btn-danger">Register</button>
                            <a id="login-facebook" href="<?= $loginUrl ?>"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade orders" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <legend class="title-form">SHOPPING HISTORY</legend>
                    <?php
                    if (isset($_SESSION['current_user'])) {
                        $idUser = $_SESSION['current_user']['id'];
                        $result = mysqli_query($con, "select * from orders where userId='$idUser'");

                        while ($row = mysqli_fetch_assoc($result)) {
                            $i = 0;
                            ?>
                            <div class="form-group register-form-group">
                                <label>Date</label>
                                <input disabled="disabled" class="form-control" value="<?= $row['created'] ?>" type="text">
                            </div>
                            <?php $result_item = mysqli_query($con, "select * from ordersdetail where ordersId=" . $row['id']);
                            while ($row_item = mysqli_fetch_assoc($result_item)) {
                                ?>
                                <div class="form-group register-form-group">
                                    <?= "Item " . ++$i ?>
                                    <input disabled="disabled" class="form-control" value="Name: <?= $row_item['product_name'] ?>" type="text">
                                    <input disabled="disabled" class="form-control" value="Price: <?= $row_item['price'] ?>" type="text">
                                    <input disabled="disabled" class="form-control" value="Quantity: <?= $row_item['quantity'] ?>" type="text">

                                </div>

                            <?php }

                            ?><div class="form-group register-form-group">
                                <input disabled="disabled" class="form-control" value="Total: <?= $row['total_amount'] ?>" type="text">
                            </div>
                            <div style="height:5px;width:100%;background-color:crimson">

                            </div>
                        <?php } ?>
                    <?php
                    } ?>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade profile" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="profileForm" action="edit.php" method="POST">
                    <legend class="title-form">Profile</legend>
                    <div class="form-group register-form-group">
                        <label>Full Name</label>
                        <br>
                        <input type="text" value="<?= $_SESSION['current_user']['name'] ?>" name="fullname" class="form-control">
                        <div id="gender-group">
                            Male <input id="gender-male" type="radio" value="0" name="gender" checked> |
                            Female <input id="gender-female" type="radio" value="1" name="gender">
                        </div>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" value="<?= $_SESSION['current_user']['phone'] ?>" class="form-control">

                    </div>
                    <div class="form-group register-form-group">
                        <label>Email</label>
                        <input class="form-control" value="<?= $_SESSION['current_user']['email'] ?>" disabled>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?= $_SESSION['current_user']['address'] ?>" class="form-control">
                    </div>
                    <div class="form-group register-form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" value="<?= $_SESSION['current_user']['dob'] ?>" name="dob" type="date" placeholder="Birthdate" name="birthday">
                    </div>
                    <div class="form-group register-form-group">
                        <div class="button-group">
                            <button id="save-button" class="btn btn-primary">Save</button>
                            <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade cart-box" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <section class="container content-section">
                    <h2 style="text-align:center;border-bottom:1px solid black" class="section-header">CART</h2>
                    <table id="cartTable" style="width:100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <form action="send-order.php" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="offset-md-2 col-md-8 offset-md-2">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="offset-md-2 col-md-8 offset-md-2">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" pattern="^0[0-9]{9}$" name="phone" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn more black btn-purchase" type="submit">PURCHASE</button>
                    </form>

                </section>
            </div>
        </div>
    </div>
    <!--Cart Modal-->
    <!-- //page-subheader -->
    <div class="page-subheader">
        <div class="container">
            <div class="flex justify--between align--center">
                <div class="page-subheader__count">
                    Total:
                    <?php $totalProduct = mysqli_query($con, 'select count(*) from product');
                    echo mysqli_fetch_assoc($totalProduct)['count(*)'];
                    ?> products
                </div>
                <div class="filter-wrapper">
                    <label class="filter-wrapper__label select-label" for="SortBy">Sort by</label>
                    <select name="sort_by" id="SortBy" class="filter-wrapper__input" aria-describedby="a11y-refresh-page-message a11y-selection-message" data-default-sortby="manual" style="width: 93px;">
                        <option value="best-selling">Hot</option>
                        <option value="price" selected>Price</option>
                    </select>
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down" viewBox="0 0 498.98 284.49">
                        <path fill="currentColor" d="M80.93 271.76A35 35 0 0 1 140.68 247l189.74 189.75L520.16 247a35 35 0 1 1 49.5 49.5L355.17 511a35 35 0 0 1-49.5 0L91.18 296.5a34.89 34.89 0 0 1-10.25-24.74z" transform="translate(-80.93 -236.76)"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- //page-subheader -->
    <!-- /projects -->
    <?php
    $number_record = mysqli_query($con, "select * from product")->num_rows;
    $number_page = ceil($number_record / 9);
    $current_page = $_GET['page'];
    $limit = ($current_page - 1) * 9;
    $resultProduct = mysqli_query($con, 'select * from product order by price desc limit ' . $limit . ',9');

    ?>
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Our</span> Products</h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
                <?php
                while ($row = mysqli_fetch_assoc($resultProduct)) {
                    ?>
                    <div class="col-md-4 gal-img" data-toggle="modal" data-target="<?= '#product' . $row['id'] ?>">
                        <?php
                        $result_img = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " and avatar=1");
                        if ($result_img->num_rows == 0) {
                            $result_img = mysqli_query($con, "select * FROM product_images where productId=" . $row['id'] . " limit 1");
                        }
                        while ($row_images = mysqli_fetch_assoc($result_img)) {
                            ?>
                            <img src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">
                        <?php } ?>
                        <div class="gal-info">
                            <h5><?= $row['name'] ?><span class="decription"><?= number_format($row['price'], 0, '', '.') ?> VND</span></h5>
                        </div>
                    </div>
                    <div class="modal fade product-details" id="<?= 'product' . $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id="carousel<?php echo $row['id'] ?>" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php $result_images_slide = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " and avatar=1 order by avatar desc");
                                                    if ($result_images_slide->num_rows == 0) {
                                                        $result_images_slide = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " order by avatar desc limit 1 ");
                                                    }
                                                    while ($row_images = mysqli_fetch_assoc($result_images_slide)) { ?>
                                                        <div class="carousel-item active">
                                                            <img class="d-block w-100" src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">
                                                        </div>
                                                    <?php } ?>
                                                    <?php $result_images_slide = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " order by avatar desc limit 1,100 ");
                                                    while ($row_images = mysqli_fetch_assoc($result_images_slide)) { ?>
                                                        <div class="carousel-item">
                                                            <img class="d-block w-100" src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel<?php echo $row['id'] ?>" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel<?php echo $row['id'] ?>" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <h4>Rating Point</h4>
                                                <?php 
                                                    $sum=0;
                                                    $result_rating= mysqli_query($con,"select * from rating_product where idProduct=".$row['id']);
                                                    while ($row_rating=mysqli_fetch_assoc($result_rating)){
                                                        $sum+=$row_rating['rating'];
                                                    }
                                                    if ($result_rating->num_rows==0){
                                                        echo '<h5 style="color:golden !important">No Point<h5>';
                                                    }
                                                    else
                                                    echo '<h5 style="color:golden !important">'.$sum/($result_rating->num_rows).'<h5>';
                                                ?>
                                            </div>
                                            <i style="font-size:30px; color:green" id="<?= $row['id'] ?>s1" class="fa fa-star s1"></i>
                                            <i style="font-size:30px; color:green" id="<?= $row['id'] ?>s2" class="fa fa-star s2"></i>
                                            <i style="font-size:30px; color:green" id="<?= $row['id'] ?>s3" class="fa fa-star s3 "></i>
                                            <i style="font-size:30px; color:green" id="<?= $row['id'] ?>s4" class="fa fa-star s4 "></i>
                                            <i style="font-size:30px; color:green" id="<?= $row['id'] ?>s5" class="fa fa-star s5"></i>
                                            <br>
                                            <button class="btn btn-warning submit-rating" id="ratingg<?= $row['id'] ?>">Rate</button>
                                            <span class="announce-rating"></span>
                                        </div>
                                        <div class="col-md-7">
                                            <h3 class="h1 product-single__title">
                                                <?= $row['name'] ?>
                                            </h3>
                                            <div class="product-single__price">
                                                <div class="product-price">
                                                    <span class="cart-price">
                                                        <u><?= number_format($row['price'], 0, '', '.') ?> VND</u>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="description-product"><?= $row['description'] ?>
                                            </div>
                                            <div class="button-quantity">
                                                <button id="add<?= $row['id'] ?>" class="btn more black add-to-card">Add To Cart</button>
                                                <input id="quan<?= $row['id'] ?>" type="number" value="1" min="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>
            <div class="pagination" style="display:block;text-align:center">
                <a href="product-price.php?page=1"><button><i class="fa fa-step-backward"></i></button></a>
                <?php

                for ($i = 1; $i <= $number_page; $i++) {
                    ?>
                    <a href="product-price.php?page=<?= $i ?>"><button><?= $i ?></button></a>
                <?php
                } ?>
                <a href="product-price.php?page=<?= $number_page ?>"><button><i class="fa fa-step-forward"></i></button></a>

            </div>
        </div>
    </section>
    <!-- //projects -->
    <!-- /news-letter -->
    <!-- <section class="news-letter-w3pvt py-5">
        <div class="container contact-form mx-auto text-left">
            <h3 class="title-w3ls two text-left mb-3">Newsletter </h3>
            <form method="post" action="#" class="w3ls-frm">
                <div class="row subscribe-sec">
                    <p class="news-para col-lg-3">Want Some Discount ?</p>
                    <div class="col-lg-6 con-gd">
                        <input type="email" class="form-control" id="email-letter" placeholder="Your Email here..." name="email" required>

                    </div>
                    <div class="col-lg-3 con-gd">
                        <button type="submit" class="btn submit">Subscribe</button>
                    </div>

                </div>

            </form>
        </div>
    </section> -->
    <!-- //news-letter -->

    <!-- footer -->
    <footer class="py-lg-5 py-4">
        <div class="container py-sm-3">
            <div class="row footer-grids">
                <div class="col-lg-4 mt-4">

                    <h2> <a class="navbar-brand px-0 mx-0 mb-4" href="index.php">OWEN HOUSE
                        </a>
                    </h2>
                    <p class="mb-3">Olwen House Spa has affirmed its brand when reaching the Top 3 "Brands, Prestigious Quality and Fat Reduction Services in 2017". The award was awarded by the Vietnam Business Development Union in collaboration with the Intellectual Property Development Center - Intellectual Property Department - Ministry of Science and Technology.</p>

                    <div class="icon-social mt-4">
                        <a href="#" class="button-footr">
                            <span class="fa mx-2 fa-facebook"></span>
                        </a>
                        <a href="#" class="button-footr">
                            <span class="fa mx-2 fa-instagram"></span>
                        </a>
                        <a href="#" class="button-footr">
                            <span class="fa mx-2 fa-google-plus"></span>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 mt-4 ">
                    <h4 class="mb-4 ml-5">Quick Links</h4>
                    <div class="links-wthree d-flex">
                        <ul class="list-info-wthree ml-5">
                            <li>
                                <a href="index.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="single.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Single Page
                                </a>
                            </li>
                            <li>
                                <a href="team.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Team
                                </a>
                            </li>
                            <li>
                                <a href="contact.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 ad-info">
                    <h4 class="mb-4">Contact Info</h4>
                    <p><span class="fa fa-map-marker"></span>FPT-Aptech Computer Education HCM, Cách Mạng Tháng 8,
                        phường 11, Quận 3, Hồ Chí Minh</span></p>
                    <p class="phone"><span class="fa fa-phone"></span> 0908663101</p>
                    <p class="phone"><span class="fa fa-fax"></span> 0908663101</p>
                    <p><span class="fa fa-envelope"></span><a href="mailto:letuyettrinh10c12@gmail.comm">letuyettrinh10c12@gmail.com</a></p>
                </div>

            </div>
        </div>
    </footer>
    <div class="modal fade add-success-box" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">

                <div class="noti" style="font-size:20px;">Item has been added to cart</div>
                <div class="button-group button-group-cart">
                    <button class="btn btn-info" data-dismiss="modal">Continue To Shopping</button>
                    <button class="btn btn-info go-to-card" data-dismiss="modal">Go To Cart</button>
                </div>
            </div>
        </div>
    </div>
    <!-- //footer -->
    <!-- copyright -->
    <div class="copy_right p-3 d-flex">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 copy_w3pvt">
                    <p class="text-lg-left text-center">© 2019 Owen House. All rights reserved

                </div>
                <!-- move top -->
                <div class="col-lg-3 move-top text-lg-right text-center">
                    <a href="#home" class="move-top">
                        <span class="fa fa-angle-double-up mt-3" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- move top -->
            </div>
        </div>

    </div>
    <!-- //copyright -->
    <?php
    if (isset($_SESSION['current_user'])) {
        ?>
        <script>
            $('#logout-button, #profile-button, #orders-button').css('display', 'block');
            $('#name-after-login').html('<?= $_SESSION['current_user']['name'] != '' ? $_SESSION['current_user']['name'] : $_SESSION['current_user']['id'] ?> <span class="fa fa-angle-down" aria-hidden="true"></span>')
            $('#register-button, #signin-button').css('display', 'none');
        </script>
    <?php
    }
    if (isset($_SESSION['current_user']) && $_SESSION['current_user']['gender'] == 0) {
        ?>
        <script>
            $('#gender-male').prop('checked', true);
            $('#gender-female').prop('checked', false);
        </script>
    <?php
    } else {

        ?> <script>
            $('#gender-male').prop('checked', false);
            $('#gender-female').prop('checked', true);
        </script>
    <?php }
    ?>

    <script>
        var flag = new Array(true, true, true, true, true);
        var countItem;
        $(document).ready(function() {

            $('#username').keyup(function() {
                $.ajax({
                    url: "validateRegister/usernameRegister.php",
                    type: 'post',
                    data: {
                        id: $('#username').val()
                    },
                    success: function(result) {
                        if (result != '') {
                            $('.warning-username').css("display", "block");
                            $('.warning-username').html(result);
                            flag[0] = false;
                        } else {
                            $('.warning-username').css("display", "none");
                            $('.warning-username').html('result');
                            flag[0] = true;
                        }
                    }
                });
            });
            $('#cart-button').click(function() {
                <?php
                if (!isset($_SESSION['current_user']) && !isset($_SESSION['cart'])) {
                    ?>
                    $('.login-form').modal('show');
                <?php
                } else
                if (isset($_SESSION['current_user']) && isset($_SESSION['cart'])) {
                    ?>
                    $('.fa-shopping-cart').click(function() {
                        var htmlAdd;
                        $.ajax({
                            url: "sessionCart.php",
                            dataType: "json",
                            type: "post",
                            success: function(e) {
                                var count = 0;
                                for (var c in e) {
                                    count++;
                                }
                                var total = 0;
                                for ($i = 0; $i < count; $i++) {
                                    htmlAdd += '<tr id="row' + e[Object.keys(e)[$i]].id + '">';
                                    htmlAdd += '<td>';
                                    htmlAdd += '<img src="images/' + e[Object.keys(e)[$i]].image + '" alt="">';
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += e[Object.keys(e)[$i]].name;
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += e[Object.keys(e)[$i]].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += e[Object.keys(e)[$i]].quantity;
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += (e[Object.keys(e)[$i]].quantity * e[Object.keys(e)[$i]].price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += '<a href="#" id="item' + e[Object.keys(e)[$i]].id + '" class="delete-cart"" ><i style="font-size:25px; color:slategray" class="fa fa-trash"></i></a>'
                                    htmlAdd += '</td>';
                                    htmlAdd += '</tr>';
                                    total += (e[Object.keys(e)[$i]].quantity * e[Object.keys(e)[$i]].price);
                                }
                                htmlAdd += '<tr>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td  class="total">';
                                htmlAdd += '<hr>';
                                htmlAdd += total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '</tr>';
                                $('#cartTable tbody').html(htmlAdd);
                                $('#quantity-product').html(count);
                            }
                        })
                        $(".cart-box").modal('show');
                    })
                <?php
                } else {
                    ?>

                <?php
                }
                ?>
            })
            var passrex = /^[a-z0-9_-]{6,18}$/;
            $('#password-register').keyup(function() {
                if (!passrex.test($('#password-register').val())) {
                    $('.warning-pass').css("display", "block");
                    flag[1] = false;
                } else {
                    $('.warning-pass').css("display", "none");
                    flag[1] = true;
                }
            });

            $('#re-password-register').keyup(function() {
                if ($('#password-register').val() != $('#re-password-register').val()) {
                    $('.warning-repass').css("display", "block");
                    flag[2] = false;
                } else {
                    $('.warning-repass').css("display", "none");
                    flag[2] = true;
                }
            });

            var emailrex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            $('#email').keyup(function() {
                if (!emailrex.test($('#email').val())) {
                    $('.warning-email').css("display", "block");
                    flag[4] = false;
                } else {
                    $('.warning-email').css("display", "none");
                    flag[4] = true;
                }
                if ($('#email').val() == '') {
                    flag[4] = true;
                    $('.warning-email').css("display", "none");
                }
            });
            $('#email').keyup(function() {
                $.ajax({
                    url: "validateRegister/emailRegister.php",
                    type: 'post',
                    data: {
                        email: $('#email').val()
                    },
                    success: function(result) {
                        if (result != '') {
                            $('.warning-email').css("display", "block");
                            $('.warning-email').html(result);
                            flag[5] = false;
                        } else {
                            $('.warning-email').css("display", "none");
                            $('.warning-email').html(result);
                            flag[5] = true;
                        }
                    }
                });
            });
            $('#registerForm').submit(function(e) {
                if (flag[1] && flag[2] && flag[0] && flag[4] && flag[5]) {
                    return true;
                } else {
                    e.preventDefault();
                }
            });
            var choosen_star;
            $('.fa-star').hover(function() {
                for (var i = 1; i <= 5; i++) {
                    $('.s' + i).css("color", "green")
                }
                index = $(this).attr("class").substring(12);
                for (var i = 1; i <= index; i++) {
                    $('.s' + i).css("color", "yellow")
                }
                choosen_star=index;
            })
            $('.fa-star').click(function() {
                for (var i = 1; i <= 5; i++) {
                    $('.s' + i).css("color", "green")
                }
                index = $(this).attr("class").substring(12);
                for (var i = 1; i <= index; i++) {
                    $('.s' + i).css("color", "yellow")
                }
                choosen_star=index;
            })


            $('#submit-login').click(function() {
                $.ajax({
                    url: "login.php",
                    type: 'post',
                    data: {
                        id: $('#id-login').val(),
                        password: $('#password-login').val()
                    },
                    success: function(result) {
                        if (result != '') {
                            $('.warning-login').css("display", "block");
                            $('.warning-login').html(result);
                        } else {
                            location.reload();
                        }
                    }
                });
            });
            $('#register-button-directive').click(function() {
                $('.login-form').modal('hide');
                $('.register').modal('show');
            })
            $('.add-to-card').click(function() {
                $('.product-details').modal('hide');
                var productId = $(this).attr("id");
                productId = productId.substring(3);
                var quantity = $(this).next().val();
                var htmlAdd;
                $.ajax({
                    url: "cart.php",
                    dataType: "json",
                    data: {
                        id: productId,
                        quantity: quantity
                    },
                    type: "post",

                    success: function(e) {
                        var count = 0;
                        for (var c in e) {
                            count++;
                        }
                        var total = 0;
                        for ($i = 0; $i < count; $i++) {
                            htmlAdd += '<tr id="row' + e[Object.keys(e)[$i]].id + '">';
                            htmlAdd += '<td>';
                            htmlAdd += '<img src="images/' + e[Object.keys(e)[$i]].image + '" alt="">';
                            htmlAdd += '</td>';
                            htmlAdd += '<td>';
                            htmlAdd += e[Object.keys(e)[$i]].name;
                            htmlAdd += '</td>';
                            htmlAdd += '<td>';
                            htmlAdd += e[Object.keys(e)[$i]].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            htmlAdd += '</td>';
                            htmlAdd += '<td>';
                            htmlAdd += e[Object.keys(e)[$i]].quantity;
                            htmlAdd += '</td>';
                            htmlAdd += '<td>';
                            htmlAdd += (e[Object.keys(e)[$i]].quantity * e[Object.keys(e)[$i]].price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            htmlAdd += '</td>';
                            htmlAdd += '<td>';
                            htmlAdd += '<a href="#" id="item' + e[Object.keys(e)[$i]].id + '" class="delete-cart"" ><i style="font-size:25px; color:slategray" class="fa fa-trash"></i></a>'
                            htmlAdd += '</td>';
                            htmlAdd += '</tr>';
                            total += (e[Object.keys(e)[$i]].quantity * e[Object.keys(e)[$i]].price);
                        }
                        htmlAdd += '<tr>';
                        htmlAdd += '<td>';
                        htmlAdd += '</td>';
                        htmlAdd += '<td>';
                        htmlAdd += '</td>';
                        htmlAdd += '<td>';
                        htmlAdd += '</td>';
                        htmlAdd += '<td>';
                        htmlAdd += '</td>';
                        htmlAdd += '<td class="total">';
                        htmlAdd += '<hr>';
                        htmlAdd += total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        htmlAdd += '</td>';
                        htmlAdd += '<td>';
                        htmlAdd += '</td>';
                        htmlAdd += '</tr>';
                        $('#cartTable tbody').html(htmlAdd);
                        $('#quantity-product').html(count);
                    }
                })
                $(".add-success-box").modal('show');
            })
            $('.go-to-card').click(function() {
                <?php
                if (!isset($_SESSION['current_user'])) {
                    ?>
                    $('.login-form').modal('show');
                <?php
                } else {
                    ?>
                    $('.cart-box').modal('show');
                <?php } ?>
            });
            $('select').change(function() {
                if ($(this).val() == "best-selling") {
                    window.location.href = "product.php?page=1";
                } else if ($(this).val() == "price") {
                    window.location.href = "product-price.php?page=1";
                }
            })
            $(".submit-rating").click(function() {
                <?php
                if (!isset($_SESSION['current_user'])) {
                    ?>
                    $('.product-details').modal('hide');
                    $('.login-form').modal('show');
                <?php
                } else {
                    ?>
                    var idProduct=($(this).attr("id")).substring(7);
                    $.ajax({
                        url:"sendRating.php",
                        data:{
                            index:choosen_star,
                            idProduct:idProduct
                        },
                        type:"post",
                        success: function(e){
                            $(".announce-rating").html("<br>"+e);
                        }
                    })
                    <?php
                }
                ?>
                
            })
            $('body').on("click", ".delete-cart", function() {
                var idItem = $(this).attr("id");
                var htmlTotal = "";
                idItem = idItem.substring(4);
                $("#row" + idItem).css("display", "none");
                $.ajax({
                    url: "delete-item-cart.php",
                    data: {
                        idItem: idItem
                    },
                    type: "post",
                    success: function(e) {
                        htmlTotal += '<hr>';
                        htmlTotal += e.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        $('.total').html(htmlTotal);
                        count = $("#quantity-product").html();
                        console.log(--count);
                        $("#quantity-product").html(count--);
                    }
                })
            })

        });
    </script>
</body>

</html>