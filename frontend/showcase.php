    <!-- Start Product Default Slider Section -->
    <div id="showcase" class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">Vitrin</h3>
                                <p>Tavsiye ettiğimiz ürünlerimiz...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-2rows default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-2row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Start Product Default Single Item -->
                                    <?php
                                        $showcase = get_showcase();
                                        if (mysqli_num_rows($showcase) > 0){
                                            foreach ($showcase as $item){
                                    ?>
                                    <div class="product-default-single-item product-color--golden swiper-slide">
                                        <div class="image-box">
                                            <a href="product-details-default.php?product=<?= $item['products_slug']; ?>" class="image-link">
                                                <img src="../admin/uploads/<?= $item['product_image']; ?>" alt="Vitrindeki Ürün Resmi">
                                            </a>
                                            <!--
                                            <div class="tag">
                                                <span>sale</span>
                                            </div>
                                            -->
                                            <div class="action-link">
                                                <div class="action-link-left">
                                                    <button class="btn btn-md btn-golden add_to_cart_btn" value="<?= $item['products_id'] ?>" type="submit">Sepete Ekle</button>
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
                                                <h6 class="title"><a href="product-details-default.php?product=<?= $item['products_slug']; ?>"><?= $item['product_name']; ?></a></h6>
                                                <ul class="review-star">
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="fill"><i class="ion-android-star"></i></li>
                                                    <li class="empty"><i class="ion-android-star"></i></li>
                                                </ul>
                                            </div>
                                            <div class="content-right">
                                                <span class="price">₺<?= $item['product_selling_price']; ?></span>
                                            </div>

                                        </div>
                                    </div>
                                    <?php } } ?>
                                    <!-- End Product Default Single Item -->
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->