<?php

namespace Webkul\PackageGenerator\Console\Command;

class ListenerMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:listener {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new listener.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('listener', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/'.$this->argument('package') . '/Listeners'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('package')) . '/src/Listeners';

        return $path . '/' . $this->getClassName() . '.php';
    }
}