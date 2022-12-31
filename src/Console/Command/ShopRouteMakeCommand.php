<?php

namespace Webkul\PackageGenerator\Console\Command;

use Illuminate\Support\Str;
use Webkul\PackageGenerator\Generators\PackageGenerator;

class ShopRouteMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:route {name} {parent-package} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new shop route file.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('shop-routes', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'CONTROLLER_CLASS_NAME' => '',
            'LOWER_NAME' => $this->getLowerName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/'.$this->argument('parent-package')).'/src/Routes/'.$this->argument('package');

        return $path.'/'.$this->argument('name').'-routes.php';
    }
}