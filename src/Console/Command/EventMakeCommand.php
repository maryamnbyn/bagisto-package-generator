<?php

namespace Webkul\PackageGenerator\Console\Command;

class EventMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:event {name} {parent-package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new event.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('event', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/'.$this->argument('parent-package') . '/Events'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('parent-package')) . '/src/Events';

        return $path . '/' . $this->getClassName() . 'Event.php';
    }
}