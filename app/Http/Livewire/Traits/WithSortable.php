<?php
namespace App\Http\Livewire\Traits;


trait WithSortable {


    public $sortField = 'id';
    public $sortDirection = 'asc';

     /// sorting table
     public function sortBy($field)
     {

         if ($this->sortField == $field) {

             $this->sortDirection =  $this->sortDirection === 'asc' ? 'desc' : 'asc';
         } else {
             $this->sortDirection = 'asc';
             $this->sortField = $field;
         }
     }

}