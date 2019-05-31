<?php

namespace Sentje;

use Illuminate\Database\Eloquent\Model;
use Sentje\User;

class BankAccount extends Model
{
    protected $fillable = [
        'name',
        'balance',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo('Sentje\User');
    }
}
