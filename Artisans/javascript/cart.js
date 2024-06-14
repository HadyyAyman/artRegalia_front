// Selecting the buttons and quantity value
// const decreaseBtn = document.querySelector('.decrease-btn');
// const increaseBtn = document.querySelector('.increase-btn');
// const quantityValue = document.querySelector('.quantity-value');

// Variable to store the current quantity value
// let currentValue = parseInt(quantityValue.textContent);

// Adding click event listeners to the buttons
// decreaseBtn.addEventListener('click', function() {
//     // Decreasing the value if it's greater than 1
//     if (currentValue > 1) {
//         currentValue--;
//     }
//     // Update the quantity value displayed on the page
//     quantityValue.textContent = currentValue;
// });

// increaseBtn.addEventListener('click', function() {
//     // Increasing the value
//     currentValue++;
//     // Update the quantity value displayed on the page
//     quantityValue.textContent = currentValue;
// });

function cart() {
  document.addEventListener("DOMContentLoaded", function () {
    // Handle increase button
    const increaseBtn = document.querySelector(".increase-btn");
    const decreaseBtn = document.querySelector(".decrease-btn");
    const quantityValue = document.querySelector(".quantity-value");
    const priceElement = document.querySelector(".product-price .price");
    const subtotalElement = document.querySelector(".subtotal .price");

    let quantity = parseInt(quantityValue.textContent, 10);
    const pricePerUnit = parseInt(priceElement.textContent, 10);

    increaseBtn.addEventListener("click", function (event) {
      event.preventDefault(); // Prevent form submission
      quantity += 1;
      quantityValue.textContent = quantity;
      updateSubtotal();
    });

    decreaseBtn.addEventListener("click", function (event) {
      event.preventDefault(); // Prevent form submission
      if (quantity > 1) {
        quantity -= 1;
        quantityValue.textContent = quantity;
        updateSubtotal();
      }
    });

    function updateSubtotal() {
      const newSubtotal = quantity * pricePerUnit;
      subtotalElement.textContent = newSubtotal;
    }

    // Handle remove button
    const removeBtn = document.querySelector(".remove-btn");
    removeBtn.addEventListener("click", function () {
      const cartItem = document.querySelector(".cart-item");
      cartItem.remove(); // Remove the item from the cart
      updateSubtotal(); // Update subtotal after item removal
    });
  });
}

cart();
