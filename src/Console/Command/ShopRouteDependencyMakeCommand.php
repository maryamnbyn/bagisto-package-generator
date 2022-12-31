<?php

namespace Webkul\PackageGenerator\Console\Command;

use Illuminate\Support\Str;
use Webkul\PackageGenerator\Generators\PackageGenerator;

class ShopRouteDependencyMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:route {name} {package}  {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new shop route file.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->packageGenerator->setConsole($this)
            ->setName($this->argument('name'))
            ->setParentPackage('RestApi')
            ->setPackage($this->argument('package'))
            ->setForce($this->option('force'))
            ->generate('route');
    }
}