<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function customer(){
        return $this->hasMany(Customer::class);
    }
    public function productOrder(){
        return $this->hasMany(ProductOrder::class);
    }
    
}

