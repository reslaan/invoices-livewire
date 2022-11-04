<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Invoices as ModelsInvoices;

class Invoices extends Component
{
    use WithPagination;

    public $modal = false;
    public $method = '';

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
        'status_value' => ['required', 'string', 'max:255'],
        'note' => ['required', 'string', 'max:255'],
        'status_value' => ['required', 'string', 'max:255'],
        'user' => ['required', 'string', 'max:255'],
    ];
    public function openModal($state = null)
    {

        if (!$state)
            $this->resetExcept('modal');

        $this->modal = !$this->modal;
    }
    public function create()
    {

        $this->validate();

        $invoice  = ModelsInvoices::create([
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
            'user'       => $this->user,
        ]);
        $invoice->save();
        $this->openModal();
    }

    public function edit($id)
    {

        $this->invoiceId = $id;
        $this->method = 'edit'; // switch to update button
        $invoice = ModelsInvoices::find($id);
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
        $invoice = ModelsInvoices::find($this->invoiceId);
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

    }

    public function delete($id){
        $invoice = ModelsInvoices::find($id);
        $invoice->delete();
    }
    public function render()
    {
        $invoices = ModelsInvoices::paginate(10);
        return view('livewire.invoices', [
            'invoices' => $invoices
        ]);
    }
}
