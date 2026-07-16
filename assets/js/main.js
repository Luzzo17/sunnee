const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
const mainNavigation = document.querySelector('.main-navigation');

if (mobileMenuToggle && mainNavigation) {
    mobileMenuToggle.addEventListener('click', function () {
        const isOpen = mobileMenuToggle.getAttribute('aria-expanded') === 'true';

        mobileMenuToggle.setAttribute('aria-expanded', String(!isOpen));
        mobileMenuToggle.classList.toggle('is-open');
        mainNavigation.classList.toggle('is-open');
    });
}
