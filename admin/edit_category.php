<?php include "includes/header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = get_by_id("categories", $id);
                if (mysqli_num_rows($category) > 0){
                    $data = mysqli_fetch_array($category);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori Düzenle</h4>
                        </div>
                        <div class="card-body">
                            <form action="updateDB/code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="categories_id" value="<?= $data['categories_id'];?>">
                                        <label for="category_name" class="category_name">Kategori İsmi</label>
                                        <input required type="text" class="form-control" value="<?= $data['category_name'] ?>" name="category_name" id="category_name" placeholder="Kategori ismini buraya girin...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="categories_slug" class="categories_slug">Kategori Slug</label>
                                        <input required type="text" class="form-control" value="<?= $data['categories_slug'] ?>" name="categories_slug" id="categories_slug" placeholder="Sayfanın url'sinde bu kategori için görülecek girdiyi girin...">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="category_description" class="category_description">Kategori Açıklaması</label>
                                        <textarea rows="3" class="form-control" name="category_description" id="category_description" placeholder="Kategorinin açıklamasını buraya girin..."><?= $data['category_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="category_image">Kategori Görüntüsünü değiştir</label>
                                        <input type="file" class="form-control" value="<?= $data['category_image'] ?>" name="category_image">
                                        <input type="hidden" name="old_image" value="<?= $data['category_image']; ?>">
                                        <label>Eski Görüntü:</label><img src="uploads/<?= $data['category_image']; ?>" width="50px">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="category_status">Kategoriyi görünmez yap</label>
                                        <input type="checkbox" <?= $data['categories_status'] ? "checked":"" ?> name="categories_status">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="category_popular">Kategoriyi popüler yap</label>
                                        <input type="checkbox" <?= $data['category_popular'] ? "checked":"" ?> name="category_popular">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary" name="update_category_btn">Güncelle</button>
                                    </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
            <?php
                }
                else{
                    echo "Kategori bulunumadı.";
                }
            }
            else{
                echo "URL'de kategori id'si bulunamadı...";
            }
            ?>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>