var navigationLinks = document.querySelectorAll('header nav a');
var menuToggle = document.getElementById('menu-toggle');
var mainNav = document.getElementById('main-nav');
var dark = document.querySelector('body');

menuToggle.addEventListener('click', function() {
    this.classList.toggle('active');
    mainNav.classList.toggle('active');
    dark.classList.toggle('active');
});

// Loop melalui tautan navigasi dan tambahkan kelas aktif pada tautan yang sesuai dengan halaman saat ini
navigationLinks.forEach(link => {
    if (link.href === window.location.href) {
        link.classList.add("active");
    }
});