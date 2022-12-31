<?php

namespace Webkul\PackageGenerator\Console\Command;

class RequestMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:request {name} {parent-package} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new request.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('request', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/'.$this->argument('parent-package') . '/Http/Requests/'.$this->argument('package')),
            'CLASS'     => $this->getClassName().'Request',
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('parent-package')) . '/src/Http/Requests/'.$this->argument('package');

        return $path . '/' . $this->getClassName() . 'Request.php';
    }
}