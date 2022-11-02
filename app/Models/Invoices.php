<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoices extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'due_date',
        'product',
        'section',
        'discount',
        'vat_rate',
        'vat_value',
        'total',
        'status',
        'status_value',
        'note',
        'user',
    ];
}