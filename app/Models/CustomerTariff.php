<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTariff extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id', 
        'from_postcode',
        'to_postcode',
        'from_weight',
        'to_weight',
        'cost',
        'valid',
    ];
    protected $casts = [
        'customer_id' => 'integer', 
        'from_postcode' => 'string',
        'to_postcode' => 'string',
        'from_weight' => 'double',
        'to_weight' => 'double',
        'cost' => 'double',
        'valid' => 'boolean',
    ];
}
