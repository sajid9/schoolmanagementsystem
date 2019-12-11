<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\accounts;
class AccountController extends Controller
{
    public function opening_account(){
        return view('pages.account.opening_account_form');
    }
    public function save_account(Request $request){
        $request->validate([
            "title"=>"required",
            "date"=>"required",
            "amount"=>"required"
        ]);

        $account = new accounts;
        $account->account_title = $request->title;
        $account->date = $request->date;
        $account->balance = $request->amount;
        $account->left_bal = $request->amount;
        $account->branch_name = $request->branchname;
        $account->branch_code = $request->branchcode;
        $account->account_number = $request->accountno;
        
        $account->save();

        return redirect()->back()->with('message','Record added successfully');
    }
    public function account_listing(){
        
        $accounts = accounts::all();
        return view('pages.account.opening_account_listing',compact('accounts'));
    }
}
