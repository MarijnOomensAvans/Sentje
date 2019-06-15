<?php

namespace Sentje\Http\Controllers;

use App\Donation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Sentje\Mail\TransactionCreated;
use Sentje\Transaction;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;

class TransactionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($accountid)
    {
        return view('transaction.createtransaction', compact('accountid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['type'] == 'Transaction') {
            $validated = request()->validate([
                'name' => 'required|min:1|max:255',
                'amount' => 'required|min:0.01|max:4000',
                'description' => 'max:255',
                'type' => 'required',
                'currency' => 'required',
                'status' => 'required',
                'bank_account_id' => 'required',
                'email' => 'required'
            ]);
            $transaction = new Transaction($validated);
            $transaction->save();

            $data = [
                'amount' => [
                    'currency' => $transaction->currency,
                    'value' => number_format($transaction->amount, 2, '.', '')
                ],
                'description' => $transaction->description,
                'redirectUrl' => 'http://www.yandex.ru'
            ];

            $payment = Mollie::api()->payments()->create($data);

            $transaction->payment_id = $payment->id;
            $transaction->save();

            Mail::to($validated['email'])->send(
                new TransactionCreated($validated)
            );

            dd($payment->id);
            $payment = Mollie::api()->payments()->get($payment->id);

            return redirect($payment->getCheckoutUrl(), 303);
            //return redirect('/');
        } else {
            dd('donated');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \Sentje\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transaction.showtransaction', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Sentje\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Sentje\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Sentje\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return back();
    }

    public function pay($transaction_id) {

        $transaction = Transaction::where('id',(int)$transaction_id)->first();

        $payment = Mollie::api()->payments()->get($transaction->payment_id);

        return redirect($payment->getCheckoutUrl(), 303);

        // -------------------------------------------------------------

        if (empty($transaction->payment_id)) {
            return abort(404);
        }
//
//        $payment = $transaction->payment_id;
//
//
//        $this->processMolliePayment($transaction->getPaymentAttribute(), $transaction);
//
//        $success = false;
//        $pending = false;
//        $error = false;
//
//        if ($payment->isFailed() || $payment->isCanceled() || $payment->isExpired()) {
//            $error = true;
//        } else if ($payment->isPending() || $payment->isOpen()) {
//            $pending = true;
//        } else {
//            $success = true;
//        }
//
//        return redirect('/');
    }

    private function processMolliePayment(Payment $payment, Transaction $transaction) {
//        if ($payment->isPaid()) {
//            $transaction->paid_at = Carbon::parse($payment->paidAt)->setTimezone(config('app.timezone'));
//
//        } else if ($payment->isExpired()) {
//            $transaction->failed_at = Carbon::parse($payment->expiresAt)->setTimezone(config('app.timezone'));
//        }
//
//        else if ($payment->isCanceled()) {
//            $transaction->failed_at = Carbon::parse($payment->canceledAt)->setTimezone(config('app.timezone'));
//        }
//
//        else {
//            $transaction->failed_at = Carbon::parse($payment->failedAt)->setTimezone(config('app.timezone'));
//        }
//
//        $transaction->save();
    }
}
