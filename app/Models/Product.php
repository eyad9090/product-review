<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ["image","type","model","price"];

    protected $attributes = [
        'image' => 'uploads/products/default.jpg'
    ];

    public function laptop()
    {
        return $this->hasOne("App\Models\Laptop");
    }
    public function television()
    {
        return $this->hasOne("App\Models\\television");
    }
    public function mobile()
    {
        return $this->hasOne("App\Models\Mobile");
    }


    public function feedbacks()
    {
        return $this->hasMany("App\Models\Feedback");
    }
}
