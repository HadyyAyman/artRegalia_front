document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');
  
    // Form submit handler
    contactForm.addEventListener('submit', (e) => {
      const message = document.getElementById('message').value.trim();
      const attachment = document.getElementById('attachment').files[0];
  
      if (!message || !attachment) {
        e.preventDefault();
        alert('Please provide a message and select an attachment.');
      }
    });
  });
  