<?php

namespace Webkul\PackageGenerator\Console\Command;

class MigrationMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:migration {name} {package}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new migration.';
    
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('make:migration', [
            'name' => $this->argument('name').'s_table',
            '--path' => 'packages/Webkul/' . $this->argument('package') . '/src/Database/Migrations',
        ]);
    }
}