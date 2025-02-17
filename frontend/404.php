<?php include 'includes/header.php'; ?>

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">404 "Bulunamadı"</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php">Ana Sayfa</a></li>
                                    <li class="active" aria-current="page">404 "Bulunamadı"</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Error Section :::... -->
    <div class="error-section">
        <div class="container">
            <div class="row">
                <div class="error-form">
                    <h1 class="big-title" data-aos="fade-up" data-aos-delay="0">404</h1>
                    <h4 class="sub-title" data-aos="fade-up" data-aos-delay="200">Opps! SAYFA BULUNAMADI</h4>
                    <p data-aos="fade-up" data-aos-delay="400">Üzgünüz, ama aradığınız sayfa hiç var olmadı, <br> kaldırıldı, ismi değiştirildi veya geçici olarak ulaşılamıyor.</p>
                    <div class="row">
                        <div class="col-10 offset-1 col-md-4 offset-md-4">
                            <div class="default-search-style d-flex" data-aos="fade-up" data-aos-delay="600">
                                <input class="default-search-style-input-box" type="search" placeholder="Search..."
                                    required>
                                <button class="default-search-style-input-btn" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                            <a href="index.php" class="btn btn-md btn-black-default-hover mt-7" data-aos="fade-up"
                                data-aos-delay="800">Ana Sayfaya Dön</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Error Section :::... -->

    <?php include 'includes/footer.php'; ?>