<?php
$currentDate = date('l, F j, Y');

// Include database connection
include('./dbconnect.php');

// Fetch news data from the database
$newsQuery = "SELECT n.news_id, n.title, n.content, n.author, n.newsdate, n.newsimage, c.category_name 
              FROM news n
              INNER JOIN categories c ON n.category_id = c.category_id";
$newsStmt = $conn->prepare($newsQuery);
$newsStmt->execute();
$newsRows = $newsStmt->fetchAll();

$categoryQuery = "SELECT category_id, category_name FROM categories";
$categoryStmt = $conn->prepare($categoryQuery);
$categoryStmt->execute();
$categories = $categoryStmt->fetchAll();

// Function to sanitize user input
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

// Function to format news date
function formatNewsDate($date) {
    return date('M d, Y', strtotime($date));
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BizNews - Free News Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid d-none d-lg-block">
        <div class="row align-items-center bg-dark px-lg-5">
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-n2">
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#"><?php echo $currentDate; ?></a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Advertise</a>
                        </li>
                        <li class="nav-item border-right border-secondary">
                            <a class="nav-link text-body small" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body small" href="#">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 text-right d-none d-md-block">
                <nav class="navbar navbar-expand-sm bg-dark p-0">
                    <ul class="navbar-nav ml-auto mr-n2">
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-twitter"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-facebook-f"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-linkedin-in"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-instagram"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-google-plus-g"></small></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-body" href="#"><small class="fab fa-youtube"></small></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row align-items-center bg-white py-3 px-lg-5">
            <div class="col-lg-4">
                <a href="index.php" class="navbar-brand p-0 d-none d-lg-block">
                    <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-secondary font-weight-normal">News</span></h1>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <a href="https://htmlcodex.com"><img class="img-fluid" src="img/ads-728x90.png" alt=""></a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
            <a href="index.php" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-4 text-uppercase text-primary">Biz<span class="text-white font-weight-normal">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="category.php" class="nav-item nav-link">Category</a>
                    <a href="single.php" class="nav-item nav-link">Single News</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="#" class="dropdown-item">Menu item 1</a>
                            <a href="#" class="dropdown-item">Menu item 2</a>
                            <a href="#" class="dropdown-item">Menu item 3</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="text" class="form-control border-0" placeholder="Keyword">
                    <div class="input-group-append">
                        <button class="input-group-text bg-primary text-dark border-0 px-3"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


   

    >

<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Category</h4>
                            <a class="btn btn-primary float-right" href="category.php">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php foreach (array_slice($newsRows, 0, 2) as $row) { ?>
                        <div class="col-md-6">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="./img/<?php echo $row['newsimage']; ?>" style="object-fit: cover; height: 435px;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <?php if (isset($row['category_name'])) { ?>
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <?php } ?>
                                        <a class="text-white" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

            

                    
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>

                        <?php foreach (array_slice($newsRows, 0, 2) as $row) { ?>
                        <div class="col-md-6">
                            <div class="position-relative mb-4">
                                <img class="img-fluid w-100" src="./img/<?php echo $row['newsimage']; ?>" style="object-fit: cover; height: 435px;">
                                <div class="overlay">
                                    <div class="mb-2">
                                        <?php if (isset($row['category_name'])) { ?>
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <?php } ?>
                                        <a class="text-white" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-lg-6">
                            <?php foreach (array_slice($newsRows, 0, 2) as $row) { ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="./img/<?php echo $row['newsimage']; ?>" style="width:110px; height:110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                    <?php if (isset($row['category_name'])) { ?>
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <?php } ?>
                                        <a class="text-body" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?>...</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-6">
                            <?php foreach (array_slice($newsRows, 0, 2) as $row) { ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="./img/<?php echo $row['newsimage']; ?>" style="width:110px; height:110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                    <?php if (isset($row['category_name'])) { ?>
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <?php } ?>
                                        <a class="text-body" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?>...</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                    <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100"  src="img/ads-728x90.png" alt=""></a>
                        </div>

                        <?php $selectedNews = $newsRows[1]; ?>
                        <div class="col-lg-12">
                            <div class="row news-lg mx-0 mb-3">
                                <div class="col-md-6 h-100 px-0">
                                    <img class="img-fluid h-100" src="./img/<?php echo $selectedNews['newsimage']; ?>" style="object-fit: cover; width:700px; height:435px;">
                                </div>
                                <div class="col-md-6 d-flex flex-column border bg-white h-100 px-0">
                                    <div class="mt-auto p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href="category.php?category_id={$category['category_id']}"><?php echo $selectedNews['category_name']; ?></a>
                                            <a class="text-body" href=""><small><?php echo formatNewsDate($selectedNews['newsdate']); ?></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="single.php?id={$selectedNews['news_id']}"><?php echo $selectedNews['title']; ?>...</a>
                                        <p class="m-0"><?php echo $selectedNews['content']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                            <small><?php echo $selectedNews['author']; ?></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-6">
                            <?php foreach (array_slice($newsRows, 0, 2) as $row) { ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="./img/<?php echo $row['newsimage']; ?>" style="width:110px; height:110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                    <?php if (isset($row['category_name'])) { ?>
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <?php } ?>
                                        <a class="text-body" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?>...</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-6">
                            <?php foreach (array_slice($newsRows, 0, 2) as $row) { ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="./img/<?php echo $row['newsimage']; ?>" style="width:110px; height:110px;" alt="">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                    <?php if (isset($row['category_name'])) { ?>
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <?php } ?>
                                        <a class="text-body" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?>...</a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-728x90.png" alt=""></a>
                        </div>
                </div>
            </div>


            

            <div class="col-lg-4">
                <!-- Social Follow Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                    <div class="bg-white border border-top-0 p-3">
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                                <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Fans</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                                <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                                <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Connects</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                                <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                                <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Subscribers</span>
                            </a>
                            <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                                <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                                <span class="font-weight-medium">12,345 Followers</span>
                            </a>
                        </div>
                    </div>
                    <!-- Social Follow End -->

                    <!-- Ads Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Advertisement</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <a href=""><img class="img-fluid" src="img/news-800x500-2.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- Ads End -->

                    


                <!-- Popular News Start -->
 <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                        <?php foreach ($newsRows as $row) { ?>
                            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                <img class="img-fluid" src="./img/<?php echo $row['newsimage']; ?>" alt="" style="width: 110px; height: 110px;">
                                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $row['category_name']; ?></a>
                                        <a class="text-body" href=""><small><?php echo formatNewsDate($row['newsdate']); ?></small></a>
                                    </div>
                                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="single.php?id={$row['news_id']}"><?php echo $row['title']; ?></a>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Popular News End -->

                <!-- Newsletter Start -->
 <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
                        </div>
                        <div class="bg-white text-center border border-top-0 p-3">
                            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
                            <div class="input-group mb-2" style="width: 100%;">
                                <input type="text" class="form-control form-control-lg" placeholder="Your Email">
                                <div class="input-group-append">
                                    <button class="btn btn-primary font-weight-bold px-3">Sign Up</button>
                                </div>
                            </div>
                            <small>Lorem ipsum dolor sit amet elit</small>
                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- News With Sidebar start -->
                <div class="row">
                <div class="mb-3">
                <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Categories</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                        <div class="d-flex flex-wrap m-n1">

                            <?php foreach ($categories as $category) { ?>
                                <a href="category.php?category_id={$category['category_id']}" class="btn btn-sm btn-outline-secondary m-1"><?php echo $category['category_name']; ?></a>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                    <!-- News With Sidebar end -->

            </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->
</div>
</div>

 

    <!-- Footer Start -->
    <div class="container-fluid bg-dark pt-5 px-sm-3 px-md-5 mt-5">
        <div class="row py-4">
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Get In Touch</h5>
                <p class="font-weight-medium"><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p class="font-weight-medium"><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p class="font-weight-medium"><i class="fa fa-envelope mr-2"></i>info@example.com</p>
                <h6 class="mt-4 mb-3 text-white text-uppercase font-weight-bold">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square mr-2" href="#"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-lg btn-secondary btn-lg-square" href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 mb-5">
    <h5 class="mb-4 text-white text-uppercase font-weight-bold">Popular News</h5>

    <?php foreach ($newsRows as $newsItem): ?>
        <div class="mb-3">
            <div class="mb-2">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $newsItem['category_name']; ?></a>
                <a class="text-body" href=""><small><?php echo formatNewsDate($newsItem['newsdate']); ?></small></a>
            </div>
            <a class="small text-body text-uppercase font-weight-medium" href="single.php?id={$row['news_id']}"><?php echo $newsItem['title']; ?></a>
        </div>
    <?php endforeach; ?>

    <?php if (!empty($newsRows)): ?>
        <div class="mb-3">
            <div class="mb-2">
                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="category.php?category_id={$category['category_id']}"><?php echo $newsRows[count($newsRows) - 1]['category_name']; ?></a>
                <a class="text-body" href=""><small><?php echo formatNewsDate($newsRows[count($newsRows) - 1]['newsdate']); ?></small></a>
            </div>
            <a class="small text-body text-uppercase font-weight-medium" href="single.php?id={$row['news_id']}"><?php echo $newsRows[count($newsRows) - 1]['title']; ?></a>
        </div>
    <?php endif; ?>
</div>


            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Categories</h5>
                <div class="m-n1">

                <?php foreach ($categories as $category): ?>

                    <a href="category.php?category_id={$category['category_id']}" class="btn btn-sm btn-secondary m-1" value='<?php echo $category["category_id"]; ?>'><?php echo $category["category_name"]; ?></a>
                    <?php endforeach; ?>

            
                </div>

            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="mb-4 text-white text-uppercase font-weight-bold">Flickr Photos</h5>
                <div class="row">
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-2.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-3.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-4.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-5.jpg" alt=""></a>
                    </div>
                    <div class="col-4 mb-3">
                        <a href=""><img class="w-100" src="img/news-110x110-1.jpg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5" style="background: #111111;">
        <p class="m-0 text-center">&copy; <a href="#">Your Site Name</a>. All Rights Reserved. 
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
		Design by <a href="https://htmlcodex.com">HTML Codex</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>