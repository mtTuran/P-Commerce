<?php include('includes/header.php'); ?>


<div class="container">
    <h1>Admin Panel</h1>
    <div class="row">
        <h2>Ayarlar</h2>
        <p>Websitenizin ayarlarını aşağıdaki kutucukları kullanarak değiştirebillirsiniz.</p>
        <div class="col-md-12">

            <?php
            if (isset($_GET['Status'])) {
                $status = $_GET['Status'];
                
                if ($status == 1) {
                    // Update was successful
                    echo '<div class="alert alert-success" role="alert">
                        Güncelleme başarılı oldu! Değişiklikleriniz kaydedildi.
                    </div>';
                } else{
                    // Update failed
                    echo '<div class="alert alert-danger" role="alert">
                        Güncelleme başarısız oldu. Lütfen değiştirmeye çalıştığınız verileri gözden geçirin ve yeniden deneyin.
                    </div>';
                }
            }
            ?>
            
            <form method="post" action="updateDB/update_settings.php">
                <div class="primary_settings row mb-3">
                    <div class="site_name">
                        <label class="col-sm-2 col-form-label" for="name">Sitenin Başlığı<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="name" name="settings_sitename" type="text" placeholder="Buraya sitenizin ismini giriniz..." value="<?php echo $row['settings_sitename']!== null ? $row['settings_sitename'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="site_description row mb-3">
                        <label class="col-sm-2 col-form-label" for="description">Sitenin Açıklaması<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="description" name="settings_description" type="text" placeholder="Buraya sitenizin açıklamasını giriniz..." value="<?php echo $row['settings_description']!== null ? $row['settings_description'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="site_keywords">
                        <label class="col-sm-2 col-form-label" for="keywords">Sitenin Anahtar Kelimeleri<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="keywords" name="settings_keywords" type="text" placeholder="Buraya sitenizin anahtar kelimelerini giriniz..." value="<?php echo $row['settings_keywords']!== null ? $row['settings_keywords'] : ''; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="social_media_links row mb-3">
                    <div class="media_instagram">
                        <label class="col-sm-2 col-form-label" for="instagram">Instagram Hesabınız</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="instagram" name="settings_instagram" type="text" placeholder="Instagram hesabınızın linkini giriniz..." value="<?php echo $row['settings_instagram']!== null ? $row['settings_instagram'] : ''; ?>">
                        </div>
                    </div>
                    <div class="media_x row mb-3">
                        <label class="col-sm-2 col-form-label" for="x">X Hesabınız</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="x" name="settings_x" type="text" placeholder="X hesabınızın linkini giriniz..." value="<?php echo $row['settings_x']!== null ? $row['settings_x'] : ''; ?>">
                        </div>
                    </div>
                </div>

                <div class="mail_settings row mb-3">
                    <div class="mserver">
                        <label class="col-sm-2 col-form-label" for="mail_server">Mail Sunucusu<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="mail_server" name="settings_mailserver" type="text" placeholder="Buraya sitenizin mail sunucu adresini girin..." value="<?php echo $row['settings_mailserver']!== null ? $row['settings_mailserver'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="mport row mb-3">
                        <label class="col-sm-2 col-form-label" for="port">Port<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="port" name="settings_port" type="text" placeholder="Buraya sitenizin açıklamasını giriniz..." value="<?php echo $row['settings_port']!== null ? $row['settings_port'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="maddress row mb-3">
                        <label class="col-sm-2 col-form-label" for="mail_address">Mail Adresi<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="mail_address" name="settings_mailaddress" type="text" placeholder="Buraya sitenizin anahtar kelimelerini giriniz..." value="<?php echo $row['settings_mailaddress']!== null ? $row['settings_mailaddress'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="mpassword row mb-3">
                        <label class="col-sm-2 col-form-label" for="mail_password">Mail Şifresi<span class="required">*</span></label>
                        <div class="col-sm-10">
                            <input class="form-control" id="mail_password" name="settings_mailpassword" type="password" placeholder="Buraya sitenizin anahtar kelimelerini giriniz..." value="<?php echo $row['settings_mailpassword']!== null ? $row['settings_mailpassword'] : ''; ?>" required>
                        </div>
                    </div>
                </div>
                <button type="submit" id="send" class="btn btn-primary" name="update_settings_btn">Güncelle</button>
            </form>
            

            
<?php include('includes/footer.php'); ?>