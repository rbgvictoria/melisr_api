<?php

namespace App\Console\Commands;

use App\Actions\GenerateTypeList;
use App\Services\GenerateModelService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class GenerateModelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'specify-api:generate-model {--table=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates Eloquent model for table using Information Schema';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Generating type list');
        $generate = new GenerateTypeList;
        Config::set('melisr-api.types', $generate());

        $schema = env('SPECIFY_DB_DATABASE');
        $types = config('melisr-api.types');

        $table = $this->option('table');
        $type = $types[$table];
        $this->info("Generating $type model");

        $service = new GenerateModelService($schema, $table);
        $this->info("Done.");

        return Command::SUCCESS;
    }
}
