<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'orderitem1';
    protected $fillable =
    ['
        OrderID','
        ItemID','
        Quantity','
        Paid
    '];
}