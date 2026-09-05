export function initSidebar() {
  const sidebar = document.getElementById('site-sidebar');
  const overlay = document.getElementById('sidebar-overlay');
  const mainContent = document.getElementById('main-content');
  const navLinks = document.querySelectorAll('.nav-link');
  const toggleBtn = document.getElementById('toggle-sidebar-btn');
  const openMobileBtn = document.getElementById('open-mobile-sidebar-btn');
  const sidebarBrand = sidebar ? sidebar.querySelector('.sidebar-brand') : null;
  const navLabels = sidebar ? sidebar.querySelectorAll('.nav-label') : [];

  const EXPANDED_W = 240;
  const COLLAPSED_W = 64;

  const isDesktop = () => window.innerWidth >= 768;

  // Track state
  let isExpanded = true;
  let isMobileOpen = false;

  // ─── Desktop: expand / collapse (icon rail) ───────────────────────────────
  function setDesktopExpanded(expanded) {
    isExpanded = expanded;
    if (!sidebar) return;

    if (expanded) {
      sidebar.style.width = `${EXPANDED_W}px`;
      if (sidebarBrand) sidebarBrand.style.opacity = '1';
      if (sidebarBrand) sidebarBrand.style.maxWidth = '160px';
      navLabels.forEach((l) => { l.style.opacity = '1'; l.style.maxWidth = '200px'; l.style.display = ''; });
      if (mainContent) mainContent.style.marginLeft = `${EXPANDED_W}px`;
    } else {
      sidebar.style.width = `${COLLAPSED_W}px`;
      if (sidebarBrand) sidebarBrand.style.opacity = '0';
      if (sidebarBrand) sidebarBrand.style.maxWidth = '0';
      navLabels.forEach((l) => { l.style.opacity = '0'; l.style.maxWidth = '0'; l.style.overflow = 'hidden'; });
      if (mainContent) mainContent.style.marginLeft = `${COLLAPSED_W}px`;
    }
  }

  // ─── Mobile: slide-in / slide-out ─────────────────────────────────────────
  function setMobileOpen(open) {
    isMobileOpen = open;
    if (!sidebar) return;

    if (open) {
      sidebar.classList.remove('-translate-x-full');
      sidebar.classList.add('translate-x-0');
      if (overlay) overlay.classList.remove('hidden');
      // always fully expand on mobile
      sidebar.style.width = `${EXPANDED_W}px`;
      if (sidebarBrand) { sidebarBrand.style.opacity = '1'; sidebarBrand.style.maxWidth = '160px'; }
      navLabels.forEach((l) => { l.style.opacity = '1'; l.style.maxWidth = '200px'; l.style.display = ''; });
    } else {
      sidebar.classList.add('-translate-x-full');
      sidebar.classList.remove('translate-x-0');
      if (overlay) overlay.classList.add('hidden');
    }
  }

  // ─── Initial state ─────────────────────────────────────────────────────────
  function init() {
    if (!sidebar) return;
    sidebar.style.transition = 'width 0.3s cubic-bezier(0.4,0,0.2,1), transform 0.3s cubic-bezier(0.4,0,0.2,1)';
    if (sidebarBrand) sidebarBrand.style.transition = 'opacity 0.25s ease, max-width 0.3s ease';
    navLabels.forEach((l) => {
      l.style.transition = 'opacity 0.25s ease, max-width 0.3s ease';
    });

    if (isDesktop()) {
      sidebar.classList.remove('-translate-x-full');
      sidebar.classList.add('translate-x-0');
      setDesktopExpanded(true);
    } else {
      setMobileOpen(false);
      if (mainContent) mainContent.style.marginLeft = '0';
    }
  }

  init();

  // ─── Events ────────────────────────────────────────────────────────────────
  if (toggleBtn) {
    toggleBtn.addEventListener('click', () => {
      if (isDesktop()) {
        setDesktopExpanded(!isExpanded);
      } else {
        // On mobile the toggle btn acts as close
        setMobileOpen(false);
      }
    });
  }

  if (openMobileBtn) {
    openMobileBtn.addEventListener('click', () => setMobileOpen(true));
  }

  if (overlay) {
    overlay.addEventListener('click', () => setMobileOpen(false));
  }

  navLinks.forEach((link) => {
    link.addEventListener('click', () => {
      if (!isDesktop()) setMobileOpen(false);
    });
  });

  // Responsive resize
  window.addEventListener('resize', () => {
    if (isDesktop()) {
      if (overlay) overlay.classList.add('hidden');
      sidebar.classList.remove('-translate-x-full');
      sidebar.classList.add('translate-x-0');
      setDesktopExpanded(isExpanded);
    } else {
      if (mainContent) mainContent.style.marginLeft = '0';
      if (!isMobileOpen) {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('translate-x-0');
      }
    }
  });

  // ─── ScrollSpy ─────────────────────────────────────────────────────────────
  const sectionIds = ['home', 'experience', 'projects', 'skills', 'contact'];
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
      { rootMargin: '-40% 0px -40% 0px', threshold: 0 }
    );

    sections.forEach((section) => observer.observe(section));
  }
}

document.addEventListener('DOMContentLoaded', initSidebar);
