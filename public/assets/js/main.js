document.addEventListener('DOMContentLoaded', () => {
    // Sticky Header
    const header = document.querySelector('header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    });

    // Hamburger Menu (Overlay Toggle)
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    if (hamburger) {
        hamburger.addEventListener('click', () => {
            const isOpen = hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
            document.body.classList.toggle('menu-open', isOpen);
            document.documentElement.classList.toggle('menu-open', isOpen);
            if (isOpen) {
                document.body.style.overflow = 'hidden';
                document.documentElement.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
                document.documentElement.style.overflow = '';
            }
        });

        // Close menu on link click
        const navItems = navLinks.querySelectorAll('a');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.classList.remove('menu-open');
                document.documentElement.classList.remove('menu-open');
                document.body.style.overflow = '';
                document.documentElement.style.overflow = '';
            });
        });
    }

    // Lazy Loading Images
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        let lazyImageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    let lazyImage = entry.target;
                    if(lazyImage.dataset.src) {
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.classList.add('loaded');
                    }
                    lazyImageObserver.unobserve(lazyImage);
                }
            });
        });

        lazyImages.forEach(function(lazyImage) {
            lazyImageObserver.observe(lazyImage);
        });
    }

    // Scroll to Top Button Logic
    const scrollTopBtn = document.getElementById('scrollTopBtn');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});

// Smooth Breathing Preloader
(function() {
    function hidePreloader() {
        const preloader = document.getElementById('preloader');
        if(preloader) {
            preloader.style.transition = 'opacity 0.4s ease, visibility 0.4s ease';
            preloader.style.opacity = '0';
            setTimeout(() => {
                preloader.style.visibility = 'hidden';
                preloader.style.display = 'none';
            }, 400);
        }
    }

    if (document.readyState === 'complete') {
        setTimeout(hidePreloader, 250);
    } else {
        window.addEventListener('DOMContentLoaded', () => setTimeout(hidePreloader, 250));
        window.addEventListener('load', () => setTimeout(hidePreloader, 250));
    }
})();

// PWA Service Worker Registration & Install Trigger
(function() {
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/service-worker.js')
                .then((reg) => {
                    console.log('Thrive PWA Active:', reg.scope);
                })
                .catch((err) => {
                    console.warn('PWA SW Error:', err);
                });
        });
    }

    // Capture PWA beforeinstallprompt
    let deferredPrompt;
    window.addEventListener('beforeinstallprompt', (e) => {
        e.preventDefault();
        deferredPrompt = e;
        
        // Show subtle install floating banner if not already installed
        if (!localStorage.getItem('thrive_pwa_dismissed')) {
            showPwaInstallBanner();
        }
    });

    function showPwaInstallBanner() {
        if (document.getElementById('pwaInstallBanner')) return;
        const banner = document.createElement('div');
        banner.id = 'pwaInstallBanner';
        banner.innerHTML = `
            <div style="position: fixed; bottom: 25px; left: 25px; z-index: 99998; background: rgba(0, 11, 33, 0.95); backdrop-filter: blur(20px); border: 1px solid rgba(76,162,181,0.4); border-radius: 16px; padding: 14px 18px; display: flex; align-items: center; gap: 14px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); color: #fff; max-width: 360px; animation: slideUpPwa 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
                <img src="/assets/images/icons/icon-96x96.png" alt="Thrive" style="width: 42px; height: 42px; border-radius: 10px; flex-shrink: 0; box-shadow: 0 2px 10px rgba(0,0,0,0.3);">
                <div style="flex-grow: 1;">
                    <div style="font-size: 0.92rem; font-weight: 700; color: #fff; line-height: 1.2;">Thrive Tətbiqi</div>
                    <div style="font-size: 0.78rem; color: rgba(255,255,255,0.75); margin-top: 2px;">Cihazınıza quraşdırın</div>
                </div>
                <button id="pwaInstallBtn" style="background: linear-gradient(135deg, #003f82, #4ca2b5); border: none; color: #fff; padding: 8px 14px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; cursor: pointer; white-space: nowrap; box-shadow: 0 4px 12px rgba(76,162,181,0.4);">Quraşdır</button>
                <button id="pwaDismissBtn" style="background: transparent; border: none; color: rgba(255,255,255,0.5); font-size: 1.1rem; cursor: pointer; padding: 0 4px;">&times;</button>
            </div>
            <style>
                @keyframes slideUpPwa {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            </style>
        `;
        document.body.appendChild(banner);

        document.getElementById('pwaInstallBtn')?.addEventListener('click', async () => {
            if (deferredPrompt) {
                deferredPrompt.prompt();
                const { outcome } = await deferredPrompt.userChoice;
                if (outcome === 'accepted') {
                    console.log('User accepted PWA install');
                }
                deferredPrompt = null;
                banner.remove();
            }
        });

        document.getElementById('pwaDismissBtn')?.addEventListener('click', () => {
            banner.remove();
            localStorage.setItem('thrive_pwa_dismissed', '1');
        });
    }
})();
