// Function to hide the install button
function hideInstallButton() {
    // Hide the install button
    let installBtn = document.getElementById('installBtn');
    if (installBtn) {
        installBtn.style.display = 'none';
    }
}

// Check if the app is already installed
if (window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone === true) {
    hideInstallButton();
}

// Deferred Prompt for Add to Home Screen
let deferredPrompt;

// Event Listener for beforeinstallprompt
window.addEventListener('beforeinstallprompt', (e) => {
    console.log('beforeinstallprompt event fired');
    e.preventDefault();
    deferredPrompt = e;
    // Update UI to show the install PWA button
    showInstallPromotion();
});

// Show install promotion modal
function showInstallPromotion() {
    let installModal = document.getElementById('installModal');
    if (installModal) {
        installModal.style.display = 'block';
    }
}

// Event Listener for Install Button
document.getElementById('installBtn').addEventListener('click', async () => {
    hideInstallButton();
    deferredPrompt.prompt(); // Show the install prompt
    const { outcome } = await deferredPrompt.userChoice; // Wait for the user to respond
    console.log(`User response to the install prompt: ${outcome}`);
    deferredPrompt = null;
});

// Event Listener for Closing the Install Modal
document.querySelector('.close').addEventListener('click', hideInstallButton);
