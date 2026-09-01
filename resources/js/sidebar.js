export function initSidebar() {
  const openBtn = document.getElementById('open-sidebar-btn');
  const closeBtn = document.getElementById('close-sidebar-btn');
  const sidebar = document.getElementById('site-sidebar');
  const overlay = document.getElementById('sidebar-overlay');
  const navLinks = document.querySelectorAll('.nav-link');

  function openMenu() {
    if (sidebar) sidebar.classList.remove('-translate-x-full');
    if (sidebar) sidebar.classList.add('translate-x-0');
    if (overlay) overlay.classList.remove('hidden');
  }

  function closeMenu() {
    if (sidebar) sidebar.classList.remove('translate-x-0');
    if (sidebar) sidebar.classList.add('-translate-x-full');
    if (overlay) overlay.classList.add('hidden');
  }

  if (openBtn) openBtn.addEventListener('click', openMenu);
  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  if (overlay) overlay.addEventListener('click', closeMenu);

  navLinks.forEach((link) => {
    link.addEventListener('click', () => {
      closeMenu();
    });
  });

  // ScrollSpy Active Link Tracking
  const sectionIds = ['home', 'about', 'experience', 'projects', 'skills', 'contact'];
  const sections = sectionIds
    .map((id) => document.getElementById(id))
    .filter((el) => el !== null);

  if ('IntersectionObserver' in window && sections.length > 0) {
    const observer = new IntersectionObserver(
      (entries) => {
        const visible = entries
          .filter((entry) => entry.isIntersecting)
          .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top);

        if (visible.length > 0) {
          const activeId = visible[0].target.id;
          navLinks.forEach((link) => {
            const href = link.getAttribute('href');
            if (href === `#${activeId}`) {
              link.classList.add('bg-muted', 'font-medium', 'text-foreground');
              link.classList.remove('text-muted-foreground');
              link.setAttribute('aria-current', 'page');
            } else {
              link.classList.remove('bg-muted', 'font-medium', 'text-foreground');
              link.classList.add('text-muted-foreground');
              link.removeAttribute('aria-current');
            }
          });
        }
      },
      { rootMargin: '-50% 0px -50% 0px', threshold: 0 }
    );

    sections.forEach((section) => observer.observe(section));
  }
}

// Initialize on DOM load
document.addEventListener('DOMContentLoaded', initSidebar);

