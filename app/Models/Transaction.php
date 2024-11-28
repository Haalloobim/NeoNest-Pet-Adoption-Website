<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'total_price'];

    public function transactionProducts()
    {
        return $this->hasMany(TransactionProduct::class);
    }
}
