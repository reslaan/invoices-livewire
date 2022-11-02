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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white  ">
                    <table class="table-auto min-w-full  text-center">
                        <thead class="border-b mb-10">
                            <tr class="capitalize ">
                                <th class="text-sm py-4">#</th>
                                <th class="text-sm py-4">invoice number</th>
                                <th class="text-sm py-4 ">invoice date</th>
                                <th class="text-sm py-4 ">due date</th>
                                <th class="text-sm py-4 ">section</th>
                                <th class="text-sm py-4 ">vat rate</th>
                                <th class="text-sm py-4 ">vat value</th>
                                <th class="text-sm py-4 ">total</th>
                                <th class="text-sm py-4 ">status</th>
                                <th class="text-sm py-4 ">status value</th>
                                <th class="text-sm py-4 ">note</th>
                                <th class="text-sm py-4 ">user</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr class="border-b">
                                    <td class="text-sm py-2">{{$loop->index + 1}}</td>
                                    <td class="text-sm py-2">1</td>
                                    <td class="text-sm py-2">1</td>
                                    <td class="text-sm py-2">1</td>
                                    <td class="text-sm py-2">1</td>
                                    <td class="text-sm py-2">1</td>
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
                <form class="my-1 w-full grid grid-cols-1 sm:grid-cols-2 gap-2  ">

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="invoice_number" :value="__('Invoice Number')" />

                        <x-text-input id="invoice_number" :disabled="true" class=" mt-1 w-full " type="text"
                            wire:model='invoice_number' />

                        <x-input-error :messages="$errors->get('invoice_number')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="invoice_date" :value="__('invoice_date')" />

                        <x-text-input id="invoice_date" class=" mt-1 w-full " type="date"
                            wire:model="invoice_date" />

                        <x-input-error :messages="$errors->get('invoice_date')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="due_date" :value="__('due_date')" />

                        <x-text-input id="due_date" class=" mt-1 w-full" type="date" wire:model="due_date" />

                        <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="section" :value="__('section')" />

                        <x-text-input id="section" class=" mt-1 w-full" type="text" wire:model="section" />

                        <x-input-error :messages="$errors->get('section')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="discount" :value="__('discount')" />

                        <x-text-input id="vat_rate" class=" mt-1 w-full" type="text" wire:model="vat_rate" />

                        <x-input-error :messages="$errors->get('vat_rate')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="vat_value" :value="__('vat_value')" />

                        <x-text-input id="vat_value" class=" mt-1 w-full" type="text" wire:model="vat_value" />

                        <x-input-error :messages="$errors->get('vat_value')" class="mt-2" />
                    </div>

                    <!-- total -->
                    <div class="">
                        <x-input-label for="total" :value="__('total')" />

                        <x-text-input id="total" class=" mt-1 w-full" type="text" wire:model="total" />

                        <x-input-error :messages="$errors->get('total')" class="mt-2" />
                    </div>

                    <!-- note -->
                    <div class="">
                        <x-input-label for="note" :value="__('note')" />

                        <x-text-input id="note" class=" mt-1 w-full" type="text" wire:model="note" />

                        <x-input-error :messages="$errors->get('note')" class="mt-2" />
                    </div>



                </form>
            </x-slot>
            <x-slot name="footer">
                <x-danger-button type="button" class="w-full sm:w-auto" wire:click="openModal">
                    Cancel
                </x-danger-button>
                <x-primary-button class="w-full sm:w-auto" type="button" wire:click="openModal">
                    Add
                </x-primary-button>
            </x-slot>
        </x-modal>
    @endif

</div>
