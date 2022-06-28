<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table="feedbacks";
    protected $fillable = ["user_id","product_id","feedback","rating"];

    public function product()
    {
        return $this->belongsTo("App\Models\Product", 'product_id');
    }

    public function user()
    {
        return $this->belongsTo("App\Models\User", 'user_id');
    }
}
