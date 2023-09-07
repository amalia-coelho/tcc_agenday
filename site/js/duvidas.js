const faqToggles = document.querySelectorAll('.faq-toggle');

faqToggles.forEach(toggle => {
  toggle.addEventListener('click', () => {
    const faq = toggle.parentElement;
    const content = toggle.nextElementSibling;

    faq.classList.toggle('active');
    if (faq.classList.contains('active')) {
      content.style.display = 'block';
      if (faq.nextElementSibling) {
        faq.nextElementSibling.style.marginTop = `${content.clientHeight + 55}px`;
      }
    } else {
      content.style.display = 'none';
      if (faq.nextElementSibling) {
        faq.nextElementSibling.style.marginTop = '0';
      }
    }
  });
});

