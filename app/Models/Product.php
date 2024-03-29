<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'description',
        'type_id',
        'volume_id',
    ];
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function volume()
    {
        return $this->belongsTo(Volume::class,'volume_id');
    }
}
