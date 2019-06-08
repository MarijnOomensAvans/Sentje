<?php

namespace Sentje;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'type',
        'description',
        'currency',
        'status',
        'bank_account_id'
        ];
}
