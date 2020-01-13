<?php

namespace App\Services\Plugins;

use Illuminate\Container\Container as Application;

abstract class BaseModel
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function resetModel()
    {
        $this->makeModel();
    }

    /**
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        return $this->model = $model;
    }

}
