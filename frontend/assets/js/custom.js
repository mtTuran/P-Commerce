$(document).ready(function(){
    $(".add_to_cart_btn").click(function (e){
        e.preventDefault();

        var qty = 1;
        var products_id = $(this).val();

        // Send an AJAX request to the server to add the product to the cart
        $.ajax({
            method: 'POST',
            url: 'functions/handle_cart.php', 
            data: {
                'products_id': products_id,
                'product_qty': qty,
                'scope': 'add_single'
            },
            dataType: 'json',
            success: function(response) {
                // Handle the success response from the server
                console.log(response);

                // Display a success message to the user
                if (response.success) {

                    alertify.set('notifier','position', 'top-right');
                    alertify.success(response.message);
                    
                    // You can also update the UI, e.g., update a cart counter
                    updateCartCounter(response.cartItemCount);
                } else {
                    alert('Failed to add product to the cart. Please try again.');
                }
            },
            error: function(error) {
                // Handle the error response from the server
                console.error('Error:', error);

                // Display an error message to the user
                alert('An error occurred while adding the product to the cart. Please try again.');
            }
        });
    });

    // Function to update the cart counter
    function updateCartCounter(count) {
        // Implement your logic to update the UI, e.g., update a counter element
        $("#cartCounter").text(count);
    }
});
