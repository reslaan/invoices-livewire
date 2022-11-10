<?php

namespace App\Http\Livewire\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;


trait withModal
{


    public  $modelType = "App\Models\\";
    public $model;

    public $modal = false;
    public $deleteModal = false;
    public $confirmModal = false;
    public $method = '';  // create or edit

    public function openModal($method = null)
    {
        $this->resetErrorBag();
        if (!$method) // if still null call create method
            $this->resetExcept('modal');

        $this->method = $method;       // switch to update button

        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }


    public function openDeleteModal($model , $id)
    {

        $this->deleteModal = true; // open confirm modal
         $this->modelType .= $model;

         $this->model = $this->modelType::findOrFail($id);
    }

    public function delete()
    {
        // dd($this->model);
        $this->model->delete();
        $this->reset('modelType');
        $this->closeDeleteModal();
        session()->flash('message', 'Invoice successfully Deleted.');
    }

    public function closeDeleteModal()
    {
        $this->deleteModal = false;
        $this->reset('modelType');

    }
}