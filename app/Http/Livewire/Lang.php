<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

class Lang extends Component
{

    public function setLang()
    {

        $locale =   app()->getLocale() == 'ar' ? 'en' : 'ar';
        session()->put('locale', $locale);

         return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.lang');
    }
}