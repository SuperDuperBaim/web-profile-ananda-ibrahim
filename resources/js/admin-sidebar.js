export function initAdminSidebar() {
  const openBtn = document.getElementById('admin-open-sidebar-btn');
  const closeBtn = document.getElementById('admin-close-sidebar-btn');
  const sidebar = document.getElementById('admin-sidebar');
  const overlay = document.getElementById('admin-sidebar-overlay');

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
}

document.addEventListener('DOMContentLoaded', initAdminSidebar);
