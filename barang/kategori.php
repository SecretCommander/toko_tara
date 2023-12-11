<?php
include('koneksi.php');
include('function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Toko Tara</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


</head>

<body>

    <!-- /HEADER -->
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-seller"></i> Mulai Berjualan</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-dollar"></i> Bantuan</a></li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="./img/tara.png" alt="" width="250px">
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                        <form action="search.php" method="POST">
                                <input class="input" name="keyword" placeholder="Search here" autocomplete="on">
                                <button class="search-btn" name="cari">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->
                            <div>
                                <a href="#">
                                    <i class="fa fa-bell"></i>
                                    <span>Notifikasi</span>
                                    <div class="qty">2</div>
                                </a>
                            </div>
                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="qty">3</div>
                                </a>
                                <!-- STOP -->
                                <div class="cart-dropdown">
                                    <div class="cart-list">
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/basreng.jpeg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">Basreng Tara Origin</a></h3>
                                                <h4 class="product-price"><span class="qty">1x</span>Rp.15,000.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>

                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="./img/basreng.jpeg" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">Basreng Tara Pedas</a></h3>
                                                <h4 class="product-price"><span class="qty">3x</span>Rp.5,000.00</h4>
                                            </div>
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                        </div>
                                    </div>
                                    <div class="cart-summary">
                                        <small>2 Item(s) selected</small>
                                        <h5>SUBTOTAL: Rp.60,000.00</h5>
                                    </div>
                                    <div class="cart-btns">
                                        <a href="#">View Cart</a>
                                        <a href="checkout.html">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <?php
                    $sql = "SELECT DISTINCT kategori_produk FROM barang";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        // Create an array to store the categories
                        $menuItems = array();
                    
                        // Fetch data and store it in the $menuItems array
                        while ($row = mysqli_fetch_assoc($result)) {
                            $menuItems[] = $row['kategori_produk'];
                        }
                        foreach ($menuItems as $item) {
                            echo '<li><a href="kategori.php?K='.$item.'">' . $item . '</a></li>';
                        }
                    }
                    
                ?>
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->

    <!-- NAVIGATION -->
    <!-- /NAVIGATION -->

    <!-- SECTION -->
    <!-- <div class="section"> -->

    <!-- /container -->
    </div>
    <!-- /SECTION -->

    <div id="carouselExampleIndicators" class="carousel slide">
        <!-- <div class="carousel-indicators ">
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active "
				aria-current="true" aria-label="Slide 1"></button>
		</div> -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/banner.jpeg" class="d-block " width="97%" style="margin-top: 20px; margin-bottom: 15px;"
                    alt="..."> </center>
            </div>

            <!-- SECTION -->
            <div class="section">
                <!-- container -->
                <div class="container">
                    <!-- row -->
                    <div class="row">

                        <!-- section title -->
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title">Kategori Barang</h3>
                            </div>
                        </div>
                        <!-- /section title -->

                        <!-- Products tab & slick -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="products-tabs">
                                    <!-- tab -->
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/food-delivery (1).png" alt=""
                                                        style="margin: 0 auto; margin-top: 25px;">
                                                    <div class="product-label">
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="kategori.php?K=MAKANAN">Makanan</a></h3>
                                                </div>
                                            </div>
                                            <!-- /product -->

                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/functional-food-beverages.png" alt=""
                                                        style="margin: 0 auto; margin-top: 25px">
                                                    <div class="product-label">
                                                    </div>
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="kategori.php?K=MINUMAN">Minuman</a></h3>
                                                </div>
                                            </div>
                                            <!-- /product -->

                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/polo-shirt.png" alt=""
                                                        style="margin: 0 auto; margin-top: 25px">
                                                    <div class="product-label">
                                                    </div>
                                                </div>
                                                <div class="product-body">

                                                    <h3 class="product-name"><a href="kategori.php?K=PAKAIAN">Baju</a></h3>
                                                </div>

                                            </div>
                                            <!-- /product -->

                                            <!-- product -->
                                            <div class="product">
                                                <div class="product-img">
                                                    <img src="./img/jeans.png" alt=""
                                                        style="margin: 0 auto; margin-top: 25px">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a href="kategori.php?K=PAKAIAN">Celana</a></h3>

                                                </div>
                                                <!-- /product -->
                                            </div>
                                            <div id="slick-nav-1" class="products-slick-nav"></div>
                                        </div>
                                        <!-- /tab -->
                                    </div>
                                </div>
                            </div>
                            <!-- Products tab & slick -->
                        </div>
                        <div class="col-md-12">
                            <div class="section-title">
                                <h3 class="title"><?php echo (!isset($_GET['K']) || $_GET['K'] === '') ? "<script>window.location.href = 'index.php';</script>" : "Kategori : ".$_GET['K'] ; ?></h3>
                            </div>
                        </div>
                        <?php
    //memanggi function
    $result = kategorize($_GET['K']);

	while ($row = mysqli_fetch_array($result)) {
		echo '<div class="col-md-3 col-xs-6">';
        echo '<div class="product">';
        echo '<div class="product-img1">';
        echo '<img src="./../seller-dashboard/html/imgbarang/' . $row['foto_produk'] . '" alt="' . $row['nama_produk'] . '" style="width:100%;height:250px;" ">';
        echo '<div class="product-label"></div>';
        echo '</div>';
        echo '<div class="product-body">';
        echo '<p class="product-category">' . $row['kategori_produk'] . '</p>';
        echo '<h3 class="product-name"><a href="#">' . $row['nama_produk'] . '</a></h3>';
        echo '<h4 class="product-price">Rp. ' . $row['harga_produk'] . ' <del class="product-old-price"></del></h4>';
        echo '<div class="product-rating">';
        // Add your rating logic here
        echo '</div>';
        echo '<div class="product-btns">';
        echo '<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>';
        echo '<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>';
        echo '<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>';
        echo '</div>';
        echo '</div>';
        echo '<div class="add-to-cart">';
        echo '<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

	}
	echo "<br>";
	//free result
	mysqli_free_result($result);
	//namun jika tidak lebih besar dari pada > 0 atau tidak ditemukan data maka jalan perintah berikut

    ?>
                        <!-- product -->

                        <!-- /SECTION -->


                    </div>
                        <!-- SECTION -->
                        <div class="section">
                            <!-- container -->
                            <div class="container">
                                <!-- row -->
                                <div class="row">

                                    <!-- section title -->
                                    <div class="col-md-12">
                                        <div class="section-title">
                                            <h3 class="title">Mari Belanja Di Toko Tara</h3>
                                            <div class="section-nav">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /section title -->
                                    <div class="row justify-content-between">

                                        <!-- Products tab & slick -->
                                        <img src="./img/Murah.jpeg" width="500px" height="300px" alt="" class="tes"
                                            class="ml-5">
                                        <img src="./img/putih.jpg" width="120px" height="100px" alt="" class="tes">
                                        <img src="./img/sale.jpeg" width="500px" height="300px" alt="" class="tes">

                                        <!-- product -->

                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /container -->
                            </div>
                            <!-- /SECTION -->
                            <br>
                            <br>
                            <br>
                            <!-- FOOTER -->
                            <footer id="footer">
                                <!-- top footer -->
                                <div class="section">
                                    <!-- container -->
                                    <div class="container">
                                        <!-- row -->
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6">
                                                <div class="footer">
                                                    <h3 class="footer-title">About Us</h3>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                        eiusmod tempor incididunt ut.</p>
                                                    <ul class="footer-links">
                                                        <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal
                                                                Road</a></li>
                                                        <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a>
                                                        </li>
                                                        <li><a href="#"><i
                                                                    class="fa fa-envelope-o"></i>email@email.com</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-6">
                                                <div class="footer">
                                                    <h3 class="footer-title">Categories</h3>
                                                    <ul class="footer-links">
                                                        <li><a href="#">Hot deals</a></li>
                                                        <li><a href="#">Laptops</a></li>
                                                        <li><a href="#">Smartphones</a></li>
                                                        <li><a href="#">Cameras</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="clearfix visible-xs"></div>

                                            <div class="col-md-3 col-xs-6">
                                                <div class="footer">
                                                    <h3 class="footer-title">Information</h3>
                                                    <ul class="footer-links">
                                                        <li><a href="#">About Us</a></li>
                                                        <li><a href="#">Contact Us</a></li>
                                                        <li><a href="#">Privacy Policy</a></li>
                                                        <li><a href="#">Orders and Returns</a></li>
                                                        <li><a href="#">Terms & Conditions</a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-3 col-xs-6">
                                                <div class="footer">
                                                    <h3 class="footer-title">Service</h3>
                                                    <ul class="footer-links">
                                                        <li><a href="#">My Account</a></li>
                                                        <li><a href="#">View Cart</a></li>
                                                        <li><a href="#">Wishlist</a></li>
                                                        <li><a href="#">Track My Order</a></li>
                                                        <li><a href="#">Help</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /container -->
                                </div>
                                <!-- /top footer -->


                                <!-- bottom footer -->
                                <div id="bottom-footer" class="section">
                                    <div class="container">
                                        <!-- row -->
                                        <div class="row">
                                            <div class="col-md-12 text-center">

                                                <span class="copyright">
                                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                                    Copyright &copy;
                                                    <script>
                                                    document.write(new Date().getFullYear());
                                                    </script>
                                                    Toko Tara| Toko UMKM yang menjual makanan Nusantara</i>
                                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                                </span>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                    <!-- /container -->
                                </div>
                                <!-- /bottom footer -->
                            </footer>
                            <!-- /FOOTER -->

                            <!-- jQuery Plugins -->
                            <script src="js/jquery.min.js"></script>
                            <script src="js/bootstrap.min.js"></script>
                            <script src="js/slick.min.js"></script>
                            <script src="js/nouislider.min.js"></script>
                            <script src="js/jquery.zoom.min.js"></script>
                            <script src="js/main.js"></script>

</body>

</html>