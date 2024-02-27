<?php
session_start();
$path = $_SERVER['DOCUMENT_ROOT'];
$path_dbcon = $path."/p-commerce/admin/config/dbcon.php";
include $path_dbcon;
$row = selectFromDatabase('settings');
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="<?php echo $row['settings_keywords'];?>" />
    <meta name="description" content="<?php echo $row['settings_description'];?>" />

    <title><?php echo $row['settings_sitename'];?></title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- assets/css/style.min.css -->

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>


</head>

<body>
    <!-- Start Header Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--tree section-fluid sticky-header sticky-color--tree">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Header Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/images/logo/logo_black.png" alt="Mağaza Logosu"></a>
                                </div>
                            </div>
                            <!-- End Header Logo -->

                            <!-- Start Header Main Menu -->
                            <div class="main-menu menu-color--black menu-hover-color--golden">
                                <nav>
                                    <ul>
                                        <li>
                                            <a class="main-menu-link" href="index.php">Ana Sayfa</a>
                                        </li>
                                        <li class="has-dropdown has-megaitem">
                                            <a href="shop-full-width.php">Alışveriş <i
                                                    class="fa fa-angle-down"></i></a>
                                            <!-- Mega Menu -->
                                            <div class="mega-menu">
                                                <ul class="mega-menu-inner">
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="categories_list.php" class="mega-menu-item-title">Kategoriler</a>
                                                        <ul class="mega-menu-sub">
                                                            <?php
                                                                $categories = get_all_active('categories');

                                                                if (mysqli_num_rows($categories) > 0){
                                                                    foreach ($categories as $item){
                                                                        ?>

                                                            
                                                                        <li><a href="shop-full-width.php?category=<?=$item['categories_slug'];?>"><?= $item['category_name']; ?></a></li>
                                                        
                                                                    <?php
                                                                     }
                                                                 }  
                                                                 ?>
                                                        </ul>

                                                    </li>
                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#" class="mega-menu-item-title">Önemli</a>
                                                        <ul class="mega-menu-sub">
                                                          
                                                            <li><a href="#">Neden Biz</a></li>
                                                            <li><a href="#">Teslimat</a></li>
                                                            <li><a href="#">İade Politikası</a></li>
                                                        
                                                        </ul>

                                                    </li>

                                                    <!-- Mega Menu Sub Link -->
                                                    <li class="mega-menu-item">
                                                        <a href="#cart.php" class="mega-menu-item-title">Sipariş</a>
                                                        <ul class="mega-menu-sub">
                                                            <li><a href="cart.php">Sepet</a></li>
                                                            <li><a href="checkout.php">Ödemeye Geç</a></li>
                                                        </ul>
                                                    </li>                                                
                                                </ul>

                                            </div>
                                        </li>

                                        <!-- Mega Menu Sub Link -->
                                        <li class="mega-menu-item">
                                            <a href="login.php" class="mega-menu-item-title">Giriş Yap</a>
                                        </li>

                                        <li>
                                            <a href="about-us.php">Hakkımızda</a>
                                        </li>
                                        <li>
                                            <a href="contact-us.php">İletişim</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- End Header Main Menu Start -->

                            <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--black action-hover-color--golden">
                                <li>
                                    <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                        <i class="icon-bag"></i>
                                        <span class="item-count">3</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#search">
                                        <i class="icon-magnifier"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                        <i class="icon-menu"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Start Header Area -->

    <!-- Start Mobile Header -->
    <div class="mobile-header mobile-header-bg-color--tree section-fluid d-lg-block d-xl-none">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <!-- Start Mobile Left Side -->
                    <div class="mobile-header-left">
                        <ul class="mobile-menu-logo">
                            <li>
                                <a href="index.php">
                                    <div class="logo">
                                        <img src="assets/images/logo/logo_black.png" alt="Mağaza Logosu">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Left Side -->

                    <!-- Start Mobile Right Side -->
                    <div class="mobile-right-side">
                        <ul class="header-action-link action-color--black action-hover-color--golden">
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Mobile Right Side -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Mobile Header -->

    <!--  Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-mobile-menu-wrapper">
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <div class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href="index.php"><span>Ana Sayfa</span></a>
                        </li>
                        <li>
                            <a href="shop-full-width.php"><span>Alışveriş</span></a>
                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="categories_list.php">Kategoriler</a>
                                    <ul class="mobile-sub-menu">
                                        <?php
                                            $categories = get_all_active('categories');

                                            if (mysqli_num_rows($categories) > 0){
                                                foreach ($categories as $item){
                                                    ?>

                                        
                                                    <li><a href="shop-full-width.php?category=<?=$item['categories_slug'];?>"><?= $item['category_name']; ?></a></li>
                                    
                                                <?php
                                                    }
                                                }  
                                                ?>

                                    </ul>
                                </li>
                            </ul>

                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="categories_list.php">Önemli</a>
                                    <ul class="mobile-sub-menu">
                                        <?php
                                            $showcase = get_showcase();

                                            if (mysqli_num_rows($showcase) > 0){
                                                foreach ($showcase as $item){
                                                    ?>

                                        
                                                    <li><a href="product-details-default.php?product=<?= $item['products_slug']; ?>"><?= $item['product_name']; ?></a></li>
                                    
                                                <?php
                                                    }
                                                }  
                                                ?>

                                    </ul>
                                </li>
                            </ul>
                            

                            <ul class="mobile-sub-menu">
                                <li>
                                    <a href="#">Sipariş</a>
                                    <ul class="mobile-sub-menu">
                                        <li><a href="cart.php">Sepet</a></li>
                                        <li><a href="checkout.php">Ödemeye Geç</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                        </li>

                        <li class="mega-menu-item">
                            <a href="login.php">Giriş Yap</a>
                        </li>
                        
                        <li><a href="about-us.php">Hakkımızda</a></li>
                        <li><a href="contact-us.php">İletişim</a></li>
                    </ul>
                </div> <!-- End Mobile Menu Nav -->
            </div> <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/logo/logo_white.png" alt=""></a>
                </div>

                <address class="address">
                    <span>Address: Your address goes here.</span>
                    <span>Call Us: 0123456789, 0123456789</span>
                    <span>Email: demo@example.com</span>
                </address>

                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>

                <ul class="user-link">
                    <li><a href="cart.php">Sepet</a></li>
                    <li><a href="checkout.php">Ödemeye Geç</a></li>
                </ul>
            </div>
            <!-- End Mobile contact Info -->

        </div> <!-- End Offcanvas Mobile Menu Wrapper -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.php"><img src="assets/images/logo/logo_white.png" alt=""></a>
            </div>

            <address class="address">
                <span>Address: Your address goes here.</span>
                <span>Call Us: 0123456789, 0123456789</span>
                <span>Email: demo@example.com</span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="cart.php">Sepet</a></li>
                <li><a href="checkout.php">Ödemeye Geç</a></li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

    <!-- Start Offcanvas Addcart Section -->
    <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- Start  Offcanvas Addcart Wrapper -->
        <div class="offcanvas-add-cart-wrapper">
            <h4 class="offcanvas-title">Alışveriş Sepeti</h4>
            <ul class="offcanvas-cart">
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="assets/images/product/default/home-1/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">Car Wheel</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">1 x </span>
                                <span class="offcanvas-cart-item-details-price">$49.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="assets/images/product/default/home-2/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">Car Vails</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">3 x </span>
                                <span class="offcanvas-cart-item-details-price">$500.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
                <li class="offcanvas-cart-item-single">
                    <div class="offcanvas-cart-item-block">
                        <a href="#" class="offcanvas-cart-item-image-link">
                            <img src="assets/images/product/default/home-3/default-1.jpg" alt=""
                                class="offcanvas-cart-image">
                        </a>
                        <div class="offcanvas-cart-item-content">
                            <a href="#" class="offcanvas-cart-item-link">Shock Absorber</a>
                            <div class="offcanvas-cart-item-details">
                                <span class="offcanvas-cart-item-details-quantity">1 x </span>
                                <span class="offcanvas-cart-item-details-price">$350.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas-cart-item-delete text-right">
                        <a href="#" class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                    </div>
                </li>
            </ul>
            <div class="offcanvas-cart-total-price">
                <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                <span class="offcanvas-cart-total-price-value">$170.00</span>
            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="cart.php" class="btn btn-block btn-golden">Sepeti Görüntüle</a></li>
                <li><a href="compare.php" class=" btn btn-block btn-golden mt-5">Ödemeye Geç</a></li>
            </ul>
        </div> <!-- End  Offcanvas Addcart Wrapper -->

    </div> <!-- End  Offcanvas Addcart Section -->


    </div> <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-golden">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->