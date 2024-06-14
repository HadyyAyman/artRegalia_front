function showDeliveryDetailsForm() {
    document.getElementById("customer-address-form").style.display = "none";
    document.getElementById("delivery-details-form").style.display = "block";
}

function showPaymentMethodForm() {
    document.getElementById("delivery-details-form").style.display = "none";
    document.getElementById("payment-method-form").style.display = "block";
}