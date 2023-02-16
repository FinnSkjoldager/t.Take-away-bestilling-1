<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order1';
    protected $fillable =
    ['
        OrderNo','
        CustomerID','
        PMethod','
        GTotal','
        DeletedOrderItemIDs'
    ];
    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'CustomerID');
    }
    public function OrderItems(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'OrderItem1', 'OrderID', 'ItemID')->withPivot('Quantity','Paid');
    }
}