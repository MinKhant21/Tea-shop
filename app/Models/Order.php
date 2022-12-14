<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','total_quantity','order_date','order_status'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
   
   
}
