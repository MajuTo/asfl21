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
    initCheckboxes();
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

function initCheckboxes() {
    document.querySelectorAll('input[type=checkbox]:not(:checked)')?.forEach(el => {
        el.parentElement.classList.add('notchecked')
    })
    document.querySelectorAll('input[type=checkbox]:checked')?.forEach(el => {
        el.parentElement.classList.add('checked')
    })
    document.querySelectorAll('input[type=checkbox]')?.forEach((checkbox) => {
        checkbox.addEventListener('click', e => {
            if (e.target.parentElement.classList.contains('checked')) {
                e.target.parentElement.classList.remove('checked')
                e.target.parentElement.classList.add('notchecked')
            } else {
                e.target.parentElement.classList.remove('notchecked')
                e.target.parentElement.classList.add('checked')
            }
        })
    })
}
