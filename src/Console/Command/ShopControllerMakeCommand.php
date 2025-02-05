<?php

namespace Webkul\PackageGenerator\Console\Command;

use Webkul\PackageGenerator\Generators\PackageGenerator;

class ShopControllerMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:shop-controller {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new shop controller.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('shop-controller', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/RestApi/Http/Controllers/'.$this->argument('package')),
            'CLASS'     => $this->argument('name').'Controller',
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/RestApi/src/Http/Controllers/'.$this->argument('package'));


        return $path . '/' . $this->getClassName() . 'Controller.php';
    }
}