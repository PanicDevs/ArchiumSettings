<?php

declare(strict_types=1);

use Nwidart\Modules\Activators\FileActivator;
use Nwidart\Modules\Providers\ConsoleServiceProvider;

return [
    /*
    |--------------------------------------------------------------------------
    | Archium Version Code
    |--------------------------------------------------------------------------
    |
    | Used to validate and apply updates and patches.
    |
    */
    'archium_version' => '1.1.1',
    
    /*
    |--------------------------------------------------------------------------
    | Module Namespace
    |--------------------------------------------------------------------------
    |
    | Default module namespace.
    |
    */
    'namespace' => 'Modules',

    /*
    |--------------------------------------------------------------------------
    | Module Stubs
    |--------------------------------------------------------------------------
    |
    | Default module stubs.
    |
    */
    'stubs' => [
        'enabled' => false,
        'path'    => base_path('modules/Base/stubs/light-weight-modules'),
        'files'   => [
            'composer' => 'composer.json',
        ],
        'replacements' => [
            'json'     => ['LOWER_NAME', 'STUDLY_NAME', 'MODULE_NAMESPACE', 'PROVIDER_NAMESPACE'],
            'composer' => [
                'LOWER_NAME',
                'STUDLY_NAME',
                'VENDOR',
                'AUTHOR_NAME',
                'AUTHOR_EMAIL',
                'MODULE_NAMESPACE',
                'PROVIDER_NAMESPACE',
            ],
        ],
        'gitkeep' => false,
    ],
    'paths' => [
        /*
        |--------------------------------------------------------------------------
        | Modules path
        |--------------------------------------------------------------------------
        |
        | This path is used to save the generated module.
        | This path will also be added automatically to the list of scanned folders.
        |
        */
        'modules' => base_path('modules'),

        /*
        |--------------------------------------------------------------------------
        | Modules assets path
        |--------------------------------------------------------------------------
        |
        | Here you may update the modules' assets path.
        |
        */
        'assets' => public_path('modules'),

        /*
        |--------------------------------------------------------------------------
        | The migrations' path
        |--------------------------------------------------------------------------
        |
        | Where you run the 'module:publish-migration' command, where do you publish the
        | the migration files?
        |
        */
        'migration' => base_path('database/migrations'),

        /*
        |--------------------------------------------------------------------------
        | The app path
        |--------------------------------------------------------------------------
        |
        | app folder name
        | for example can change it to 'src' or 'App'
        */
        'app_folder' => 'app/',

        /*
        |--------------------------------------------------------------------------
        | Generator path
        |--------------------------------------------------------------------------
        | Customise the paths where the folders will be generated.
        | Setting the generate key to false will not generate that folder
        */
        'generator' => [
            'channels'        => ['path' => 'app/Broadcasting', 'generate' => false],
            'command'         => ['path' => 'app/Console', 'generate' => false],
            'emails'          => ['path' => 'app/Emails', 'generate' => false],
            'event'           => ['path' => 'app/Events', 'generate' => false],
            'jobs'            => ['path' => 'app/Jobs', 'generate' => false],
            'listener'        => ['path' => 'app/Listeners', 'generate' => false],
            'model'           => ['path' => 'app/Models', 'generate' => false],
            'notifications'   => ['path' => 'app/Notifications', 'generate' => false],
            'observer'        => ['path' => 'app/Observers', 'generate' => false],
            'policies'        => ['path' => 'app/Policies', 'generate' => false],
            'provider'        => ['path' => 'app/Providers', 'generate' => false],
            'route-provider'  => ['path' => 'app/Providers', 'generate' => false],
            'repository'      => ['path' => 'app/Repositories', 'generate' => false],
            'resource'        => ['path' => 'app/Transformers', 'generate' => false],
            'rules'           => ['path' => 'app/Rules', 'generate' => false],
            'component-class' => ['path' => 'app/View/Components', 'generate' => false],
            'controller'      => ['path' => 'app/Http/Controllers', 'generate' => false],
            'filter'          => ['path' => 'app/Http/Middleware', 'generate' => false],
            'request'         => ['path' => 'app/Http/Requests', 'generate' => false],
            'config'          => ['path' => 'config', 'generate' => false],
            'migration'       => ['path' => 'database/migrations', 'generate' => false],
            'seeder'          => ['path' => 'database/seeders', 'namespace' => 'Database\Seeders', 'generate' => false],
            'factory'         => ['path' => 'database/factories', 'namespace' => 'Database\Factories', 'generate' => false],
            'lang'            => ['path' => 'lang', 'generate' => false],
            'assets'          => ['path' => 'resources/assets', 'generate' => false],
            'views'           => ['path' => 'resources/views', 'generate' => false],
            'component-view'  => ['path' => 'resources/views/components', 'generate' => false],
            'routes'          => ['path' => 'routes', 'generate' => false],
            'test-unit'       => ['path' => 'tests/Unit', 'generate' => false],
            'test-feature'    => ['path' => 'tests/Feature', 'generate' => false],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Package commands
    |--------------------------------------------------------------------------
    |
    | Here you can define which commands will be visible and used in your
    | application. You can add your own commands to merge section.
    |
    */
    'commands' => ConsoleServiceProvider::defaultCommands()
        ->merge([
            // New commands go here
        ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Scan Path
    |--------------------------------------------------------------------------
    |
    | Here you define which folder will be scanned. By default will scan vendor
    | directory. This is useful if you host the package in packagist website.
    |
    */
    'scan' => [
        'enabled' => false,
        'paths'   => [
            base_path('vendor/*/*'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Composer File Template
    |--------------------------------------------------------------------------
    |
    | Here is the config for the composer.json file, generated by this package
    |
    */
    'composer' => [
        'vendor' => env('MODULE_VENDOR', 'PanicDevs'),
        'author' => [
            'name'  => env('MODULE_AUTHOR_NAME', 'PanicDev'),
            'email' => env('MODULE_AUTHOR_EMAIL', 'iPanicDev@gmail.com'),
        ],
        'composer-output' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Caching
    |--------------------------------------------------------------------------
    |
    | Here is the config for setting up the caching feature.
    |
    */
    'cache' => [
        'enabled'  => env('MODULES_CACHE_ENABLED', false),
        'driver'   => env('MODULES_CACHE_DRIVER', 'file'),
        'key'      => env('MODULES_CACHE_KEY', 'laravel-modules'),
        'lifetime' => env('MODULES_CACHE_LIFETIME', 60),
    ],

    /*
    |--------------------------------------------------------------------------
    | Choose what laravel-modules will register as custom namespaces.
    | Setting one to false will require you to register that part
    | in your own Service Provider class.
    |--------------------------------------------------------------------------
    */
    'register' => [
        'translations' => true,
        /**
         * load files on boot or register method
         */
        'files' => 'register',
    ],

    /*
    |--------------------------------------------------------------------------
    | Activators
    |--------------------------------------------------------------------------
    |
    | You can define new types of activators here, file, database, etc. The only
    | required parameter is 'class'.
    | The file activator will store the activation status in storage/installed_modules
    */
    'activators' => [
        'file' => [
            'class'          => FileActivator::class,
            'statuses-file'  => base_path('modules_statuses.json'),
            'cache-key'      => 'activator.installed',
            'cache-lifetime' => 604800,
        ],
    ],

    'activator' => 'file',
];
