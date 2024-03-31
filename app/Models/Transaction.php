<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'cashier_id', 'total', 'pay',
        'return', 'status'
    ];

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
        // Many to One
    }

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
