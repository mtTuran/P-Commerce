<?php include 'includes/header.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Kategoriler</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>İsim</th>
                                <th>Görsel</th>
                                <th>Görünürlük</th>
                                <th>Düzenle</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $categories = get_all("categories");
                            if (mysqli_num_rows($categories) > 0){
                                foreach($categories as $item){
                            ?>
                            <tr>
                                <td> <?= $item['categories_id']; ?> </td>
                                <td> <?= $item['category_name']; ?> </td>
                                <td> <img src="uploads/<?= $item['category_image']; ?>" width="100px" alt="<?= $item['category_name']; ?>" ></td>
                                <td> <?= $item['categories_status'] == '0' ? "Görünür":"Görünmez"; ?> </td>
                                <td> <a href="edit_category.php?id=<?= $item['categories_id']; ?>" class="btn btn-primary">Düzenle</a></td>
                                <td>
                                    <form action="updateDB/code.php" method="POST">
                                        <input type="hidden" name="category_id" value=" <?= $item['categories_id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="delete_category_btn">Sil</button>
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

<?php include "includes/footer.php";?>