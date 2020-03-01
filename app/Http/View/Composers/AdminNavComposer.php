<?php

namespace App\Http\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use Waavi\Translation\Repositories\LanguageRepository;

class AdminNavComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $languageRepository;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $languageRepository
     * @return void
     */
    public function __construct(LanguageRepository $languageRepository)
    {
        // Dependencies automatically resolved by service container...
        $this->languageRepository = $languageRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('languages', $this->languageRepository->all());
    }
}
