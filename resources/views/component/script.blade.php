<!-- Script Initialize -->
<script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // Mobile Menu Toggle
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });

    // Navbar Scroll Effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            navbar.classList.add('shadow-sm', 'bg-white/95');
            navbar.classList.remove('bg-paper/90');
        } else {
            navbar.classList.remove('shadow-sm', 'bg-white/95');
            navbar.classList.add('bg-paper/90');
        }
    });
</script>