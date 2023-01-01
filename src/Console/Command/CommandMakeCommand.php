<?php

namespace Webkul\PackageGenerator\Console\Command;

class CommandMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:command {name} {package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new command.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('command', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul'.$this->argument('package') . '/Console/Commands'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('package')) . '/src/Console/Commands';

        return $path . '/' . $this->getClassName() . 'Command.php';
    }
}