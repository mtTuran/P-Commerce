<?php 
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ürün Ekle</h4>
                </div>
                <div class="card-body">
                    <form action="updateDB/code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Kategori Seç</label>
                                <select class="form-select mb-2" name="category_id">
                                    <?php
                                        $categories = get_all('categories');
                                        if (mysqli_num_rows($categories) > 0){
                                            foreach($categories as $item){
                                    ?>
                                                <option value="<?= $item['categories_id'];?>"><?= $item['category_name'];?></option>

                                    <?php   } 
                                        } 
                                        else{
                                            echo 'Kategori bulunamadı.';
                                        }?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="product_name" class="product_name mb-0">Ürün İsmi</label>
                                <input required type="text" class="form-control mb-2" name="product_name" id="product_name" placeholder="Ürün ismini buraya girin...">
                            </div>
                            <div class="col-md-6">
                                <label for="products_slug" class="products_slug mb-0">Ürün Slug</label>
                                <input required type="text" class="form-control mb-2" name="products_slug" id="products_slug" placeholder="Sayfanın url'sinde bu Ürün için görülecek girdiyi girin...">
                            </div>
                            <div class="col-md-12">
                                <label for="product_description" class="product_description mb-0">Ürün Açıklaması</label>
                                <textarea required rows="3" class="form-control mb-2" name="product_description" id="product_description" placeholder="Ürünün açıklamasını buraya girin..."></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="product_image mb-0">Ürün Görüntüsü</label>
                                <input required type="file" class="form-control mb-2" name="product_image">
                            </div>
                            <div class="col-md-6">
                                <label for="product_price" class="product_price mb-0">Ürün Ana Fiyatı</label>
                                <input required type="number" class="form-control mb-2" name="product_price" id="product_price" placeholder="Ürünün ham fiyatını buraya girin...">
                            </div>
                            <div class="col-md-6">
                                <label for="product_selling_price" class="product_selling_price mb-0">Ürün Satış Fiyatı</label>
                                <input required type="number" class="form-control mb-2" name="product_selling_price" id="product_selling_price" placeholder="Ürünün satış fiyatını buraya girin...">
                            </div>
                            <div class="col-md-12">
                                <label for="product_stock" class="product_stock mb-0">Ürün Stok Sayısı</label>
                                <input required type="number" class="form-control mb-2" name="product_stock" id="product_stock" placeholder="Ürünün stok sayısını buraya girin...">
                            </div>                            
                            <div class="col-md-6">
                                <label class="product_status mb-0">Ürün görünmez yap</label>
                                <input type="checkbox" name="products_status">
                            </div>
                            <div class="col-md-6">
                                <label class="product_showcase mb-0">Ürünü vitrine ekle</label>
                                <input type="checkbox" name="product_showcase">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Kaydet</button>
                            </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>