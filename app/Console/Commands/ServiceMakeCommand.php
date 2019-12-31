<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ServiceMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service service class';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {

        $stub = parent::buildClass($name);
        $stub = $this->replaceCategory($stub, $this->option('category'));
        $stub = $this->replaceGuard($stub, $this->option('guard'));
        return $stub;
    }

    /**
     * Replace the category type for the given stub.
     *
     * @param  string  $stub
     * @param  string  $category
     * @return string
     */
    protected function replaceCategory($stub, $category)
    {
        if (!$category) {
            return str_replace('dummyCategoryType', '', $stub);
        }

        $category = strtolower(trim($category));

        return str_replace('dummyCategoryType', "/**\n\t * Specify Category type\n\t */\n\tprotected \$categoryType = '{$category}';\n", $stub);
    }

    /**
     * Replace the category type for the given stub.
     *
     * @param  string  $stub
     * @param  string  $category
     * @return string
     */
    protected function replaceGuard($stub, $guard)
    {
        if (!$guard) {
            return str_replace('dummyGuard', config('auth.defaults.guard'), $stub);
        }

        $guard = strtolower(trim($guard));

        return str_replace('dummyGuard', $guard, $stub);
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/stubs/service.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['category', 'c', InputOption::VALUE_OPTIONAL, 'The category type that the service is for category'],
            ['guard', 'g', InputOption::VALUE_OPTIONAL, 'Determine the auth guard'],
        ];
    }
}
