/**
 * Éditeur de texte riche (CKEditor 5, licence GPL, hébergé localement).
 *
 * Transforme chaque <textarea class="ckeditor"> en éditeur.
 * Les fichiers de l'éditeur (~2 Mo) ne sont chargés que si la page en contient un.
 */
(() => {
    const BASE = document.currentScript.src.replace(/assets\/js\/editor\.js.*$/, 'assets/vendor/ckeditor5/');

    const loadScript = src => new Promise((resolve, reject) => {
        const s = document.createElement('script');
        s.src = src;
        s.onload = resolve;
        s.onerror = () => reject(new Error('Impossible de charger ' + src));
        document.head.appendChild(s);
    });

    const loadCss = href => {
        const l = document.createElement('link');
        l.rel = 'stylesheet';
        l.href = href;
        document.head.appendChild(l);
    };

    async function initEditors(textareas) {
        loadCss(BASE + 'ckeditor5.css');
        await loadScript(BASE + 'ckeditor5.umd.js');
        await loadScript(BASE + 'translations/fr.umd.js');

        const {
            ClassicEditor, Essentials, Paragraph, Bold, Italic, Underline,
            Link, AutoLink, List, BlockQuote, PasteFromOffice
        } = window.CKEDITOR;

        textareas.forEach(textarea => {
            // L'éditeur masque le textarea : un "required" natif bloquerait l'envoi
            // sans message visible. La validation reste faite côté serveur.
            textarea.removeAttribute('required');

            ClassicEditor.create(textarea, {
                licenseKey: 'GPL',
                language: 'fr',
                plugins: [Essentials, Paragraph, Bold, Italic, Underline, Link, AutoLink, List, BlockQuote, PasteFromOffice],
                toolbar: ['undo', 'redo', '|', 'bold', 'italic', 'underline', '|', 'link', 'bulletedList', 'numberedList', 'blockQuote'],
                placeholder: textarea.getAttribute('placeholder') || '',
                link: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                },
            }).then(editor => {
                // Garde le textarea synchronisé (validation Aire, brouillon, etc.)
                editor.model.document.on('change:data', () => editor.updateSourceElement());
            }).catch(error => console.error('CKEditor :', error));
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const textareas = document.querySelectorAll('textarea.ckeditor');
        if (textareas.length) {
            initEditors(textareas).catch(error => console.error(error));
        }
    });
})();
