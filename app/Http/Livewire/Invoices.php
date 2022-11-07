<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoice;

class Invoices extends Component
{
    use WithPagination;

    public $modal = false;
    public $confirmModal = false;
    public $method = '';  // create or edit

    public $perpage = 10;
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';

    public $invoiceId = '';
    public $invoice_number = '';
    public $invoice_date = '';
    public $due_date = '';
    public $section = '';
    public $discount = '';
    public $vat_rate = '';
    public $vat_value = '';
    public $total = '';
    public $status = '';
    public $status_value = '';
    public $note = '';
    public $user = '';

    protected $queryString = ['sortField', 'sortDirection'];

    protected $rules = [
        'invoice_number' => ['string', 'max:255'],
        'invoice_date' => ['string', 'max:255'],
        'due_date' => ['required', 'string', 'max:255'],
        'section' => ['required', 'string', 'max:255'],
        'discount' => ['required', 'string', 'max:255'],
        'vat_rate' => ['required', 'string', 'max:255'],
        'vat_value' => ['required', 'string', 'max:255'],
        'total' => ['required', 'string', 'max:255'],
        'status' => ['required', 'string', 'max:255'],
        'status_value' => ['required', 'numeric', 'max:255'],
        'note' => ['required', 'string', 'max:255'],
        'user' => ['required', 'string', 'max:255'],
    ];


    public function openModal($state = null)
    {
        $this->resetErrorBag();
        if (!$state)
            $this->resetExcept('modal');

        $this->modal = !$this->modal;
    }


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



    public function create()
    {

        $this->validate();

        $invoice  = Invoice::create([
            'invoice_number' => rand(000000, 999999),
            'invoice_date'   => now(),
            'due_date'       => $this->due_date,
            'section'       => $this->section,
            'product'       => 'product',
            'discount'       => $this->discount,
            'vat_rate'       => $this->vat_rate,
            'vat_value'       => $this->vat_value,
            'total'       => $this->total,
            'status'       => $this->status,
            'status_value'       => $this->status_value,
            'note'       => $this->note,
            'user'       => auth()->user()->name,
        ]);
        $invoice->save();
        $this->openModal();
        session()->flash('message', 'Invoice successfully Created.');
    }

    public function edit($id)
    {

        $this->invoiceId = $id;
        $this->method = 'edit'; // switch to update button
        $invoice = Invoice::find($id);
        $this->invoice_number = $invoice->invoice_number;
        $this->invoice_date = $invoice->invoice_date;
        $this->due_date = $invoice->due_date;
        $this->section = $invoice->section;
        $this->discount = $invoice->discount;
        $this->vat_rate = $invoice->vat_rate;
        $this->vat_value = $invoice->vat_value;
        $this->total = $invoice->total;
        $this->status = $invoice->status;
        $this->status_value = $invoice->status_value;
        $this->note = $invoice->note;
        $this->user = $invoice->user;
        $this->openModal('edit');
    }

    public function update()
    {
        $this->validate();
        $invoice = Invoice::find($this->invoiceId);
        $invoice->update([
            'invoice_number'   => $this->invoice_number,
            'invoice_date'     => $this->invoice_date,
            'due_date'         => $this->due_date,
            'section'          => $this->section,
            'product'          => 'product',
            'discount'         => $this->discount,
            'vat_rate'         => $this->vat_rate,
            'vat_value'        => $this->vat_value,
            'total'            => $this->total,
            'status'           => $this->status,
            'status_value'     => $this->status_value,
            'note'             => $this->note,
            'user'             => $this->user,
        ]);
        $invoice->save();
        $this->openModal('edit');
        session()->flash('message', 'Invoice successfully Updated.');
    }

    public function confirmDelete($id = '')
    {
        $this->confirmModal = !$this->confirmModal;
        $this->invoiceId = $id;
    }

    public function delete()
    {

        $invoice = Invoice::find($this->invoiceId);
        $invoice->delete();
        $this->confirmModal = !$this->confirmModal;
        session()->flash('message', 'Invoice successfully Deleted.');
    }

    public function render()
    {
        $invoices = Invoice::search($this->search)
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perpage);

        return view('livewire.invoices', [
            'invoices' => $invoices
        ]);
    }
}