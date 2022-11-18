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
                <x-text-input type="search" wire:model="search" class="text-xs w-1/3 sm:w-1/4 placeholder-gray-400"
                    placeholder="search" />

                <x-select wire:model="perpage" class="w-14 rtl:bg-left">
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
                        <x-table.heading sortable="invoice_number" :sortField="$sortField"  :direction="$sortDirection" >invoice number
                        </x-table.heading>
                        <x-table.heading sortable="invoice_date" :sortField="$sortField"  :direction="$sortDirection" >invoice date
                        </x-table.heading>
                        <x-table.heading sortable="due_date" :sortField="$sortField" :direction="$sortDirection" >due date
                        </x-table.heading>
                        <x-table.heading>product</x-table.heading>
                        <x-table.heading sortable="discount" :sortField="$sortField" :direction="$sortDirection"  >discount
                        </x-table.heading>
                        <x-table.heading sortable="vat_rate" :sortField="$sortField"  :direction="$sortDirection">vat rate
                        </x-table.heading>
                        <x-table.heading sortable="vat_value" :sortField="$sortField" :direction="$sortDirection">vat value
                        </x-table.heading>
                        <x-table.heading sortable="total" :sortField="$sortField" :direction="$sortDirection">total</x-table.heading>
                        <x-table.heading sortable="status" :sortField="$sortField"  :direction="$sortDirection">status
                        </x-table.heading>
                        <x-table.heading sortable="user" :sortField="$sortField"  :direction="$sortDirection">user</x-table.heading>
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
                                        class=" {{ $invoice->status_color === 'success' ? 'bg-success/30 text-success' : 'bg-danger/30 text-danger' }}    px-2 rounded-xl">{{ $invoice->status }}</span>

                                </x-table.cell>
                                <x-table.cell>{{ $invoice->user }}</x-table.cell>
                                <x-table.cell>
                                    <span class="text-[.55rem] space-y-1">
                                        <x-button.primary wire:click="edit({{ $invoice->id }})" class="px-1 py-1">
                                            <x-icon.pen></x-icon.pen>
                                        </x-button.primary>
                                        <x-button.danger   wire:click="openDeleteModal('Invoice',{{  $invoice->id }})"
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
            <x-slot name="header">
                Add Invoice
            </x-slot>
            <x-slot name="content">
                <form class="my-1 w-full grid grid-cols-1 sm:grid-cols-2 gap-2  ">


                    <x-input wire:model.defer='invoice_number' label="Invoice Number" error />

                    <x-input type="date" label="Invoice Date" error wire:model.defer="invoice_date" />

                    <x-input label="Due Date" error type="date" wire:model.defer="due_date" />

                    <x-input label="Section" error wire:model.defer="section" />


                    <x-input label="discount" error type="number" min="0" max="100"
                        wire:model.defer="discount" />

                    <x-input label="Vat Value" error type="number" wire:model.defer="vat_value" />

                    <x-input label="Vate Rate" error min='0' max='100' type="number"
                        wire:model.defer="vat_rate" />

                    <x-input label="Total" error type="number" wire:model.defer="total" />

                    <x-input label="Status" error wire:model.defer="status" />

                    <x-input label="Status Value" error type="number" min="o" max="1"
                        wire:model.defer="status_value" />

                    <x-input label="Note" error wire:model.defer="note" />

                    <x-input label="User Name" error wire:model.defer="user" />


                </form>
                <x-slot name="footer">
                    <x-button.light type="button" class="w-full sm:w-auto" wire:click="closeModal">
                        Cancel
                    </x-button.light>
                    @if ($method == 'edit')
                        <x-button.primary  wire:click="update" loading="Updating.." wire:loading.attr="disabled"
                            class="w-full sm:w-auto">
                            Update
                        </x-button.primary>

                    @else
                        <x-button.primary wire:click="create" loading="creating.." wire:loading.attr="disabled"
                            class="w-full sm:w-auto">
                            Create
                        </x-button.primary>
                    @endif

                </x-slot>
            </x-slot>

        </x-modal>
    @endif

    @if ($deleteModal)
        <x-confirm-modal>
            <x-slot name="title">
                Delete Invoice
            </x-slot>
            <x-slot name="content">
                Are you sure you want to delete this invoice .
            </x-slot>
            <x-slot name="footer" class="space-y-1">
                <x-button.light wire:click="closeDeleteModal">
                    cancel
                </x-button.light>
                {{-- <button type="button" wire:click="confirmDelete"
                    class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancel</button> --}}
                <x-button.danger wire:click="delete" loading="Deleting..">
                    Delete
                </x-button.danger>
            </x-slot>
        </x-confirm-modal>
    @endif
</div>
