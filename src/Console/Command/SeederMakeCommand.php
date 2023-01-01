<?php

namespace Webkul\PackageGenerator\Console\Command;

class SeederMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:seeder {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new seeder.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('seeder', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/'.$this->argument('package') . '/Database/Seeders'),
            'CLASS'     => $this->getClassName().'TableSeeder',
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('package')) . '/src/Database/Seeders';

        return $path . '/' . $this->getClassName() . 'TableSeeder.php';
    }
    
}