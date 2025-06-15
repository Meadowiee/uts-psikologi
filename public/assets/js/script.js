document.addEventListener('DOMContentLoaded', function () {
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const toggle = item.querySelector('h3');
    toggle.addEventListener('click', () => {
      item.classList.toggle('faq-active');
    });
  });
});
