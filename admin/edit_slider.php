<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $slider = get_by_id("sliders", $id);
                if (mysqli_num_rows($slider) > 0){
                    $data = mysqli_fetch_array($slider);
            ?>

                <div class="card-header">
                    <h4 class="card-title">Slider Düzenle</h4>
                </div>
                <form method="post" action="updateDB/code.php" enctype="multipart/form-data">
                    <input type="hidden" name="sliders_id" value="<?= $data['sliders_id'];?>">

                    <div class="form-group">
                        <input type="hidden" name="old_image" value="<?= $data['slider_image']; ?>">
                        <label style="margin-left: 25px;" for="new_slider_image">Fotoğraf Yükle (Tercihen genişliği 2000'den büyük olsun...):</label>
                        <input name="new_slider_image" style="margin-left: 25px;" type="file" class="form-control-file mt-4" id="new_slider_image">
                        <label>Eski Görüntü:</label><img alt="Eski Seçili Görüntü" src="uploads/<?= $data['slider_image']; ?>" width="50px">
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_name">Slider Ana Başlık (opsiyonel)</label>
                        <input value="<?= $data['slider_name'] ?>" type="text" name="new_slider_name" class="form-control" id="new_slider_name" placeholder="Sliderda gözükmesini istediğiniz küçük ama öncelikli başlıktır..."></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_text">Slider Metin (opsiyonel)</label>
                        <input value="<?= $data['slider_text'] ?>" type="text" name="new_slider_text" class="form-control" id="new_slider_text" placeholder="Tercihen başlığa ek olarak yazılabilecek kısa bir cümle olsun..."></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_link_name">Slider Link Yazısı (opsiyonel)</label>
                        <input value="<?= $data['slider_link_name'] ?>" type="text" name="new_slider_link_name" class="form-control" id="new_slider_link_name" placeholder="Link yerine gözükecek yazıdır... (Boş bırakılırsa slider üzerinde buton gözükmez.))"></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_link">Link</label>
                        <input value="<?= $data['slider_link'] ?>" required type="text" name="new_slider_link" class="form-control" id="new_slider_link" placeholder="Slider üzerindeki butonun yönlendireceği link'tir. (Buton gözüksün ancak bir yere yönlendirmesin istiyorsanız '#' karakteri koyarak kaydedebilirsiniz.)"></input>
                    </div>
                    <div class="col-md-6">
                        <label class="new_slider_status">Slider'ı görünmez yap</label>
                        <input <?= $data['sliders_status'] ? "checked":"" ?> type="checkbox" name="new_sliders_status">
                    </div>
                  
                    <button name="update_slider_btn" type="submit" class="btn btn-primary edit_slider_btn">Güncelle</button>
                    <style> .edit_slider_btn{margin-left: 2rem;}
                            .new_slider_status{margin-left: 2rem; margin-bottom: 1rem;}
                    </style>
                </form>
            </div>
            <?php
                }
                else{
                    echo "Slayt bulunumadı.";
                }
            }
            else{
                echo "URL'de slayt id'si bulunamadı...";
            }
            ?>
        </div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>