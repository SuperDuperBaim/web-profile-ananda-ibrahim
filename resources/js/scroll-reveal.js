export function initScrollReveal() {
  const elements = Array.from(document.querySelectorAll('.reveal'));
  if (!elements.length) return;

  function checkReveal() {
    const windowHeight = window.innerHeight || document.documentElement.clientHeight;
    const triggerBottom = windowHeight - 60; // 60px dari bawah layar

    elements.forEach((el) => {
      const rect = el.getBoundingClientRect();
      const isInView = rect.top < triggerBottom && rect.bottom > 0;
      const isBelowView = rect.top >= triggerBottom;

      if (isInView) {
        // Elemen masuk ke area tonton -> munculkan animasi pop-up
        el.classList.add('visible');
      } else if (isBelowView) {
        // Elemen di bawah area tonton -> pastikan sembunyi agar bisa pop-up saat di-scroll ke bawah
        el.classList.remove('visible');
      }
      // Jika di atas area tonton -> biarkan tetap 'visible'
    });
  }

  // Jalankan pemeriksaan langsung saat pertama dipanggil
  checkReveal();

  // Dan setiap kali scroll / resize
  window.addEventListener('scroll', checkReveal, { passive: true });
  window.addEventListener('resize', checkReveal, { passive: true });
}
