<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    protected $fillable = ["product_id","ram","processor","gpu"];

    public function product()
    {
        return $this->belongsTo("App\Models\Product", 'product_id');
    }
}
