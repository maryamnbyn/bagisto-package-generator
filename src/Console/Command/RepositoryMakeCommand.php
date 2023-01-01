<?php

namespace Webkul\PackageGenerator\Console\Command;

class RepositoryMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:repository {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('repository', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE'      => $this->getClassNamespace('Webkul/'.$this->argument('package') . '/Repositories'),
            'CLASS'          => $this->getClassName().'Repository',
            'CONTRACT_CLASS' => $this->getClassNamespace('Webkul/'.$this->argument('package') . '/Contracts/' . $this->getContractName()),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('package')) . '/src/Repositories';

        return $path . '/' . $this->getClassName() . 'Repository.php';
    }

    /**
     * @return string
     */
    protected function getContractName()
    {
        return str_replace('Repository', '', $this->argument('name'));
    }
}