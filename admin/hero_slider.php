<?php include 'includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hero Slider'ları</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>Başlık</th>
                                <th>Ufak Başlık</th>
                                <th>Görsel</th>
                                <th>Görünürlük</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sliders = get_all("sliders");
                            if ($sliders){
                                foreach($sliders as $item){
                            ?>
                            <tr>
                                <td> <?= isset($item['slider_name']) ? $item['slider_name'] : ''; ?> </td>
                                <td> <?= isset($item['slider_text']) ? $item['slider_text'] : ''; ?> </td>
                                <td> <img src="uploads/<?= $item['slider_image']; ?>" width="100px" alt="<?= $item['slider_name']; ?>" ></td>
                                <td> <?= $item['sliders_status'] == '0' ? "Görünür":"Görünmez"; ?> </td>
                                <td> <a href="edit_slider.php?id=<?= $item['sliders_id']; ?>" class="btn btn-primary">Düzenle</a></td>
                                <td>
                                    <form action="updateDB/code.php" method="POST">
                                        <input type="hidden" name="sliders_id" value=" <?= $item['sliders_id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="delete_slider_btn">Sil</button>
                                     </form>
                                </td>
                            </tr>
                            <?php
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4 class="card-title">Yeni Slider Ekle</h4>
                </div>
                <form method="post" action="updateDB/code.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label style="margin-left: 25px;" for="new_slider_image">Fotoğraf Yükle (Tercihen genişliği 2000'den büyük olsun...):</label>
                        <input required name="new_slider_image" style="margin-left: 25px;" type="file" class="form-control-file mt-4" id="new_slider_image">
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_name">Slider Ana Başlık (opsiyonel)</label>
                        <input type="text" name="new_slider_name" class="form-control" id="new_slider_name" placeholder="Sliderda gözükmesini istediğiniz küçük ama öncelikli başlıktır..."></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_text">Slider Metin (opsiyonel)</label>
                        <input type="text" name="new_slider_text" class="form-control" id="new_slider_text" placeholder="Tercihen başlığa ek olarak yazılabilecek kısa bir cümle olsun..."></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_link_name">Slider Link Yazısı (opsiyonel)</label>
                        <input type="text" name="new_slider_link_name" class="form-control" id="new_slider_link_name" placeholder="Link yerine gözükecek yazıdır... (Boş bırakılırsa slider üzerinde buton gözükmez.))"></input>
                    </div>
                    <div class="card-body">
                        <label class="mb-2" for="new_slider_link">Link</label>
                        <input required type="text" name="new_slider_link" class="form-control" id="new_slider_link" placeholder="Slider üzerindeki butonun yönlendireceği link'tir. (Buton gözüksün ancak bir yere yönlendirmesin istiyorsanız '#' karakteri koyarak kaydedebilirsiniz.)"></input>
                    </div>
                    <div class="col-md-6">
                        <label class="new_slider_status">Slider'ı görünmez yap</label>
                        <input type="checkbox" name="new_slider_status">
                    </div>
                  
                    <button name="add_slider_btn" type="submit" class="btn btn-primary add_slider_btn">Ekle</button>
                    <style> .add_slider_btn{margin-left: 2rem;}
                            .new_slider_status{margin-left: 2rem; margin-bottom: 1rem;}
                    </style>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>