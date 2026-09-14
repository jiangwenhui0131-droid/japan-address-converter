<?php

namespace App\Console\Commands;

use App\Models\PostalCode;
use Illuminate\Console\Command;

class ImportPostalCodes extends Command
{
    protected $signature = 'postal:import';

    protected $description = 'Import Japan Post postal code data';

    public function handle()
    {
        $file = base_path('KEN_ALL_ROME_UTF8.CSV');

        if (!file_exists($file)) {
            $this->error("CSV file not found: {$file}");
            return Command::FAILURE;
        }

        $this->info('Importing postal code data...');

        $handle = fopen($file, 'r');

        if ($handle === false) {
            $this->error('Failed to open CSV file.');
            return Command::FAILURE;
        }

        $count = 0;

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < 7) {
                continue;
            }

            PostalCode::create([
                'postal_code' => $row[0],
                'prefecture' => $row[1],
                'city' => $row[2],
                'town' => $row[3],
                'prefecture_romaji' => $row[4],
                'city_romaji' => $row[5],
                'town_romaji' => $row[6],
            ]);

            $count++;

            if ($count % 1000 === 0) {
                $this->info("Imported: {$count}");
            }
        }

        fclose($handle);

        $this->info("Import completed: {$count} records.");

        return Command::SUCCESS;
    }
}
