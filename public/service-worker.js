const CACHE_NAME = 'thrive-pwa-v1';
const STATIC_ASSETS = [
    '/',
    '/manifest.json',
    '/assets/css/style.css',
    '/assets/js/main.js',
    '/assets/images/logo.png',
    '/assets/images/thriveprep-logo.png',
    '/assets/images/icons/icon-192x192.png',
    '/assets/images/icons/icon-512x512.png',
    '/graduates',
    '/thrive-prep',
    '/thrive-portal',
    '/thrive-mobile'
];

// Install Event - Pre-cache essential assets
self.addEventListener('install', (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll(STATIC_ASSETS).catch((err) => {
                console.warn('PWA Pre-cache partial fail:', err);
            });
        }).then(() => self.skipWaiting())
    );
});

// Activate Event - Clean up old caches
self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keys) => {
            return Promise.all(
                keys.map((key) => {
                    if (key !== CACHE_NAME) {
                        return caches.delete(key);
                    }
                })
            );
        }).then(() => self.clients.claim())
    );
});

// Fetch Event - Network first for HTML, Stale-while-revalidate for static assets
self.addEventListener('fetch', (event) => {
    const request = event.request;
    if (request.method !== 'GET') return;

    const url = new URL(request.url);

    // Skip admin panel and live chat widgets from service worker interception
    if (url.pathname.startsWith('/admin') || url.hostname.includes('onwebchat') || url.hostname.includes('google')) {
        return;
    }

    // HTML navigation requests - Network first with cache fallback
    if (request.mode === 'navigate') {
        event.respondWith(
            fetch(request).catch(() => {
                return caches.match(request).then((response) => {
                    if (response) return response;
                    return caches.match('/');
                });
            })
        );
        return;
    }

    // Static assets - Cache first or Stale-While-Revalidate
    event.respondWith(
        caches.match(request).then((cachedResponse) => {
            const fetchPromise = fetch(request).then((networkResponse) => {
                if (networkResponse && networkResponse.status === 200) {
                    const responseClone = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(request, responseClone);
                    });
                }
                return networkResponse;
            }).catch(() => cachedResponse);

            return cachedResponse || fetchPromise;
        })
    );
});