<?php

namespace App\Support;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

/**
 * Nettoyage du HTML saisi dans l'éditeur riche (CKEditor).
 *
 * Seules les balises que propose la barre d'outils sont conservées ; tout le reste
 * (scripts, attributs on*, styles, iframes, liens javascript:...) est supprimé.
 */
class RichText
{
    private static ?HtmlSanitizer $sanitizer = null;

    public static function sanitize(?string $html): ?string
    {
        if ($html === null) {
            return null;
        }

        return trim(self::sanitizer()->sanitize($html));
    }

    private static function sanitizer(): HtmlSanitizer
    {
        if (self::$sanitizer === null) {
            $config = (new HtmlSanitizerConfig())
                ->allowElement('p')
                ->allowElement('br')
                ->allowElement('strong')
                ->allowElement('b')
                ->allowElement('em')
                ->allowElement('i')
                ->allowElement('u')
                ->allowElement('ul')
                ->allowElement('ol')
                ->allowElement('li')
                ->allowElement('blockquote')
                ->allowElement('a', ['href', 'title', 'target'])
                ->allowLinkSchemes(['http', 'https', 'mailto', 'tel'])
                ->forceAttribute('a', 'rel', 'noopener noreferrer nofollow')
                ->withMaxInputLength(100000);

            self::$sanitizer = new HtmlSanitizer($config);
        }

        return self::$sanitizer;
    }
}
