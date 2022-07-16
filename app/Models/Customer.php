<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $casts = ['name'=>'string'];

    public function setNameAttribute($value){
        $this->attributes['name'] = Str::upper($value);
    }
}
