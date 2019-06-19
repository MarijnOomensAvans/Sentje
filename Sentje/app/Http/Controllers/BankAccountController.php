<?php

namespace Sentje\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
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
        return view('bankaccount/createbankaccount');
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
            'name' => 'required|max:8'
        ]);
        $validated['user_id'] = Auth::id();
        $account = BankAccount::create($validated);
        $account->fill([
            'name' => Crypt::encrypt($validated['name'])
        ])->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankaccount)
    {
        if (Auth::id() == $bankaccount->user_id) {
            return view('bankaccount/showbankaccount', compact('bankaccount'));
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankaccount)
    {
        if (Auth::id() == $bankaccount->user_id) {
            return view('bankaccount/editbankaccount', compact('bankaccount'));
        } else {
            abort(403);
        }
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
        if (Auth::id() == $bankaccount->user_id) {
            $bankaccount->update([
                'name' => Crypt::encrypt($request['name'])
            ]);
            return redirect('/');
        } else {
            abort(403);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Sentje\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankaccount)
    {
        if (Auth::id() == $bankaccount->user_id) {
            $bankaccount->delete();
            return redirect('/');
        } else {
            abort(403);
        }
    }
}
