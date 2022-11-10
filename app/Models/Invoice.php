<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
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

    public static function search($search)
    {
        return empty($search)
        ? static::query()
        : static::query()->where('user', 'like' , '%'.$search.'%')
        ->orWhere('invoice_number' , 'like' , '%'.$search.'%');
    }

    public function getStatusColorAttribute(){
        return [
            "1" => "success",
            "0" => "danger",
        ][$this->status_value] ?? "secondary";
    }
}