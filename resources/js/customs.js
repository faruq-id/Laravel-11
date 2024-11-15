$(document).ready(function() {
   // Periksa preferensi dark mode yang disimpan saat halaman dimuat
   if (localStorage.getItem('theme') === 'dark') {
       $('html').addClass('dark');
   } else {
       $('html').removeClass('dark');
   }

   // Event toggle saat tombol diklik
   $('.costume-dark-mode').on('click', function() {
       const htmlElement = $('html');
       if (htmlElement.hasClass('dark')) {
           htmlElement.removeClass('dark');
           localStorage.setItem('theme', 'light');
       } else {
           htmlElement.addClass('dark');
           localStorage.setItem('theme', 'dark');
       }
   });
});


// Ambil tombol
const backToTopBtn = document.getElementById("backToTopBtn");

// Tampilkan tombol saat scroll lebih dari 100px
window.onscroll = function() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        backToTopBtn.classList.remove("hidden");
    } else {
        backToTopBtn.classList.add("hidden");
    }
};

// Saat tombol diklik, scroll ke atas
backToTopBtn.onclick = function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
};