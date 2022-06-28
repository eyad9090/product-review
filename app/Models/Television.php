<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Television extends Model
{
    use HasFactory;
    protected $fillable = ["product_id","screen_size"];

    public function product()
    {
        return $this->belongsTo("App\Models\Product", 'product_id');
    }
}
