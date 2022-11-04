<div>

    <x-header>
        <x-slot name="title">
            Invoices
        </x-slot>
        <x-primary-button type="button" wire:click="openModal" class="">
            Create Invoice
        </x-primary-button>
    </x-header>


    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white  overflow-auto sm:overflow-x-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  ">
                    <table class="table-auto min-w-full  text-center">
                        <thead class="border-b mb-10">
                            <tr class="capitalize text-sm  sm:text-md ">
                                <th class=" py-4">#</th>
                                <th class=" py-4">invoice number</th>
                                <th class=" py-4 ">invoice date</th>
                                <th class=" py-4 ">due date</th>
                                {{-- <th class="text-sm py-4 ">section</th> --}}
                                <th class=" py-4 ">product</th>
                                <th class=" py-4 ">discount</th>
                                <th class=" py-4 ">vat rate</th>
                                <th class=" py-4 ">vat value</th>
                                <th class=" py-4 ">total</th>
                                <th class=" py-4 ">status</th>
                                <th class=" py-4 ">user</th>
                                <th class=" py-4 ">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr class="border-b ">
                                    <td class="text-sm py-2 font-bold">{{ $loop->index + 1 }}</td>
                                    <td class="text-sm py-2">{{ $invoice->invoice_number }}</td>
                                    <td class="text-sm py-2">{{ $invoice->invoice_date }}</td>
                                    <td class="text-sm py-2">{{ $invoice->due_date }}</td>
                                    {{-- <td class="text-sm py-2">{{$invoice->section}}</td> --}}
                                    <td class="text-sm py-2">{{ $invoice->product }}</td>
                                    <td class="text-sm py-2">{{ $invoice->discount }}</td>
                                    <td class="text-sm py-2">{{ $invoice->vat_rate }}</td>
                                    <td class="text-sm py-2">{{ $invoice->vat_value }}</td>
                                    <td class="text-sm py-2">{{ $invoice->total }}</td>
                                    <td class="text-sm py-2"><span
                                            class="px-2 rounded-xl {{$invoice->status_value == 1 ? "bg-green-600 " : "bg-red-600" }} text-light">{{$invoice->status_value == 1 ? "active " : "inactive" }}</span>
                                    </td>
                                    <td class="text-sm py-2">{{ $invoice->user }}</td>
                                    <td class="text-sm py-2">
                                        <span class="text-xs space-y-1">
                                            <x-primary-button wire:click="edit({{$invoice->id}})" class="text-[.55rem] px-2 py-1"><i class="bi bi-pencil-square"></i></x-primary-button>
                                            <x-danger-button wire:click="delete({{$invoice->id}})"  class="text-[.55rem] px-2 py-1"><i class="bi bi-trash"></i></x-danger-button>
                                        </span>
                                    </td>

                                </tr>
                            @endforeach
                            {{ $invoices->links() }}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($modal)
        <x-modal>
            <x-slot name="title">
                Add Invoice
            </x-slot>
            <x-slot name="content">
                <form  class="my-1 w-full grid grid-cols-1 sm:grid-cols-2 gap-2  ">

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="invoice_number" :value="__('Invoice Number')" />

                        <x-text-input id="invoice_number" :disabled="true" class=" mt-1 w-full "
                         type="text"  wire:model.defer='invoice_number' />

                        <x-input-error :messages="$errors->get('invoice_number')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="invoice_date" :value="__('invoice_date')" />

                        <x-text-input id="invoice_date" class=" mt-1 w-full "
                        type="date" wire:model.defer="invoice_date" />

                        <x-input-error :messages="$errors->get('invoice_date')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="due_date" :value="__('due_date')" />

                        <x-text-input id="due_date" class=" mt-1 w-full"
                        type="date" wire:model.defer="due_date" />

                        <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="section" :value="__('section')" />

                        <x-text-input id="section" class=" mt-1 w-full"
                        type="text" wire:model.defer="section" />

                        <x-input-error :messages="$errors->get('section')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="discount" :value="__('discount')" />

                        <x-text-input id="discount"
                        class=" mt-1 w-full"
                        type="number"
                        min="0" max="100"
                         wire:model.defer="discount" />

                        <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="vat_value" :value="__('vat_value')" />

                        <x-text-input id="vat_value" class=" mt-1 w-full"
                         type="number" wire:model.defer="vat_value" />

                        <x-input-error :messages="$errors->get('vat_value')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="vat_rate" :value="__('vat_rate')" />

                        <x-text-input id="vat_rate" class=" mt-1 w-full" min='0' max='100'
                         type="number" wire:model.defer="vat_rate" />

                        <x-input-error :messages="$errors->get('vat_rate')" class="mt-2" />
                    </div>

                    <!-- total -->
                    <div class="">
                        <x-input-label for="total" :value="__('total')" />

                        <x-text-input id="total" class=" mt-1 w-full" type="number"
                         wire:model.defer="total" />

                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- total -->
                    <div class="">
                        <x-input-label for="status" :value="__('status')" />

                        <x-text-input id="status" class=" mt-1 w-full" type="text"
                         wire:model.defer="status" />

                        <x-input-error :messages="$errors->get('status')" class="mt-2" />
                    </div>

                    <!-- total -->
                    <div class="">
                        <x-input-label for="status_value" :value="__('status_value')" />

                        <x-text-input id="status_value"
                        class=" mt-1 w-full" type="number"
                        min="o" max="1"
                            wire:model.defer="status_value" />

                        <x-input-error :messages="$errors->get('status_value')" class="mt-2" />
                    </div>

                    <!-- note -->
                    <div class="">
                        <x-input-label for="note" :value="__('note')" />

                        <x-text-input id="note" class=" mt-1 w-full" type="text"
                         wire:model.defer="note" />

                        <x-input-error :messages="$errors->get('note')" class="mt-2" />
                    </div>
                    <!-- note -->
                    <div class="">
                        <x-input-label for="user" :value="__('user')" />

                        <x-text-input id="user" class=" mt-1 w-full" type="text"
                         wire:model.defer="user" />

                        <x-input-error :messages="$errors->get('user')" class="mt-2"/>
                    </div>



                </form>
                <x-slot name="footer">
                    <x-danger-button type="button" class="w-full sm:w-auto" wire:click="$toggle('modal')">
                        Cancel
                    </x-danger-button>
                    @if ($method == 'edit')
                    <x-primary-button wire:click="update" class="w-full sm:w-auto">
                        Update
                    </x-primary-button>
                    @else
                    <x-primary-button wire:click="create" class="w-full sm:w-auto">
                        Add
                    </x-primary-button>
                    @endif

                </x-slot>
            </x-slot>

        </x-modal>
    @endif

</div>
