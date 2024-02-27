<?php
    include 'includes/header.php';

    $categories = get_all_active('categories');

?>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Tüm Kategoriler</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php">Ana Sayfa</a></li>
                                    <li class="active" aria-current="page">Tüm Kategoriler</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->


    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-12">
                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content">
                                    <?php
                                        if (mysqli_num_rows($categories) > 0){
                                            foreach ($categories as $item){
                                    ?>
                                                <!-- Start Grid View Product -->
                                                <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                                    <div class="row">
                                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                            <!-- Start Product Default Single Item -->
                                                            <div class="product-default-single-item product-color--golden"
                                                                data-aos="fade-up" data-aos-delay="0">
                                                                <div class="image-box">
                                                                    <a href="shop-full-width.php?category=<?= $item['categories_slug'];?>" class="image-link">
                                                                        <img src="../admin/uploads/<?= $item['category_image'];?>"
                                                                            alt="Kategori Resmi">
                                                                        <h4><?= $item['category_name'];?></h4>
                                                                    </a>
                                                                </div>
                                                                <div class="col-xl-7 col-lg-6">
                                                                    <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                                                                        data-aos-delay="200">
                                                                        <div class="product-details-text">
                                                                            <p><?= $item['category_description']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <!-- End Product Default Single Item -->
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>


