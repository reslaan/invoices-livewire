<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoices as ModelsInvoices;

class Invoices extends Component
{
    use WithPagination;

    public $modal = false;
    public $invoice_number = 'wefwf';
    public $invoice_date = 'date';
    public $due_date = 'date';
    public $section = 'section';
    public $discount = 'dis';
    public $vat_rate = 'vat';
    public $vat_value = 'vatv';
    public $total = 'tot';
    public $status = '';
    public $status_value = '';
    public $note = '';
    public $user = '';

    public function openModal(){

        $this->modal = !$this->modal;
    }
    public function store(){
        
    }
    public function render()
    {
        $invoices = ModelsInvoices::paginate(10);
        return view('livewire.invoices',[
            'invoices' => $invoices
        ]);
    }
}