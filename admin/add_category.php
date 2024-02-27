<?php 
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kategori Ekle</h4>
                </div>
                <div class="card-body">
                    <?php
                    /*
                    if (isset($_SESSION["update_message"])) {
                        echo '<div class="alert alert-success" role="alert">'.$_SESSION["update_message"].'</div>';
                        // Clear the session variable to remove the message after displaying it
                      //  unset($_SESSION["update_message"]); 
                    }
                    */
                    ?>
                    <form action="updateDB/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="category_name" class="category_name mb-0">Kategori İsmi</label>
                                <input required type="text" class="form-control mb-2" name="category_name" id="category_name" placeholder="Kategori ismini buraya girin...">
                            </div>
                            <div class="col-md-6">
                                <label for="categories_slug" class="categories_slug mb-0">Kategori Slug</label>
                                <input required type="text" class="form-control mb-2" name="categories_slug" id="categories_slug" placeholder="Sayfanın url'sinde bu kategori için görülecek girdiyi girin...">
                            </div>
                            <div class="col-md-12">
                                <label for="category_description" class="category_description mb-0">Kategori Açıklaması</label>
                                <textarea required rows="3" class="form-control mb-2" name="category_description" id="category_description" placeholder="Kategorinin açıklamasını buraya girin..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="category_image mb-0">Kategori Görüntüsü</label>
                                <input required type="file" class="form-control mb-2" name="category_image">
                            </div>
                            <div class="col-md-6">
                                <label class="category_status mb-0">Kategoriyi görünmez yap</label>
                                <input type="checkbox" name="categories_status">
                            </div>
                            <div class="col-md-6">
                                <label class="category_popular mb-0">Kategoriyi popüler yap</label>
                                <input type="checkbox" name="category_popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Kaydet</button>
                            </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>