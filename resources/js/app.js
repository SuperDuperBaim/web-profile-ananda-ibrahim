import Alpine from 'alpinejs';
import { initScrollReveal } from './scroll-reveal';

window.Alpine = Alpine;
Alpine.start();

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
  });
} else {
  initScrollReveal();
}
