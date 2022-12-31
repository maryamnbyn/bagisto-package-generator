<?php

namespace Webkul\PackageGenerator\Console\Command;

class ModelContractMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:model-contract {name} {parent-package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new model contract.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('model-contract', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/'.$this->argument('parent-package') . '/Contracts'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('parent-package')) . '/src/Contracts';

        return $path . '/' . $this->getClassName() . '.php';
    }
    
}