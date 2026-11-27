document.addEventListener("DOMContentLoaded", () => {
    // 1. Fermeture automatique des alertes flash après 5 secondes
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
    sizeContent();
    init_erasers();
});
window.addEventListener('resize', sizeContent);
function sizeContent() {
    const container = document.getElementById("content-container");
    if (container) {
        container.style.minHeight = (window.innerHeight - 160) + "px";
    }
}

//Dynamically assign height

// Confirm delete
function init_erasers(){
    document.querySelectorAll('.eraser').forEach(el => {
        el.addEventListener('click', e => {
            if( ! confirm("Confirmez la suppression") ) {
                e.preventDefault();
            }
        })
    })
}
