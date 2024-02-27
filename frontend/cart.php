<?php include 'includes/header.php'; ?>

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Sepet</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Ana Sayfa</a></li>
                                    <li class="active" aria-current="page">Sepet</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Kaldır</th>
                                            <th class="product_thumb">Resim</th>
                                            <th class="product_name">Ürün</th>
                                            <th class="product-price">Ücret</th>
                                            <th class="product_quantity">Adet</th>
                                            <th class="product_total">Toplam</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                    <?php
                                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $item) {
                                            $product_in_cart_result = get_by_id('products', $item['id']);
                                            $product_in_cart = mysqli_fetch_assoc($product_in_cart_result);
                                            ?>
                                        <!-- Start Cart Single Item-->
                                        <tr>
                                            <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb"><a href="product-details-default.php?<?= $product_in_cart['products_slug'] ?>"><img
                                                        src="../admin/uploads/<?= $product_in_cart['product_image']; ?>"
                                                        alt="Sepetteki Ürün"></a></td>
                                            <td class="product_name"><a href="product-details-default.php?<?= $product_in_cart['products_slug'] ?>"><?= $product_in_cart['product_name'] ?></a></td>
                                            <td class="product-price">₺<?= $product_in_cart['product_selling_price']; ?></td>
                                            <td class="product_quantity"><label>Adet</label> <input min="1"
                                                    max="<?= $product_in_cart['product_stock'] ?>" value="<?= $item['quantity'] ?>" type="number"></td>
                                            <td class="product_total">₺<?= $product_in_cart['product_selling_price'] * $item['quantity'] ?></td>
                                        </tr> <!-- End Cart Single Item-->
                                        <?php
                                        }
                                    } else {
                                        // Display a message if the cart is empty
                                        echo '<tr><td colspan="6">Sepetiniz boş.</td></tr>';
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button class="btn btn-md btn-golden" type="submit">sepeti güncelle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="coupon_code " data-aos="fade-up" data-aos-delay="400">
                            <h3>Toplam Ücret</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Ürünler</p>
                                    <p class="cart_amount">₺215.00</p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Kargo</p>
                                    <p class="cart_amount"><span>Bedava:</span> ₺0</p>
                                </div>

                                <div class="cart_subtotal">
                                    <p>Ödenecek</p>
                                    <p class="cart_amount">₺215.00</p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="#" class="btn btn-md btn-golden">Ödemeye Geç</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->

 <?php include 'includes/footer.php'; ?>