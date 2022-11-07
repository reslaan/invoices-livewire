<div>

    <x-header>
        <x-slot name="title">
            Invoices
        </x-slot>
        <x-button.primary type="button" wire:click="openModal" class="">
            Create Invoice
        </x-button.primary>
    </x-header>


    <div class="py-10">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <x-alert.success></x-alert.success>
            <div class="flex  sm:flex-row justify-between py-4 w-full gap-2">
                <x-text-input type="search" wire:model="search" class="text-xs w-1/4 placeholder-gray-400"
                    placeholder="search" />

                <x-select wire:model="perpage" class="w-14 ">
                    <option value="5">5</option>
                    <option value="10" selected>10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </x-select>


            </div>
            <div class="bg-white p-4 overflow-auto sm:overflow-x-hidden shadow-sm rounded-lg">

                <x-table>
                    <x-slot name="head">

                        <x-table.heading>#</x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'invoice_number' ? $sortDirection : null" wire:click="sortBy('invoice_number')">invoice number
                        </x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'invoice_date' ? $sortDirection : null" wire:click="sortBy('invoice_date')">invoice date
                        </x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'due_date' ? $sortDirection : null" wire:click="sortBy('due_date')">due date
                        </x-table.heading>
                        <x-table.heading>product</x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'discount' ? $sortDirection : null" wire:click="sortBy('discount')">discount
                        </x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'vat_rate' ? $sortDirection : null" wire:click="sortBy('vat_rate')">vat rate
                        </x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'vat_value' ? $sortDirection : null" wire:click="sortBy('vat_value')">vat value
                        </x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'total' ? $sortDirection : null" wire:click="sortBy('total')">total</x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'status' ? $sortDirection : null" wire:click="sortBy('status')">status
                        </x-table.heading>
                        <x-table.heading sortable :direction="$sortField === 'user' ? $sortDirection : null" wire:click="sortBy('user')">user</x-table.heading>
                        <x-table.heading>Actions</x-table.heading>
                    </x-slot>
                    {{-- body --}}
                    <x-slot name="body">
                        @forelse ($invoices as $invoice)
                            <x-table.row wire:loading.class="opacity-75">
                                <x-table.cell class="font-bold">{{ $loop->index + 1 }}</x-table.cell>
                                <x-table.cell>{{ $invoice->invoice_number }}</x-table.cell>
                                <x-table.cell>{{ date('M, d Y', strtotime($invoice->invoice_date)) }}</x-table.cell>
                                <x-table.cell>{{ date('M, d Y', strtotime($invoice->due_date)) }}</x-table.cell>
                                <x-table.cell>{{ $invoice->product }}</x-table.cell>
                                <x-table.cell>{{ $invoice->discount }}</x-table.cell>
                                <x-table.cell>{{ $invoice->vat_rate }}</x-table.cell>
                                <x-table.cell>{{ $invoice->vat_value }}</x-table.cell>
                                <x-table.cell>{{ $invoice->total }}</x-table.cell>
                                <x-table.cell><span
                                        class="bg-{{ $invoice->status_color }}-100  text-{{ $invoice->status_color }}-600 px-2 rounded-xl">{{ $invoice->status }}</span>
                                </x-table.cell>
                                <x-table.cell>{{ $invoice->user }}</x-table.cell>
                                <x-table.cell>
                                    <span class="text-[.55rem] space-y-1">
                                        <x-button.primary wire:click="edit({{ $invoice->id }})" class="px-1 py-1">
                                            <x-icon.pen></x-icon.pen>
                                        </x-button.primary>
                                        <x-button.danger wire:click="confirmDelete({{ $invoice->id }})"
                                            class="px-1 py-1">
                                            <x-icon.trash></x-icon.trash>
                                        </x-button.danger>
                                    </span>
                                </x-table.cell>
                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell class="text-xl text-gray-500 py-4" colspan="100">
                                    No Invoice found<span class="animate-puls">...</span>
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>
                <div class="pt-2">
                    {{ $invoices->links() }}
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
                            wire:model.defer='invoice_number' />

                        <x-input-error :messages="$errors->get('invoice_number')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="invoice_date" :value="__('invoice_date')" />

                        <x-text-input id="invoice_date" class=" mt-1 w-full " type="date"
                            wire:model.defer="invoice_date" />

                        <x-input-error :messages="$errors->get('invoice_date')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="due_date" :value="__('due_date')" />

                        <x-text-input id="due_date" class=" mt-1 w-full" type="date" wire:model.defer="due_date" />

                        <x-input-error :messages="$errors->get('due_date')" class="mt-2" />
                    </div>
                    <!-- Password -->
                    <div class="">
                        <x-input-label for="section" :value="__('section')" />

                        <x-text-input id="section" class=" mt-1 w-full" type="text" wire:model.defer="section" />

                        <x-input-error :messages="$errors->get('section')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="discount" :value="__('discount')" />

                        <x-text-input id="discount" class=" mt-1 w-full" type="number" min="0" max="100"
                            wire:model.defer="discount" />

                        <x-input-error :messages="$errors->get('discount')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="vat_value" :value="__('vat_value')" />

                        <x-text-input id="vat_value" class=" mt-1 w-full" type="number" wire:model.defer="vat_value" />

                        <x-input-error :messages="$errors->get('vat_value')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="">
                        <x-input-label for="vat_rate" :value="__('vat_rate')" />

                        <x-text-input id="vat_rate" class=" mt-1 w-full" min='0' max='100' type="number"
                            wire:model.defer="vat_rate" />

                        <x-input-error :messages="$errors->get('vat_rate')" class="mt-2" />
                    </div>

                    <!-- total -->
                    <div class="">
                        <x-input-label for="total" :value="__('total')" />

                        <x-text-input id="total" class=" mt-1 w-full" type="number" wire:model.defer="total" />

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

                        <x-text-input id="status_value" class=" mt-1 w-full" type="number" min="o"
                            max="1" wire:model.defer="status_value" />

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

                        <x-input-error :messages="$errors->get('user')" class="mt-2" />
                    </div>



                </form>
                <x-slot name="footer">
                    <x-button.light type="button" class="w-full sm:w-auto" wire:click="$toggle('modal')">
                        Cancel
                    </x-button.light>
                    @if ($method == 'edit')
                        <x-button.primary wire:click="update" wire:loading.attr="disabled" class="w-full sm:w-auto">
                            Update
                        </x-button.primary>
                    @else
                        <x-button.primary wire:click="create" wire:loading.attr="disabled" class="w-full sm:w-auto">
                            Create
                        </x-button.primary>
                    @endif

                </x-slot>
            </x-slot>

        </x-modal>
    @endif

    @if ($confirmModal)
        <x-confirm-modal>
            <x-slot name="title">
                Delete Invoice
            </x-slot>
            <x-slot name="content">
                Are you sure you want to delete this invoice .
            </x-slot>
            <x-slot name="footer" class="space-y-1">
                <x-button.light wire:click="confirmDelete">
                    cancel
                </x-button.light>
                {{-- <button type="button" wire:click="confirmDelete"
                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button> --}}
                <x-button.danger wire:click="delete">
                    Delete
                </x-button.danger>
            </x-slot>
        </x-confirm-modal>
    @endif
</div>
