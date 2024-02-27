<?php

session_start();
include "../config/dbcon.php";

if (isset($_POST['add_category_btn'])){
    $category_name = $_POST["category_name"];
    $categories_slug = $_POST["categories_slug"];
    $category_description = $_POST["category_description"];
    $categories_status = isset($_POST["categories_status"]) ? '1' : '0';
    $category_popular = isset($_POST["category_popular"]) ? '1': '0';

    $category_image = $_FILES["category_image"]["name"];

    $image_path = "../uploads";

  //  $image_ext = pathinfo($category_image, PATHINFO_EXTENSION);
    $filename = $category_image;

    $category_query = "INSERT INTO categories 
    (category_name, categories_slug, category_description, categories_status, category_image, category_popular)
    VALUES ('$category_name', '$categories_slug', '$category_description', '$categories_status', '$category_image', '$category_popular')";

    $con = createConnectionToDatabase();
    $category_query_run = mysqli_query($con, $category_query);
    endConnectionToDatabase($con);

    if ($category_query_run){
        move_uploaded_file($_FILES['category_image']['tmp_name'], $image_path.'/'.$filename);
        $_SESSION['update_message'] = 'Kategori ekleme başarılı oldu! Değişiklikleriniz kaydedildi.';
    
    }
    else{
        $_SESSION['update_message'] = 'Kategori ekleme başarısız oldu. Lütfen eklemeye çalıştığınız verileri gözden geçirin ve yeniden deneyin.';       
   }
   
   header("Location: ../add_category.php");
   exit;

} 
else if(isset($_POST['update_category_btn'])){
    $category_id = $_POST['categories_id'];
    $category_name = $_POST["category_name"];
    $categories_slug = $_POST["categories_slug"];
    $category_description = $_POST["category_description"];
    $categories_status = isset($_POST["categories_status"]) ? '1' : '0';
    $category_popular = isset($_POST["category_popular"]) ? '1': '0';

    $category_image = $_FILES["category_image"]["name"];

    $image_path = "../uploads";

  //  $image_ext = pathinfo($category_image, PATHINFO_EXTENSION);
    $new_image = $category_image;
    $old_image = $_POST['old_image'];

    if ($new_image != ""){
        $update_filename = $new_image;
    }
    else{
        $update_filename = $old_image;
    }

    $update_query = "UPDATE categories SET category_name = '$category_name', categories_slug = '$categories_slug',
        category_description = '$category_description', categories_status = '$categories_status', category_image = '$update_filename',
        category_popular = '$category_popular' WHERE categories_id = '$category_id'";
    
    $con = createConnectionToDatabase();
    $update_query_run = mysqli_query($con, $update_query);
    endConnectionToDatabase($con);

    if($update_query_run){
        if($_FILES["category_image"]["name"] != ""){
            move_uploaded_file($_FILES["category_image"]["tmp_name"], $image_path.'/'.$update_filename);
            if(file_exists($image_path.'/'.$old_image)){
                unlink($image_path.'/'.$old_image);
            }
        }
        header("Location: ../edit_category.php?id=$category_id");
        exit;
    }
}
else if(isset($_POST['delete_category_btn'])){
    $con = createConnectionToDatabase();
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE categories_id = $category_id";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['category_image'];

    $delete_query = "DELETE FROM categories WHERE categories_id = $category_id";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        header("Location: ../categories.php");
        exit;        
    }
    else{
        echo "Silme işlemi sırasında bir hata oluştu...";
    }

}
else if(isset($_POST['add_product_btn'])){
    $category_id = $_POST["category_id"];
    $product_name = $_POST["product_name"];
    $products_slug = $_POST["products_slug"];
    $product_description = $_POST["product_description"];
    $product_price = $_POST["product_price"];
    $product_selling_price = $_POST["product_selling_price"];
    $product_stock = $_POST["product_stock"];
    $products_status = isset($_POST["products_status"]) ? '1' : '0';
    $product_showcase = isset($_POST["product_showcase"]) ? '1': '0';

    $product_image = $_FILES["product_image"]["name"];

    $image_path = "../uploads";

    $filename = $product_image;

    if ($product_name != "" && $products_slug != "" && $product_description != "" && $product_price != ""&& $product_selling_price != "" && $product_stock != "" && $products_status != "" && $product_showcase != ""){
    /*
    $product_query = "INSERT INTO products (product_name, products_slug, product_description, products_status, product_image,
                      product_showcase, product_price, product_selling_price, product_stock, product_categoryid)
                      VALUES ('$product_name', '$products_slug', '$product_description', '$products_status', '$product_image', 
                      '$product_showcase', '$product_price', '$product_selling_price', '$product_stock', '$category_id')";

    $con = createConnectionToDatabase();
    $product_query_run = mysqli_query($con, $product_query);
    endConnectionToDatabase($con);
    */
            $product_query = "INSERT INTO products (product_name, products_slug, product_description, products_status, product_image,
                        product_showcase, product_price, product_selling_price, product_stock, product_categoryid)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $con = createConnectionToDatabase();
        $product_query_run = mysqli_prepare($con, $product_query);
        mysqli_stmt_bind_param($product_query_run, 'ssssssssss', $product_name, $products_slug, $product_description, $products_status, $product_image, $product_showcase, $product_price, $product_selling_price, $product_stock, $category_id);
        mysqli_stmt_execute($product_query_run);
        endConnectionToDatabase($con);

    
    if ($product_query_run){
        move_uploaded_file($_FILES['product_image']['tmp_name'], $image_path.'/'.$filename);
        $_SESSION['update_message'] = 'Kategori ekleme başarılı oldu! Değişiklikleriniz kaydedildi.';
    }
    else{
        $_SESSION['update_message'] = 'Kategori ekleme başarısız oldu. Lütfen eklemeye çalıştığınız verileri gözden geçirin ve yeniden deneyin.';       
   }
   
   header("Location: ../add_product.php");
   exit;

   }

   else{
    $_SESSION['update_message'] = 'Tüm alanları doldurması zorunludur';
    header("Location: ../add_product.php");
    exit;
   }
}
else if(isset($_POST['update_product_btn'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST["product_name"];
    $products_slug = $_POST["products_slug"];
    $product_description = $_POST["product_description"];
    $products_status = isset($_POST["products_status"]) ? '1' : '0';
    $product_showcase = isset($_POST["product_showcase"]) ? '1': '0';
    $product_categoryid = $_POST['product_categoryid'];
    $product_price = $_POST['product_price'];
    $product_selling_price = $_POST['product_selling_price'];
    $product_stock = $_POST['product_stock'];

    $product_image = $_FILES["product_image"]["name"];

    $image_path = "../uploads";

    $new_image = $product_image;
    $old_image = $_POST['old_image'];

    if ($new_image != ""){
        $update_filename = $new_image;
    }
    else{
        $update_filename = $old_image;
    }

    /*

    $update_product_query = "UPDATE products SET product_categoryid = '$product_categoryid', product_name = '$product_name', products_slug = '$products_slug',
        product_description = '$product_description', products_status = '$products_status', product_image = '$update_filename',
        product_showcase = '$product_showcase', product_price = '$product_price', product_selling_price = '$product_selling_price',
        product_stock = '$product_stock' WHERE products_id = '$product_id'";
    
    $con = createConnectionToDatabase();
    $update_product_query_run = mysqli_query($con, $update_product_query);
    endConnectionToDatabase($con);

    */

    $update_product_query = "UPDATE products SET product_categoryid = ?, product_name = ?, products_slug = ?,
        product_description = ?, products_status = ?, product_image = ?,
        product_showcase = ?, product_price = ?, product_selling_price = ?,
        product_stock = ? WHERE products_id = ?";

    $con = createConnectionToDatabase();
    $update_product_query_run = mysqli_prepare($con, $update_product_query);

    mysqli_stmt_bind_param($update_product_query_run, 'isssisiiiii', $product_categoryid, $product_name, $products_slug,
            $product_description, $products_status, $update_filename,
            $product_showcase, $product_price, $product_selling_price,
            $product_stock, $product_id);

    mysqli_stmt_execute($update_product_query_run);

endConnectionToDatabase($con);

    if($update_product_query_run){
        if($_FILES["product_image"]["name"] != ""){
            move_uploaded_file($_FILES["product_image"]["tmp_name"], $image_path.'/'.$update_filename);
            if(file_exists($image_path.'/'.$old_image)){
                unlink($image_path.'/'.$old_image);
            }
        }
        header("Location: ../edit_product.php?id=$product_id");
        exit;
    }
}
else if(isset($_POST['delete_product_btn'])){
    $con = createConnectionToDatabase();
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_query = "SELECT * FROM products WHERE products_id = $product_id";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['product_image'];

    $delete_query = "DELETE FROM products WHERE products_id = $product_id";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        header("Location: ../products.php");
        exit;   
     // echo 200;     
    }
    else{
        echo "Silme işlemi sırasında beklenmedik bir hata oluştu...";
     //   echo 500;
    }
}
else if(isset($_POST['about_us_btn'])){
    $short_text = $_POST["about_us_short"];
    $long_text = $_POST["about_us_long"];
    $about_us_header = $_POST['about_us_header'];
    $about_us_semi_header = $_POST['about_us_semi_header'];

    $about_us_image = $_FILES["about_us_image"]["name"];
    $image_path = "../uploads";

    $new_image = $about_us_image;
    $old_image = $_POST['old_about_image'];

    // Check if a new image was provided
    if (!empty($new_image)) {
        $update_filename = $new_image;
        // Move the new image to the uploads directory
        move_uploaded_file($_FILES["about_us_image"]["tmp_name"], $image_path.'/'.$update_filename);
        // Remove the old image if it exists
        if (!empty($old_image) && file_exists($image_path.'/'.$old_image)) {
            unlink($image_path.'/'.$old_image);
        }
    } else {
        // No new image provided, use the old image
        $update_filename = $old_image;
    }

    $about_query = "UPDATE about_us SET about_us_short = '$short_text',
                    about_us_long = '$long_text', about_us_image = '$update_filename', about_us_header = '$about_us_header',
                    about_us_semi_header = '$about_us_semi_header' WHERE about_us_id = '2' ";

    $con = createConnectionToDatabase();
    $about_query_run = mysqli_query($con, $about_query);
    endConnectionToDatabase($con);

    if($about_query_run){
        header("Location: ../edit_about_us.php");
        exit;
    }
}
else if(isset($_POST['delete_about_us_image_btn'])){
    $image_path = "../uploads";
    $old_image = $_POST['old_about_image'];

    $con = createConnectionToDatabase();

    // Update the database to set the image column to NULL
    $delete_image_query = "UPDATE about_us SET about_us_image = NULL WHERE about_us_id = '2' ";
    $delete_image_query_run = mysqli_query($con, $delete_image_query);

    endConnectionToDatabase($con);

    if ($delete_image_query_run) {
        if (!empty($old_image) && file_exists($image_path.'/'.$old_image)) {
            // Delete the image from the server
            unlink($image_path.'/'.$old_image);
        }
        header('Location: ../edit_about_us.php');
        exit;
    }
}
else if(isset($_POST['add_slider_btn'])){
    $slider_name = $_POST["new_slider_name"];
    $slider_text = $_POST["new_slider_text"];
    $slider_link_name = $_POST["new_slider_link_name"];
    $slider_link = $_POST["new_slider_link"];
    $slider_status = isset($_POST["new_slider_status"]) ? '1' : '0';

    $slider_image = $_FILES["new_slider_image"]["name"];

    $image_path = "../uploads";

    $filename = $slider_image;

    if ($filename != "" && $slider_link != ""){

        $slider_query = "INSERT INTO sliders (slider_name, slider_text, slider_link_name, slider_link, sliders_status, slider_image)
                        VALUES ('$slider_name', '$slider_text', '$slider_link_name', '$slider_link', '$slider_status', '$filename')";

        $con = createConnectionToDatabase();
        $slider_query_run = mysqli_query($con, $slider_query);
        endConnectionToDatabase($con);
        
        if ($slider_query_run){
            move_uploaded_file($_FILES['new_slider_image']['tmp_name'], $image_path.'/'.$filename);
            $_SESSION['update_message'] = 'Slider ekleme başarılı oldu!';
        }
        else{
            $_SESSION['update_message'] = 'Slider ekleme başarısız oldu. Lütfen eklemeye çalıştığınız verileri gözden geçirin ve yeniden deneyin.';       
        }
    
        header("Location: ../hero_slider.php");
        exit;

   }

   else{
    header("Location: ../hero_slider.php");
    exit;
   }
}
else if(isset($_POST['update_slider_btn'])){
    $sliders_id = $_POST['sliders_id'];
    $slider_name = $_POST["new_slider_name"];
    $slider_text = $_POST["new_slider_text"];
    $slider_link_name = $_POST["new_slider_link_name"];
    $slider_link = $_POST['new_slider_link'];
    $sliders_status = isset($_POST["new_sliders_status"]) ? '1' : '0';

    $slider_image = $_FILES["new_slider_image"]["name"];

    $image_path = "../uploads";

    $new_image = $slider_image;
    $old_image = $_POST['old_image'];

    if ($new_image != ""){
        $update_filename = $new_image;
    }
    else{
        $update_filename = $old_image;
    }

    $update_product_query = "UPDATE sliders SET slider_name = '$slider_name', slider_text = '$slider_text',
        slider_link_name = '$slider_link_name', slider_link = '$slider_link', sliders_status = '$sliders_status',
        slider_image = '$update_filename' WHERE sliders_id = '$sliders_id'";
    
    $con = createConnectionToDatabase();
    $update_product_query_run = mysqli_query($con, $update_product_query);
    endConnectionToDatabase($con);

    if($update_product_query_run){
        if($_FILES["new_slider_image"]["name"] != ""){
            move_uploaded_file($_FILES["new_slider_image"]["tmp_name"], $image_path.'/'.$update_filename);
            if(file_exists($image_path.'/'.$old_image)){
                unlink($image_path.'/'.$old_image);
            }
        }
        header("Location: ../edit_slider.php?id=$sliders_id");
        exit;
    }
}
else if(isset($_POST['delete_slider_btn'])){
    $con = createConnectionToDatabase();
    $sliders_id = mysqli_real_escape_string($con, $_POST['sliders_id']);

    $slider_query = "SELECT * FROM sliders WHERE sliders_id = $sliders_id";
    $slider_query_run = mysqli_query($con, $slider_query);
    $slider_data = mysqli_fetch_array($slider_query_run);
    $image = $slider_data['slider_image'];

    $delete_query = "DELETE FROM sliders WHERE sliders_id = $sliders_id";
    $delete_query_run = mysqli_query($con, $delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image)){
            unlink("../uploads/".$image);
        }
        header("Location: ../hero_slider.php");
        exit;   
     // echo 200;     
    }
    else{
        echo "Silme işlemi sırasında beklenmedik bir hata oluştu...";
     //   echo 500;
    }

}



else{
    header('Location: ../settings.php');
    exit;
}
?>
