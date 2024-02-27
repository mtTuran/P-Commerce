<?php include 'includes/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ürünler</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>Kategori ID</th>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Görsel</th>
                                <th>Görünürlük</th>
                                <th>Vitrin</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = get_all("products");
                            if (mysqli_num_rows($products) > 0){
                                foreach($products as $item){
                            ?>
                            <tr>
                                <td> <?= $item['product_categoryid']; ?> </td>
                                <td> <?= $item['products_id']; ?> </td>
                                <td> <?= $item['product_name']; ?></td>                              
                                <td> <img src="uploads/<?= $item['product_image']; ?>" width="100px" alt="<?= $item['product_name']; ?>" ></td>
                                <td> <?= $item['products_status'] == '0' ? "Görünür":"Görünmez"; ?> </td>
                                <td> <?= $item['product_showcase'] == '1' ? "Vitrinde":"Vitrinde Değil"; ?> </td>
                                <td> <a href="edit_product.php?id=<?= $item['products_id']; ?>" class="btn btn-primary">Düzenle</a></td>
                                <td><form action="updateDB/code.php" method="POST">
                                        <input type="hidden" name="product_id" value=" <?= $item['products_id']; ?>">
                                        <button type="submit" class="btn btn-danger delete_product_btn" name="delete_product_btn" value="<?= $item['products_id'];?>">Sil</button>
                                     </form>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            else{
                                echo 'Ürün bulunamadı...';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';