<?php

namespace Webkul\PackageGenerator\Generators;

use Illuminate\Config\Repository as Config;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Webkul\PackageGenerator\Package;

class PackageGenerator
{
    /**
     * The package vendor namespace
     *
     * @var string
     */
    protected $vendorNamespace;

    /**
     * The package name
     *
     * @var string
     */
    protected $parentPackageName;

    /**
     * The parent package name
     *
     * @var string
     */
    protected $packageName;

    /**
     * The name
     *
     * @var string
     */
    protected $name;



    /**
     * Repository object
     *
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * Filesystem object
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $filesystem;

    /**
     * Package object
     *
     * @var string
     */
    protected $package;

    /**
     * @var boolean
     */
    protected $plain;

    /**
     * @var boolean
     */
    protected $force;

    /**
     * @var boolean
     */
    protected $type = 'parent-package';

    /**
     * Contains subs files information
     *
     * @var string
     */
    protected $stubFiles = [
        'parent-package' => [
            'views/admin/layouts/style' => 'Resources/views/admin/layouts/style.blade.php',
            'views/admin/index' => 'Resources/views/admin/index.blade.php',
            'views/shop/default/index' => 'Resources/views/shop/default/index.blade.php',
            'views/shop/velocity/index' => 'Resources/views/shop/velocity/index.blade.php',
            'scaffold/admin-menu' => 'Config/admin-menu.php',
            'scaffold/acl' => 'Config/acl.php',
            'assets/js/app' => 'Resources/assets/js/app.js',
            'assets/sass/admin' => 'Resources/assets/sass/admin.scss',
            'assets/sass/default' => 'Resources/assets/sass/default.scss',
            'assets/sass/velocity' => 'Resources/assets/sass/velocity.scss',
            'assets/images/Icon-Temp' => 'Resources/assets/images/Icon-Temp.svg',
            'assets/images/Icon-Temp-Active' => 'Resources/assets/images/Icon-Temp-Active.svg',
            'assets/publishable/css/admin' => '../publishable/assets/css/admin.css',
            'assets/publishable/css/default' => '../publishable/assets/css/default.css',
            'assets/publishable/css/velocity' => '../publishable/assets/css/velocity.css',
            'assets/publishable/js/app' => '../publishable/assets/js/app.js',
            'assets/publishable/images/Icon-Temp' => '../publishable/assets/images/Icon-Temp.svg',
            'assets/publishable/images/Icon-Temp-Active' => '../publishable/assets/images/Icon-Temp-Active.svg',
            'webpack' => '../webpack.mix.js',
            'parent-package' => '../package.json',
        ],

        'payment' => [
            'scaffold/paymentmethods' => 'Config/paymentmethods.php',
            'scaffold/payment-method-system' => 'Config/system.php',
        ],

        'shipping' => [
            'scaffold/carriers' => 'Config/carriers.php',
            'scaffold/shipping-method-system' => 'Config/system.php',
        ]
    ];

    /**
     * Contains package file paths for creation
     *
     * @var array
     */
    protected $paths = [
        'parent-package' => [
            'config' => 'Config',
            'command' => 'Console/Commands',
            'migration' => 'Database/Migrations',
            'seeder' => 'Database/Seeders',
            'contracts' => 'Contracts',
            'model' => 'Models',
            'routes' => 'Http',
            'controller' => 'Http/Controllers',
            'filter' => 'Http/Middleware',
            'request' => 'Http/Requests',
            'provider' => 'Providers',
            'repository' => 'Repositories',
            'event' => 'Events',
            'listener' => 'Listeners',
            'emails' => 'Mail',
            'assets' => 'Resources/assets',
            'lang' => 'Resources/lang',
            'views' => 'Resources/views',
        ],

        'payment' => [
            'config' => 'Config',
            'payment' => 'Payment',
            'provider' => 'Providers',
        ],

        'shipping' => [
            'config' => 'Config',
            'carriers' => 'Carriers',
            'provider' => 'Providers',
        ]
    ];

    /**
     * The constructor.
     *
     * @param  \Illuminate\Config\Repository  $config
     * @param  \Illuminate\Filesystem\Filesystem  $filesystem
     * @param  \Webkul\PackageGenerator\Package  $package
     */
    public function __construct(
        Config $config,
        Filesystem $filesystem,
        Package $package
    ) {
        $this->config = $config;

        $this->filesystem = $filesystem;

        $this->package = $package;
    }

    /**
     * Set console
     *
     * @param  \Illuminate\Console\Command  $console
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setConsole($console)
    {
        $this->console = $console;

        return $this;
    }

    /**
     * Set name.
     *
     * @param  string  $name
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Set package.
     *
     * @param  string  $parentPackageName
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setParentPackage($parentPackageName)
    {
        $this->parentPackageName = $parentPackageName;

        return $this;
    }

    /**
     * Set package.
     *
     * @param  string  $packageName
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setPackage($packageName)
    {
        $this->packageName = $packageName;

        return $this;
    }

    /**
     * Set package plain.
     *
     * @param  string  $plain
     * @return Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setPlain($plain)
    {
        $this->plain = $plain;

        return $this;
    }

    /**
     * Set force status.
     *
     * @param  boolean  $force
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setForce($force)
    {
        $this->force = $force;

        return $this;
    }

    /**
     * Set type status.
     *
     * @param  boolean  $isPaymentPackage
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set isShippingPackage status.
     *
     * @param  boolean  $isShippingPackage
     * @return \Webkul\PackageGenerator\Generators\PackageGenerator
     */
    public function setIsShippingPackage($isShippingPackage)
    {
        $this->isShippingPackage = $isShippingPackage;

        return $this;
    }

    /**
     * Generate package
     *
     * @return void
     */
    public function generate($option = null)
    {
        if ($this->package->has($this->parentPackageName)) {
            if ($this->force) {
                $this->package->delete($this->parentPackageName);
            } else {
                $this->console->error("Package '{$this->parentPackageName}' already exist !");

                return;
            }
        }

//        $this->createFolders();

        if (!$this->plain && empty($option)) {
//            $this->createFiles();

            $this->createClasses();
        } else {
            $this->createRouteClasses();
        }

        $this->console->info("Package '{$this->parentPackageName}' created successfully.");
    }

    /**
     * Generate package folders
     *
     * @return void
     */
    public function createFolders()
    {
        foreach ($this->paths[$this->type] as $key => $folder) {
            $path = base_path('packages/'.$this->parentPackageName.'/src').'/'.$folder;

            $this->filesystem->makeDirectory($path, 0755, true);
        }
    }

    /**
     * Generate package files
     *
     * @return void
     */
    public function createFiles()
    {
        $variables = $this->getStubVariables();

        foreach ($this->stubFiles[$this->type] as $stub => $file) {
            $path = base_path('packages/'.$this->parentPackageName.'/src').'/'.$file;

            if (!$this->filesystem->isDirectory($dir = dirname($path))) {
                $this->filesystem->makeDirectory($dir, 0775, true);
            }

            $this->filesystem->put($path, $this->getStubContents($stub, $variables));

            $this->console->info("Created file : {$path}");
        }
    }

    /**
     * Generate package classes
     *
     * @return void
     */
    public function createClasses()
    {

        if ($this->type == 'parent-package') {
            $this->console->call('bagisto:make:provider', [
                'name' => $this->name.'ServiceProvider',
                'parent-package' => $this->parentPackageName,
            ]);


            $this->console->call('bagisto:make:model', [
                'name' => $this->name,
                'parent-package' => $this->parentPackageName,
            ]);

            $this->console->call('bagisto:make:repository', [
                'name' => $this->name,
                'parent-package' => $this->parentPackageName,
            ]);
            $this->console->call('bagisto:make:request', [
                'name' => $this->name,
                'package' => $this->packageName,
            ]);

            $this->console->call('bagisto:make:controller', [
                'name' => $this->name,
                'package' => $this->packageName,
            ]);

            $this->console->call('bagisto:make:route', [
                'name' => $this->name,
                'package' => $this->packageName,
            ]);
        } else {
            if ($this->type == 'payment') {
                $this->console->call('bagisto:make-payment-method-provider', [
                    'name' => $this->parentPackageName.'ServiceProvider',
                    'parent-package' => $this->parentPackageName,
                ]);

                $this->console->call('bagisto:make-payment', [
                    'name' => $this->parentPackageName,
                    'parent-package' => $this->parentPackageName,
                ]);
            } else {
                if ($this->type == 'shipping') {
                    $this->console->call('bagisto:make-shipping-method-provider', [
                        'name' => $this->parentPackageName.'ServiceProvider',
                        'parent-package' => $this->parentPackageName,
                    ]);

                    $this->console->call('bagisto:make-shipping', [
                        'name' => $this->parentPackageName,
                        'parent-package' => $this->parentPackageName,
                    ]);
                }
            }
        }
    }

    /**
     * Generate package classes
     *
     * @return void
     */
    public function createRouteClasses()
    {
        $this->console->call('bagisto:make:request', [
            'name' => $this->name,
            'package' => $this->packageName,
        ]);

        $this->console->call('bagisto:make:controller', [
            'name' => $this->name,
            'package' => $this->packageName,
        ]);

        $this->console->call('bagisto:route', [
            'name' => 'api',
            'parent-package' => $this->packageName,
        ]);
    }

    /**
     * @return array
     */
    protected function getStubVariables()
    {
        return [
            'LOWER_NAME' => $this->getLowerName(),
            'CAPITALIZE_NAME' => $this->getCapitalizeName(),
            'PACKAGE' => $this->getClassNamespace($this->parentPackageName),
            'CLASS' => $this->getClassName(),
        ];
    }

    /**
     * @return string
     */
    protected function getClassName()
    {
        return class_basename($this->parentPackageName);
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function getClassNamespace($name)
    {
        return str_replace('/', '\\', $name);
    }

    /**
     * Returns content of stub file
     *
     * @param  string  $stub
     * @param  array  $variables
     * @return string
     */
    public function getStubContents($stub, $variables = [])
    {
        $path = __DIR__.'/../stubs/'.$stub.'.stub';

        $contents = file_get_contents($path);

        foreach ($variables as $search => $replace) {
            $contents = str_replace('$'.strtoupper($search).'$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * @return string
     */
    protected function getCapitalizeName()
    {
        return ucwords(class_basename($this->parentPackageName));
    }

    /**
     * @return string
     */
    protected function getLowerName()
    {
        return strtolower(class_basename($this->parentPackageName));
    }
}