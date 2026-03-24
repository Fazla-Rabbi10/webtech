// Fixed Unit Price
var unitPrice = 1000;

// Get elements
var quantity = document.getElementById("quantity");
var totalPrice = document.getElementById("totalPrice");

// Event Listener
quantity.addEventListener("input", calculateTotal);

function calculateTotal() {
    var qty = quantity.value;

    // Validation: prevent negative
    if (qty < 0) {
        alert("Quantity cannot be negative");
        quantity.value = 0;
        qty = 0;
    }

    // Calculate total
    var total = unitPrice * qty;

    // Show total
    totalPrice.value = total;

    // Gift coupon alert
    if (total > 1000) {
        alert("Congratulations! You are eligible for a gift coupon!");
    }
}