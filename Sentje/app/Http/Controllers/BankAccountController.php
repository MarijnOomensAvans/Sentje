<?php

namespace Sentje\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Sentje\BankAccount;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createbankaccount');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = request()->validate([
            'name' => 'required|max:255'
        ]);
        $validated['user_id'] = Auth::id();
        BankAccount::create($validated);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankaccount)
    {

        return $bankaccount;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankaccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BankAccount $bankaccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankaccount)
    {
        $bankaccount->delete();
        return view('home');
    }
}
