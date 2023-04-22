let menuIsOpen = false;

const btnMenuMobile = document.getElementById('btn-menu-mobile');
const mobileMenu = document.getElementById('mobile-menu');

const iconBtnMenuMobileClose = document.getElementById('icon-btn-menu-mobile-close');
const iconBtnMenuMobileOpen = document.getElementById('icon-btn-menu-mobile-open');


btnMenuMobile?.addEventListener('click', () => {
  menuIsOpen = !menuIsOpen;

  if (menuIsOpen) {
    mobileMenu?.classList.remove('opacity-0', '-translate-x-full');
    mobileMenu?.classList.add('translate-x-0', 'opacity-100');
    iconBtnMenuMobileClose?.classList.add('hidden');
    iconBtnMenuMobileOpen?.classList.remove('hidden');
  } else {
    mobileMenu?.classList.remove('translate-x-0', 'opacity-100');
    mobileMenu?.classList.add('opacity-0', '-translate-x-full');
    iconBtnMenuMobileClose?.classList.remove('hidden');
    iconBtnMenuMobileOpen?.classList.add('hidden');
  }

});