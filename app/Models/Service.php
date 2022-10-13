<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'service_name',
        'active',
        'company',
        'price_netto',
        'vat',
    ];

    protected function priceNetto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value/100,
            set: fn ($value) => $value*100,
        );
    }

}
