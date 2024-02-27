<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php
                    $info = selectFromDatabase('about_us');
                ?>
                <div class="card-header">
                    <h4 class="card-title">Hakkımızda Sayfasını Düzenle</h4>
                </div>
                <form method="post" action="updateDB/code.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label style="margin-left: 25px;" for="about_us_image">Fotoğraf Yükle: (opsiyonel)</label>
                        <input type="hidden" name="old_about_image" value="<?= ($info && isset($info['about_us_image'])) ? $info['about_us_image'] : ''; ?>">
                        <img src="uploads/<?= ($info && isset($info['about_us_image'])) ? $info['about_us_image'] : ''; ?>" width="50px" alt="Eski 'hakkımızda' görüntüsü">
                        <input name="about_us_image" style="margin-left: 25px;" type="file" class="form-control-file mt-4" id="about_us_image">
                        <?php if ($info && isset($info['about_us_image'])) : ?>
                            <button name="delete_about_us_image_btn" type="submit" class="btn btn-danger">Resmi Sil</button>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="about_us_header">Hakkımızda Ana Başlık (opsiyonel)</label>
                        <input type="text" name="about_us_header" class="form-control" id="about_us_header" value="<?= ($info && isset($info['about_us_header'])) ? $info['about_us_header'] : ''; ?>"></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="about_us_semi_header">Hakkımızda Vurgulu Cümle (opsiyonel)</label>
                        <input type="text" name="about_us_semi_header" class="form-control" id="about_us_semi_header" value="<?= ($info && isset($info['about_us_semi_header'])) ? $info['about_us_semi_header'] : ''; ?>"></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-0" for="about_us_content_short">Kısa Hakkımızda Metni (opsiyonel)</label>
                        <textarea name="about_us_short" class="form-control" id="about_us_content_short" rows="5"><?= ($info && isset($info['about_us_short'])) ? $info['about_us_short'] : ''; ?></textarea>
                    </div>
                    <div class="card-body">
                        <label class="mb-0" for="about_us_content_long">Uzun Hakkımızda Metni (opsiyonel)</label>
                        <textarea name="about_us_long" class="form-control" id="about_us_content_long" rows="12"><?= ($info && isset($info['about_us_long'])) ? $info['about_us_long'] : ''; ?></textarea>
                    </div>
                    <button name="about_us_btn" type="submit" class="btn btn-primary">Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
