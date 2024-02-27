<?php 
    include 'includes/header.php';

    if(isset($_GET['category'])){
        $categories_slug = $_GET['category'];
        $categories_result = get_slug_active('categories', $categories_slug);

        if (mysqli_num_rows($categories_result) > 0){
            $categories = mysqli_fetch_array($categories_result);

            $page_name = $categories['category_name'];
            $category_id = $categories['categories_id'];

            $curr_products = get_all_active_by_category_id('products', $category_id);
        }
            
        else {
            // The category does not exist in the database
            echo '<script>window.location.href = "404.php";</script>';

        }
            
    }
    
    else{
        $page_name = 'Tüm Ürünler';
        $curr_products = get_all_active('products');
    }
?>

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title"><?= $page_name; ?></h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php">Ana Sayfa</a></li>
                                    <li class="active" aria-current="page"><?= $page_name; ?></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-12">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-bs-toggle="tab"
                                                    href="#layout-4-grid"><img src="assets/images/icons/bkg_grid.png"
                                                        alt=""></a></li>
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img
                                                        src="assets/images/icons/bkg_list.png" alt=""></a></li>
                                        </ul>
                                    </div> <!-- End Sort tab Button -->

                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->

                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                            <div class="row">
                                                <?php
                                                    if (mysqli_num_rows($curr_products)){
                                                        foreach($curr_products as $item){
                                                ?>
                                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                                <!-- Start Product Default Single Item -->
                                                                <div class="product-default-single-item product-color--golden"
                                                                    data-aos="fade-up" data-aos-delay="0">
                                                                    <div class="image-box">
                                                                        <a href="product-details-default.php?product=<?= $item['products_slug']; ?>" class="image-link">
                                                                            <img src="../admin/uploads/<?= $item['product_image']; ?>"
                                                                                alt="Ürün Resmi">

                                                                        </a>
                                                                        <div class="action-link">
                                                                            <div class="action-link-left">
                                                                                <a href="#" data-bs-toggle="modal"
                                                                                    data-bs-target="#modalAddcart">Sepete Ekle</a>
                                                                            </div>
                                                                            <div class="action-link-right">
                                                                                <a href="#" data-bs-toggle="modal"
                                                                                    data-bs-target="#modalQuickview"><i
                                                                                        class="icon-magnifier"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="content">
                                                                        <div class="content-left">
                                                                            <h6 class="title"><a
                                                                                    href="product-details-default.php?product=<?= $item['products_slug']; ?>"><?= $item['product_name']; ?></a></h6>
                                                                            <ul class="review-star">
                                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                                </li>
                                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                                </li>
                                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                                </li>
                                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                                </li>
                                                                                <li class="empty"><i class="ion-android-star"></i>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="content-right">
                                                                            <span class="price">₺<?= $item['product_selling_price']; ?></span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <!-- End Product Default Single Item -->
                                                            </div>

                                                <?php
                                                        }
                                                    }
                                                    else{
                                                        echo 'Ürün bulunamadı';
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div> <!-- End Grid View Product -->
                                        
                                        <!-- Start List View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-list">
                                            <div class="row">
                                                <?php
                                                    if (mysqli_num_rows($curr_products)){
                                                        foreach($curr_products as $item){
                                                ?>
                                                    <div class="col-12">
                                                        <!-- Start Product Defautlt Single -->
                                                        <div class="product-list-single product-color--golden">
                                                            <a href="product-details-default.php?product=<?= $item['products_slug']; ?>"
                                                                class="product-list-img-link">
                                                                <img width="500px" class="img-fluid"
                                                                    src="../admin/uploads/<?= $item['product_image']; ?>"
                                                                    alt="Ürün Resmi">

                                                            </a>
                                                            <div class="product-list-content">
                                                                <h5 class="product-list-link"><a
                                                                        href="product-details-default.php?product=<?= $item['products_slug']; ?>"><?= $item['product_name']; ?></a></h5>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                                </ul>
                                                                <span class="product-list-price"><del>₺<?= $item['product_price']; ?></del>
                                                                ₺<?= $item['product_selling_price']; ?></span>
                                                                <p><?= $item['product_description']; ?></p>
                                                                <div class="product-action-icon-link-list">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#modalAddcart"
                                                                        class="btn btn-lg btn-black-default-hover">Sepete Ekle</a>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#modalQuickview"
                                                                        class="btn btn-lg btn-black-default-hover"><i
                                                                            class="icon-magnifier"></i></a>

                                                                </div>
                                                            </div>
                                                        </div> <!-- End Product Defautlt Single -->
                                                    </div>
                                                <?php
                                                        }
                                                    }
                                                    else{
                                                        echo 'Ürün bulunamadı';
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
                </div> <!-- End Shop Product Sorting Section  -->
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->

<?php include 'includes/footer.php';?>