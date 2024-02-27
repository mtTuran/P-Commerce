<?php
    include "includes/header.php";
    $slides = get_all_active('sliders');
?>

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
            <?php
                if ($slides){

                    foreach ($slides as $item){ 
                
            ?>
                <!-- Start Hero Single Slider Item -->
                <div class="hero-single-slider-item swiper-slide">
                    <!-- Hero Slider Image -->
                    <div class="hero-slider-bg">
                        <img src="../admin/uploads/<?= $item['slider_image'];?>" alt="Hero Slider Görüntüsü">
                    </div>
                    <!-- Hero Slider Content -->
                    <div class="hero-slider-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-auto">
                                    <div class="hero-slider-content">
                                        <h4 class="subtitle"><?= $item['slider_name']; ?></h4>
                                        <h2 class="title"><?= $item['slider_text']; ?></h2>
                                        <a href="<?= $item['slider_link']; ?>"
                                            class="btn btn-lg btn-outline-golden"><?= $item['slider_link_name']; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Hero Single Slider Item -->
                <?php } } ?>
            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-golden"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->



    <?php include "showcase.php"?>  <!-- Include Showcase -->
    
    <?php
        $populars = get_all_active_popular();

        if (mysqli_num_rows($populars) > 0){
    ?>

    <!-- Start Banner Section -->
    <div class="banner-section">
        <div class="banner-wrapper clearfix">
            <!-- Start Banner Single Item -->
            <?php foreach ($populars as $item){ ?>
            <div class="banner-single-item banner-style-4 banner-animation banner-color--golden float-left img-responsive"
                data-aos="fade-up" data-aos-delay="0">
                <div class="image">
                    <img class="img-fluid" src="../admin/uploads/<?= $item['category_image']; ?>" alt="Popüler Kategori Resmi">
                </div>
                <a href="product-details-default.php" class="content">
                    <div class="inner">
                        <h4 class="title"><?= $item['category_name'] ?></h4>
       <!--                 <h6 class="sub-title">20 products</h6>  -->
                    </div>
                    <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                </a>
            </div>
            <!-- End Banner Single Item -->
            <?php } ?>
        </div>
    </div>
    <!-- End Banner Section -->

    <?php } ?>

    <?php include "includes/footer.php"; ?>
