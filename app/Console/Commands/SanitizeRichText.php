<?php

namespace App\Console\Commands;

use App\Support\RichText;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Nettoie le HTML déjà stocké en base (contenus saisis avant la mise en place du filtre XSS).
 *
 * Travaille directement sur les tables (sans passer par les modèles) pour ne pas
 * déclencher d'effets de bord, comme le géocodage dans Address::save().
 */
class SanitizeRichText extends Command
{
    protected $signature = 'richtext:sanitize {--dry-run : Affiche ce qui serait modifié sans rien écrire}';

    protected $description = 'Nettoie le HTML des messages, descriptions de profil et d\'adresse (protection XSS)';

    /** @var array<string, string> table => colonne */
    private const COLUMNS = [
        'messages' => 'content',
        'users' => 'description',
        'addresses' => 'description',
    ];

    public function handle(): int
    {
        $dryRun = (bool) $this->option('dry-run');
        $total = 0;

        foreach (self::COLUMNS as $table => $column) {
            $changed = 0;

            DB::table($table)->whereNotNull($column)->orderBy('id')
                ->select(['id', $column])
                ->chunkById(100, function ($rows) use ($table, $column, $dryRun, &$changed) {
                    foreach ($rows as $row) {
                        $clean = RichText::sanitize($row->{$column});
                        if ($clean === $row->{$column}) {
                            continue;
                        }
                        $changed++;
                        if ($dryRun) {
                            $this->line("  {$table}#{$row->id} serait nettoyé");
                        } else {
                            DB::table($table)->where('id', $row->id)->update([$column => $clean]);
                        }
                    }
                });

            $this->info("{$table}.{$column} : {$changed} ligne(s) " . ($dryRun ? 'à nettoyer' : 'nettoyée(s)'));
            $total += $changed;
        }

        $this->info($dryRun ? "Simulation terminée ({$total} ligne(s) concernée(s))." : "Terminé ({$total} ligne(s) modifiée(s)).");

        return self::SUCCESS;
    }
}
