<?php include 'includes/header.php'; ?>

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Giriş Yap / Kayıt Ol</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.html">Ana Sayfa</a></li>
                                    <li class="active" aria-current="page">Giriş Yap / Kayıt Ol</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>Giriş Yap</h3>
                        <form action="#" method="POST">
                            <div class="default-form-box">
                                <label>Kullanıcı Adı veya E-mail<span>*</span></label>
                                <input type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Şifre <span>*</span></label>
                                <input type="password">
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Giriş Yap</button>
                                <label class="checkbox-default mb-4" for="offer">
                                    <input type="checkbox" id="offer">
                                    <span>Beni Hatırla</span>
                                </label>
                                <a href="#">Şifremi Unuttum?</a>

                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        <h3>Kayıt Ol</h3>
                        <form action="#">
                            <div class="default-form-box">
                                <label>E-mail Adresiniz<span>*</span></label>
                                <input name="register_mail" type="text">
                            </div>
                            <div class="default-form-box">
                                <label>Şifreniz <span>*</span></label>
                                <input name="register_password" type="password">
                            </div>
                            <div class="default-form-box">
                                <label>Şifre Tekrar <span>*</span></label>
                                <input name="register_password_confirm" type="password">
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover" type="submit">Kaydol</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

   <?php include 'includes/footer.php'; ?>