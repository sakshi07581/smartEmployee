<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
class ListFilesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
  protected $signature = 'show-files:files
                        {type : Folder type (seeders, models, migrations, services, etc.)}';


    /**
     * The console command description.
     *
     * @var string
     */
  protected $description = 'List project files by type';



  private array $folders = [
    'seeders' => 'database/seeders',
    'migrations' => 'database/migrations',
    'models' => 'app/Models',
    'controllers' => 'app/Http/Controllers',
    'requests' => 'app/Http/Requests',
    'services' => 'app/Services',
    'repositories' => 'app/Repositories',
    'jobs' => 'app/Jobs',
    'events' => 'app/Events',
    'listeners' => 'app/Listeners',
    'notifications' => 'app/Notifications',
    'mail' => 'app/Mail',
    'policies' => 'app/Policies',
    'providers' => 'app/Providers',
    'middleware' => 'app/Http/Middleware',
    'commands' => 'app/Console/Commands',
    'traits' => 'app/Traits',
    'enums' => 'app/Enums',
];
    /**
     * Execute the console command.
     */
    public function handle()
{
    $type = strtolower($this->argument('type'));

    if (! isset($this->folders[$type])) {
        $this->error("Unknown type: {$type}");

        $this->line('');
        $this->info('Available types:');

        foreach (array_keys($this->folders) as $folder) {
            $this->line(" - {$folder}");
        }

        return self::FAILURE;
    }

    $path = base_path($this->folders[$type]);

    if (! File::exists($path)) {
        $this->error("Directory does not exist.");

        return self::FAILURE;
    }

    $files = File::allFiles($path);

    if (empty($files)) {
        $this->warn('No files found.');

        return self::SUCCESS;
    }

    $rows = [];

    foreach ($files as $file) {
        $rows[] = [
            pathinfo($file->getFilename(), PATHINFO_FILENAME),
            $file->getRelativePath(),
        ];
    }

    $this->table(
        ['Name', 'Folder'],
        $rows
    );

    return self::SUCCESS;
}
}
