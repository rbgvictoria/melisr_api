<?php

namespace App\Console\Commands;

use App\Actions\GenerateTypeList;
use App\Services\GenerateGraphQLTypeService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class GenerateGraphQlTypesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'specify-api:generate-graphql-types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate GraphQL Types based on MySQL Information Schema';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Generating type list");
        $generate = new GenerateTypeList;
        Config::set('melisr-api.types', $generate());

        $schema = env('SPECIFY_DB_DATABASE');
        $types = config('melisr-api.types');
        foreach ($types as $table => $type) {
            $this->info("Generating $type GraphQL Type");
            $service = new GenerateGraphQLTypeService($schema, $table);
            file_put_contents(app_path('GraphQL/Types/' . $type . '.graphql'), $service->generateType());
            if (in_array($table, config('melisr-api.searchable_tables'))) {
                $this->info("Generating {$type}FilterInput input");
                file_put_contents(app_path('GraphQL/Inputs/' . $type . 'FilterInput.graphql'), $service->generateFilterInput());
            }
        }
        $this->info("Done.");
        return Command::SUCCESS;
    }
}
