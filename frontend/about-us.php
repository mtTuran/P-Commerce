<?php
    include 'includes/header.php';
    $info = selectFromDatabase('about_us');
?>

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Hakkımızda</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="index.php">Ana Sayfa</a></li>
                                    <li class="active" aria-current="page">Hakkımızda</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- Start About Top -->
    <div class="about-top">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between d-sm-column">
                <div class="col-md-6">
                    <div class="about-img" data-aos="fade-up" data-aos-delay="0">
                        <div class="img-responsive">
                            <img src="../admin/uploads/<?= ($info && isset($info['about_us_image'])) ? $info['about_us_image'] : ''; ?>" alt="Hakkımızda resmi">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="content" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="title"><?= ($info && isset($info['about_us_header'])) ? $info['about_us_header'] : ''; ?></h3>
                        <h5 class="semi-title"><?= ($info && isset($info['about_us_semi_header'])) ? $info['about_us_semi_header'] : ''; ?></h5>
                        <p><?= ($info && isset($info['about_us_short'])) ? $info['about_us_short'] : ''; ?></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="content mt-8 mb-8" data-aos="fade-up" data-aos-delay="200">
                        <p><?= ($info && isset($info['about_us_long'])) ? $info['about_us_long'] : ''; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Top -->


<?php include 'includes/footer.php'; ?>