export function initScrollReveal() {
  const revealAll = () =>
    document
      .querySelectorAll('.reveal')
      .forEach((el) => el.classList.add('visible'));

  if (
    typeof IntersectionObserver === 'undefined' ||
    window.matchMedia('(prefers-reduced-motion: reduce)').matches
  ) {
    revealAll();
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      for (const entry of entries) {
        if (!entry.isIntersecting) {
          continue;
        }
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    },
    { threshold: 0.15, rootMargin: '0px 0px -10% 0px' }
  );

  document
    .querySelectorAll('.reveal')
    .forEach((el) => observer.observe(el));
}
