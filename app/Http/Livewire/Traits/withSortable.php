<?php
namespace App\Http\Livewire\Traits;


trait withSortable {


    public $modal = false;

    public function openModal($state = null)
    {
        $this->resetErrorBag();
        if (!$state)
            $this->resetExcept('modal');

        $this->modal = !$this->modal;
    }

}