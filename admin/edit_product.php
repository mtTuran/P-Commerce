<?php 
include('includes/header.php'); 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                    $product = get_by_id('products', $id);

                    if (mysqli_num_rows($product) > 0){
                        $data = mysqli_fetch_array($product);
            ?>
                        <div class="card">
                            <div class="card-header">
                                <h4>Ürün Düzenle</h4>
                            </div>
                            <div class="card-body">
                                <form action="updateDB/code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Kategori Seç</label>
                                            <select class="form-select mb-2" name="product_categoryid">
                                                <?php
                                                    $categories = get_all('categories');
                                                    if (mysqli_num_rows($categories) > 0){
                                                        foreach($categories as $item){
                                                ?>
                                                            <option value="<?= $item['categories_id'];?>" <?= $data['product_categoryid'] == $item['categories_id']? "selected":"" ?>><?= $item['category_name'];?></option>

                                                <?php   } 
                                                    } 
                                                    else{
                                                        echo 'Kategori bulunamadı.';
                                                    }?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="product_id" value="<?=$data['products_id']; ?>">
                                        <div class="col-md-6">
                                            <label for="product_name" class="product_name mb-0">Ürün İsmi</label>
                                            <input required type="text" value="<?= $data['product_name']; ?>" class="form-control mb-2" name="product_name" id="product_name" placeholder="Ürün ismini buraya girin...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="products_slug" class="products_slug mb-0">Ürün Slug</label>
                                            <input required type="text" value="<?= $data['products_slug']; ?>" class="form-control mb-2" name="products_slug" id="products_slug" placeholder="Sayfanın url'sinde bu Ürün için görülecek girdiyi girin...">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="product_description" class="product_description mb-0">Ürün Açıklaması</label>
                                            <textarea required rows="3" class="form-control mb-2" name="product_description" id="product_description" placeholder="Ürünün açıklamasını buraya girin..."><?= $data['product_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="product_image mb-0">Seçili Ürün Görüntüsü</label>
                                            <input type="hidden" name="old_image" value="<?= $data['product_image']; ?>">
                                            <img src="uploads/<?= $data['product_image']; ?>" width="50px" alt="Seçili ürün görüntüsü">
                                            <input type="file" class="form-control mb-2" name="product_image">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="product_price" class="product_price mb-0">Ürün Ana Fiyatı</label>
                                            <input required type="number" value="<?= $data['product_price']; ?>" class="form-control mb-2" name="product_price" id="product_price" placeholder="Ürünün ham fiyatını buraya girin...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="product_selling_price" class="product_selling_price mb-0">Ürün Satış Fiyatı</label>
                                            <input required type="number" value="<?= $data['product_selling_price']; ?>" class="form-control mb-2" name="product_selling_price" id="product_selling_price" placeholder="Ürünün satış fiyatını buraya girin...">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="product_stock" class="product_stock mb-0">Ürün Stok Sayısı</label>
                                            <input required type="number" value="<?= $data['product_stock']; ?>" class="form-control mb-2" name="product_stock" id="product_stock" placeholder="Ürünün stok sayısını buraya girin...">
                                        </div>                            
                                        <div class="col-md-6">
                                            <label class="product_status mb-0">Ürün görünmez yap</label>
                                            <input type="checkbox" <?= $data['products_status'] ? "checked":""?> name="products_status">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="product_showcase mb-0">Ürünü vitrine ekle</label>
                                            <input type="checkbox" <?= $data['product_showcase'] ? "checked":""?> name="product_showcase">
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="update_product_btn">Güncelle</button>
                                        </div>
                                </form>
                                </div>
                                
                            </div>
                        </div>
            <?php
                    }
                    else{
                        echo 'Bu idye sahip bir ürün bulunamadı.';
                    }
                }
                else{
                    echo 'ID urlde bulunamadı. ';
                }
            ?>
        </div>
    </div>
</div>

<?php include "includes/footer.php";?>