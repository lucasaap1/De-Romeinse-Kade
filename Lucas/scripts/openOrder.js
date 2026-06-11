// order-popup.js

document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('open-order');

    const popup = document.createElement('div');
    popup.id = 'order-popup';
    popup.innerHTML = `
        <div class="rk-popup-overlay" id="rk-popup-overlay"></div>
        <div class="rk-popup-panel" role="dialog" aria-modal="true" aria-label="Order menu">
            <div class="rk-popup-header">
                <span>Uw bestelling</span>
                <button class="rk-popup-close" id="rk-popup-close" aria-label="Sluiten">&times;</button>
            </div>
            <div class="rk-popup-body" id="rk-popup-body">
                <p>Uw winkelwagen is leeg.</p>
            </div>
        </div>
    `;
    document.body.appendChild(popup);

    btn.addEventListener('click', function () {
        popup.classList.add('rk-popup-active');
        document.body.style.overflow = 'hidden';
    });

    document.getElementById('rk-popup-close').addEventListener('click', closePopup);

    // Sluit via overlay
    document.getElementById('rk-popup-overlay').addEventListener('click', closePopup);

    // Sluit via Escape
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closePopup();
    });

    function closePopup() {
        popup.classList.remove('rk-popup-active');
        document.body.style.overflow = '';
    }
}); 