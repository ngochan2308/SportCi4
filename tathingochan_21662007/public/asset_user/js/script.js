// script.js

function addToCart(productId) {
    var cart = []; // You should retrieve the cart data from the server

    // Check if the product is already in the cart
    var existingProduct = cart.find(product => product.productId === productId);

    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        // Add the product to the cart
        cart.push({ productId: productId, quantity: 1 });
    }

    // Update the UI or send the cart data to the server for processing
    updateCartUI(cart);
}

function updateCartUI(cart) {
    // Implement UI updates here, e.g., update the cart icon or display a message
    console.log("Product added to cart:", cart);
}
