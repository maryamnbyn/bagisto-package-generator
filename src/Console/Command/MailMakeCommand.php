<?php

namespace Webkul\PackageGenerator\Console\Command;

class MailMakeCommand extends MakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bagisto:make:mail {name} {parent-package} {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new mail.';

    /**
     * @return mixed
     */
    protected function getStubContents()
    {
        return $this->packageGenerator->getStubContents('mail', $this->getStubVariables());
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'NAMESPACE' => $this->getClassNamespace('Webkul/'.$this->argument('parent-package') . '/Mail'),
            'CLASS'     => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getSourceFilePath()
    {
        $path = base_path('packages/Webkul/' . $this->argument('parent-package')) . '/src/Mail';

        return $path . '/' . $this->getClassName() . '.php';
    }
}