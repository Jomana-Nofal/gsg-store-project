<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\App;

class LangSwitcher extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $langs = [
        'ar' => 'العربية',
        'en' => 'English',
    ];

    public $locale;


    public function __construct()
    {
        //to get current lang
        $this->locale = App::currentLocale();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.lang-switcher');
    }
}
