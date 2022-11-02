<?php

namespace Tests\Feature;

use App\Http\Livewire\Invoices;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvoicesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_invoices_component_can_render()
    {
        $component = Livewire::test(Invoices::class);

        $component->assertStatus(200);
    }
}