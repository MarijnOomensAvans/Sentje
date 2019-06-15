<?php

namespace Sentje;

use Illuminate\Database\Eloquent\Model;
use Mollie\Laravel\Facades\Mollie;

class Transaction extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'type',
        'description',
        'currency',
        'status',
        'bank_account_id',
        'email',
        'payment_id',
        'paid_at',
        'refunded_at',
        'failed_at'
        ];

    public function getPaymentAttribute() {
        if (empty($this->payment_id)) {
            return null;
        }

        return Mollie::api()->payments()->get($this->payment_id);
    }
}
