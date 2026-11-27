<?php

namespace Tests\Unit;

use App\Message;
use App\Support\RichText;
use App\User;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class RichTextTest extends TestCase
{
    public static function xssPayloads(): array
    {
        return [
            'script' => ['<p>ok</p><script>alert(1)</script>', 'alert'],
            'onerror' => ['<img src=x onerror=alert(1)>', 'onerror'],
            'onclick sur p' => ['<p onclick="alert(1)">x</p>', 'onclick'],
            'lien javascript' => ['<a href="javascript:alert(1)">x</a>', 'javascript:'],
            'lien javascript encodé' => ['<a href="jav&#x09;ascript:alert(1)">x</a>', 'ascript:'],
            'iframe' => ['<iframe src="https://evil.test"></iframe>', 'iframe'],
            'svg onload' => ['<svg onload=alert(1)>', 'onload'],
            'style' => ['<p style="background:url(javascript:alert(1))">x</p>', 'style'],
            'form' => ['<form action="https://evil.test"><input name=a></form>', '<form'],
        ];
    }

    #[DataProvider('xssPayloads')]
    public function test_dangerous_html_is_removed(string $payload, string $forbidden): void
    {
        $this->assertStringNotContainsStringIgnoringCase($forbidden, RichText::sanitize($payload));
    }

    public function test_editor_formatting_is_kept(): void
    {
        $html = '<p><strong>Gras</strong> <em>italique</em> <u>souligné</u></p>'
            . '<ul><li>un</li></ul><ol><li>deux</li></ol><blockquote><p>citation</p></blockquote>';

        $this->assertSame($html, RichText::sanitize($html));
    }

    public function test_links_are_kept_and_hardened(): void
    {
        $clean = RichText::sanitize('<a href="https://www.asfl21.fr" target="_blank">site</a>');

        $this->assertStringContainsString('href="https://www.asfl21.fr"', $clean);
        $this->assertStringContainsString('rel="noopener noreferrer nofollow"', $clean);
    }

    public function test_null_stays_null(): void
    {
        $this->assertNull(RichText::sanitize(null));
    }

    public function test_models_sanitize_on_write_and_read(): void
    {
        $user = new User();
        $user->description = '<p>Bonjour</p><script>alert(1)</script>';
        $this->assertSame('<p>Bonjour</p>', $user->getAttributes()['description'], 'nettoyé avant stockage');

        // Contenu "ancien" déjà présent en base, lu sans passer par le setter
        $message = (new Message())->setRawAttributes(['content' => '<p onmouseover="alert(1)">Salut</p>']);
        $this->assertSame('<p>Salut</p>', $message->content, 'nettoyé à la lecture');
    }
}
