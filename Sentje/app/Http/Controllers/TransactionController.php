<?php

namespace Sentje\Http\Controllers;

use Sentje\Transaction;
use Illuminate\Http\Request;

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
                'bank_account_id' => 'required'
            ]);
            Transaction::create($validated);

            return redirect('/');
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
        //
    }
}
