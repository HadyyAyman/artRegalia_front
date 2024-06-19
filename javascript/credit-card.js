document.addEventListener('DOMContentLoaded', () => {
    const paymentForm = document.getElementById('paymentForm');
    const cardNumberInput = document.getElementById('cardNumber');
    const expiryDateInput = document.getElementById('expiryDate');
  
    // Format card number input
    cardNumberInput.addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 16) value = value.slice(0, 16);
      e.target.value = value.replace(/(.{4})/g, '$1 ').trim();
    });
  
    // Format expiry date input
    expiryDateInput.addEventListener('input', (e) => {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 4) value = value.slice(0, 4);
      e.target.value = value.replace(/(.{2})/, '$1/');
    });
  
    // Form submit handler
    paymentForm.addEventListener('submit', (e) => {
      e.preventDefault();
      alert('Payment processed successfully!');
    });
  });