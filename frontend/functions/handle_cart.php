<?php

session_start();
include "../../admin/config/dbcon.php";

if (isset($_POST['scope'])){
    $scope = $_POST['scope'];
    switch ($scope){
        case 'add_single':
            $prod_id = $_POST['products_id'];
            $prod_qty = $_POST['product_qty'];

            // Check if the cart array exists in the session
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            // Check if the product is already in the cart
            $product_exists = false;
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $prod_id) {
                    // Product already exists in the cart, update quantity
                    $item['quantity'] += $prod_qty;
                    $product_exists = true;
                    break;
                }
            }

            // If the product is not in the cart, add it
            if (!$product_exists) {
                $new_item = array(
                    'id' => $prod_id,
                    'quantity' => $prod_qty
                );
                $_SESSION['cart'][] = $new_item;
            }

            // Prepare the response with the updated cart and a success message
            $response = array(
                'success' => true,
                'message' => 'Ürün sepete eklendi!',
                'cart' => $_SESSION['cart']
            );

            echo json_encode($_SESSION['response']); // Send the updated cart as a JSON response
            break;

        default:
            echo json_encode(array('error' => 'Invalid scope'));

    }
    
}
else {
    echo json_encode(array('error' => 'Scope not set'));
}

?>