<?php

namespace App\Casts;

use App\Support\RichText;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * Attribut contenant du HTML issu de l'éditeur riche.
 *
 * Nettoyé à l'écriture (rien de dangereux n'est stocké) et à la lecture
 * (protège aussi les contenus enregistrés avant la mise en place du filtre).
 */
class RichTextHtml implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        return RichText::sanitize($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): ?string
    {
        return RichText::sanitize($value);
    }
}
