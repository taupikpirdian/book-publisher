<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Tailwind Configuration -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    serif: ['Merriweather', 'serif'],
                },
                colors: {
                    brand: {
                        50: '#f0fdfa',
                        100: '#ccfbf1',
                        500: '#14b8a6', // Teal
                        700: '#0f766e',
                        900: '#134e4a', // Dark Teal
                    },
                    paper: '#fafaf9',
                    ink: '#1c1917',
                }
            }
        }
    }
</script>

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<style>
    /* Custom styles for smooth scrolling and utilities */
    html {
        scroll-behavior: smooth;
    }
    .book-shadow {
        box-shadow: -5px 0 15px rgba(0,0,0,0.1), 5px 0 15px rgba(0,0,0,0.1);
    }
    .spine {
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: linear-gradient(to right, rgba(255,255,255,0.4), rgba(0,0,0,0.1));
        z-index: 10;
    }
</style>