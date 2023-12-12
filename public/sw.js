

const CACHE_NAME = 'v5';

const urlsToCache = [
  '/',
  '/offline.html',
];

// Event listener for the 'install' event
self.addEventListener("install", function (event) {
    // Perform install steps
    console.log('Install event');
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            console.log('Opened cache');
            return cache.addAll(urlsToCache);
        })
    );
    // Force the waiting service worker to become the active service worker
    // self.skipWaiting();
});

self.addEventListener('activate', function(event) {
    // Activate event handling
    console.log('Activate event');
    const cacheWhitelist = [CACHE_NAME];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cacheName) => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        console.log('Deleting cache: ' + cacheName);
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Event listener for fetch events
self.addEventListener("fetch", function (event) {
    event.respondWith(checkResponse(event.request).catch(function () {
        // Use returnFromCache as a fallback if network fetch fails
        return returnFromCache(event.request);
    }));
    // Add non-HTTP(s) request resources to the cache
    if (!event.request.url.startsWith('http')) {
        event.waitUntil(addToCache(event.request));
    }
});

self.addEventListener('push', function(event) {
    handlePushNotification(event);
});

self.addEventListener('sync', function(event) {
    if (event.tag === 'background-sync') {
        event.waitUntil(backgroundSync());
    }
});

self.addEventListener('notificationclick', function(event) {
    // Code for handling notification click events
    console.log('Notification click event');
});

self.addEventListener('notificationclose', function(event) {
    // Code for handling notification close events
    console.log('Notification close event');
});

self.addEventListener('pushsubscriptionchange', function(event) {
    // Code for handling subscription change events
    console.log('Subscription change event');
});

self.addEventListener('message', function(event) {
    // Code for handling messages from the client
    console.log('Message event');
});



// Function to check the response of fetched requests
const checkResponse = function (request) {
    return new Promise(function (fulfill, reject) {
        fetch(request).then(function (response) {
            // Fulfill the promise if the response is not a 404 (not found)
            if (response.status !== 404) {
                fulfill(response);
            } else {
                // Reject the promise if a 404 response is received
                reject();
            }
        }, reject);
    });
};

// Function to add fetched requests to the cache
const addToCache = async function (request) {
    const cache = await caches.open(CACHE_NAME);
    const response = await fetch(request);
    // Add both the request and its response to the cache
    return await cache.put(request, response);
};

// Function to return cached responses
const returnFromCache = async function (request) {
    const cache = await caches.open(CACHE_NAME);
    const matching = await cache.match(request);
    // Return the cached response if available and not a 404; otherwise, return 'offline.html'
    if (!matching || matching.status === 404) {
        return cache.match('offline.html');
    } else {
        return matching;
    }
};

const handlePushNotification = function (event) {
    // Code for handling push notifications
    console.log('Push notification');
}

const backgroundSync = function () {
    // Code for background sync
    console.log('Background sync');
}