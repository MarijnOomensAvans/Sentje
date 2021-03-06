<?php

namespace Sentje;

use danielme85\CConverter\Currency;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'name',
        'balance',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('Sentje\User');
    }

    public function transactions()
    {
        return $this->hasMany('Sentje\Transaction');
    }

    public function balance()
    {
        $balance = 0;
        foreach ($this->transactions as $transaction) {
            if ($transaction->status == 'Paid') {
                if ($transaction->currency == 'EUR') {
                    $balance += $transaction->amount;
                } else {
                    $balance += Currency::conv($from = 'RUB', $to = 'EUR', $value = $transaction->amount, $decimals = 2);
                }
            }
        }
        $balance = number_format($balance, 2, '.', '');
        return $balance;
    }
}
