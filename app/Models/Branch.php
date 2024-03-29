<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    
    public function productOrder(){
        return $this->hasMany(ProductOrder::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
