<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $table = 'distributors';
    protected $fillable = [
        'name',
        'address',
        'owner_id',
        'area_id',
        'packaging_id',
        'product_id',
    ];
}
